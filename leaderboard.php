<?php
session_start();
require_once('function.php');
$cid = $_GET['cid'];
$ccid = $cid;
$cid = 'contest'.$cid;
$connection = con();
/*$limit = 2;
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
$start_from = ($page-1) * $limit;*/
$con=con();
$query = "SELECT count(*) FROM information_schema.columns WHERE table_name = '$cid'";
$res=$con->query($query);
$col = $res->fetch_array();
$columns = $col[0] - 3;
/*$query="SELECT * FROM `$cid` LIMIT $start_from, $limit ";
$res=$con->query($query);*/


?>
<!doctype html>
<html lang=''>
  <head>
    <meta charset='utf-8'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Suez+One" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Bungee+Inline" rel="stylesheet">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/leaderboard.css">
    <script src="js/jquery-3.1.0.min.js"></script>
    <title>LetUsCode</title>
  </head>
  <body style="width:100%;">
    <div class="container-fluid" style="background:purple;height:100%;">
      <div class="row mainrow"><!-- main row-->
      
      <div class="col-md-2 col-xs-12 leftpanel no"><!--left panel-->
      <div class="logo">
        <img src="assets/logo.png" class="img-responsive">
      </div>
      <nav class="navigation">
        <ul class="list-unstyled">
                  <li class="active"><a href="dashboard.php"><i class="fa fa-home"></i><span class="nav-label">Dashboard</span></a></li>
          <li class=""><a href="admin_logout.php"><i class="fa fa-power-off"></i><span class="nav-label">Logout</span></a></li>
        </ul>
      </nav>
      </div><!--left panel-->
      
      <div class="col-md-10 col-md-offset-2 col-xs-12 rightpanel" style=""><!-- right panel-->
      
      <div class="col-md-12 col-xs-12 profiletab"><!-- profiletab-->
      <div class="col-md-12 col-xs-12 profileinfo"><!-- profileinfo-->
      <div class="row profilerow">
        <div class="col-md-3 col-xs-4 profileimgdiv">
          <div class="row">
            <div class="col-md-4 col-xs-4 no imgd"><span><img src="assets/thumb1.jpg" class="img"></span></div>
            <div class="col-md-7 col-xs-7 col-md-offset-1 col-xs-offset-1 no">
              <div class="col-md-12 col-xs-12 name nom"><h4 class="nom" style="margin-top:15%;"><?php echo getusername($_SESSION['id']);?></h4></div>
              <div class="col-md-12 col-xs-12 email"><p><?php echo getemail($_SESSION['id']);?></p></div>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-xs-3 no" style="border:1px solid #B168D4;float:right">
          <div class="col-md-3 col-xs-3 no" style="background:#B168D4;">
            <i class="fa fa-star ic"></i>
          </div>
          <div class="col-md-9 col-xs-9 no">
            <div class="col-md-12 no rankdiv">
              <div class="col-md-12 col-xs-12"><center><h4 class="nom" style="margin-top:10%;color:#813DA1">Overall Rank</h4></center></div>
              <div class="col-md-12 col-xs-12"><center><h4>45/100</h4></center></div>
            </div>
          </div>
        </div>
      </div>
      </div><!-- profileinfo-->
      
      </div><!-- profiletab-->
      <div class="row rightcontainer"><!-- right container-->
      <div class="row"><!-- rightrow-->
      <div class="col-sm-12">
        <h4 class="hd4live"><i class="glyphicon glyphicon-th-list"></i> Leaderboard</h4>
      </div>
      <div class="col-sm-12 table-responsive">
        <table class="table table-bordered">
          <tr align="center">
            <th><center>Rank</center></th>
            <th><center>Name</center></th>
            <?php
            $count = 0;
            $sql2 = "SELECT Column_name from Information_schema.columns where Table_name like '$cid'";
            $res2=$con->query($sql2);
            $arr=$res2->fetch_array();
            $cname = array();
            while($arr=$res2->fetch_array()){
              $count++;
              if($count==1||$count==3)
                continue;
              array_push($cname,$arr[0]);
              echo '<th><center>'. $arr[0].'</center></th>';
            }
            ?>
          </tr>
          <?php
          /*------------COUNTING RANK----------*/
          $c = 0;
          $sql2 = "SELECT * from `$cid`";
          $res2=$con->query($sql2);
          $rank = array();
          while ($arr=$res2->fetch_array()) {
            $sum = 0;
            $uid = $arr['user'];
            $c=0;
            while($c < $columns){
              $sum += $arr[$cname[$c]];
              $c++;
            }
            //array_push($rank,$uid=>$sum);
            $rank[$uid] = $sum;
          }
          arsort($rank);
          //print_r($rank);

          /*------------COUNTING RANK----------*/
          ?>
          <?php
          $count = 0;
          $prev_rank = 0;
          $prev_marks = 0;
          //while($arr=$res->fetch_array())
          foreach($rank as $uid => $marks)
          {
            $userid = $uid;
            $sql2 = "SELECT name from `user` WHERE id=$userid";
            $res2=$con->query($sql2);
            $n = $res2->fetch_array();
            $name = $n[0];
            $c = 0;
            $r = 0;

            if($count == 0)
            {
              $r = 1;
              $prev_rank = 1;
              $prev_marks = $rank[$uid];
            }
            else
            {
              $curr_marks = $rank[$uid];
              if($curr_marks == $prev_marks){
                $r = $prev_rank;
              }
              else{
                $r = $prev_rank + 1;
                $prev_rank = $r;
                $prev_marks = $curr_marks;
              }
            }
            $sql2 = "SELECT * from `$cid` WHERE user=$userid";
            $res2=$con->query($sql2);
            $arr = $res2->fetch_array();
            if($count%2 == 0){
            echo '<tr class="active"><td><center>'.$r.'</center></td><td><center>'.$name.'</center></td>';
            while ($c < $columns) {
              echo '<td><center>'.$arr[$cname[$c]].'</center></td>';
              $c++;
            }
            echo '</tr>';
            }
            else{
              echo '<tr><td><center>'.$r.'</center></td><td><center>'.$name.'</center></td>';
            while ($c < $columns) {
              echo '<td><center>'.$arr[$cname[$c]].'</center></td>';
              $c++;
            }
            echo '</tr>';
            }
            $count++;
          }
          ?>
        </table>
      </div>
      </div><!-- rightrow-->
      <div class="col-sm-12">
        <center>
        <?php
        /*$sql3 = "SELECT COUNT(user) FROM `$cid`";
        $res3=$con->query($sql3);
        $total = $res3->fetch_array();
        $total_records = $total[0];
        $total_pages = ceil($total_records / $limit);
        $pagLink = "<div class='pagination'>";
          for ($i=1; $i<=$total_pages; $i++) {
            if($i == $page)
              $pagLink .= "<li class='active'><a href='leaderboard.php?page=".$i."'>".$i."</a></li>";
            else
              $pagLink .= "<li><a href='leaderboard.php?cid=".$ccid."&page=".$i."'>".$i."</a></li>";
          };
        echo $pagLink . "</div>";*/
        ?>
        </center>
      </div>
      </div><!-- right container-->
      
      </div><!-- right panel-->
      </div><!-- mainrow-->
      </div><!-- container -->
    </body>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    
    
  </html>