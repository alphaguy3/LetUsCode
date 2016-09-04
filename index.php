<?php
//Endpoints Of Hackerearth API
$endpoint_compile = "https://api.hackerearth.com/v3/code/compile/";
$endpoint_run = "https://api.hackerearth.com/v3/code/run/";
function compile($hackerearth,$config){
	// Get cURL resource
	$curl = curl_init();
    if($curl==false)
    {
        die('Error');
    }
    curl_setopt ($curl, CURLOPT_PORT , 8090);
    curl_setopt($curl, CURLOPT_PROXY,'172.31.9.7:808');
   // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	// Seting some options
	curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://api.hackerearth.com/v3/code/compile/',
    CURLOPT_POST => 1,
    CURLOPT_CAINFO => 'cacert.pem',
    CURLOPT_SSL_VERIFYPEER => 'false',
    CURLOPT_ENCODING => 'UTF-8',
    CURLOPT_POSTFIELDS => array(
        				'client_secret' => $hackerearth['client_secret'],
                        'time_limit' => $hackerearth['time_limit']||$config['time'],
        				'memory_limit' => $hackerearth['memory_limit']||$config['memory'],
        				'source' => $config['source'],
        				'input' => $config['input'],
                        'lang' => $config['language']
    )
	));
    curl_setopt ($curl, CURLOPT_PORT , '8090');
    curl_setopt($curl, CURLOPT_PROXYPORT, '808'); 
    curl_setopt($curl, CURLOPT_PROXYTYPE, 'HTTP'); 
    curl_setopt($curl, CURLOPT_PROXY, '172.31.9.8');
	// Send the request & returning response 
	return json_decode(curl_exec($curl), true);
}
function compile_with_file($hackerearth,$config){
	   // Get cURL resource
    $curl = curl_init();
    // Seting some options
    $myfile = fopen($config['file'], "r") or die("Unable to open file!");
    curl_setopt ($curl, CURLOPT_PORT , 8089);
    curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://api.hackerearth.com/v3/code/compile/',
    CURLOPT_POST => 1,
    CURLOPT_CAINFO => 'cacert.pem',
    CURLOPT_SSL_VERIFYPEER => 'true',
    CURLOPT_ENCODING => 'UTF-8',
    CURLOPT_POSTFIELDS => array(
                        'client_secret' => $hackerearth['client_secret'],
                        'time_limit' => $hackerearth['time_limit']||$config['time'],
                        'memory_limit' => $hackerearth['memory_limit']||$config['memory'],
                        'source' => fread($myfile,filesize($config['file'])),
                        'input' => $config['input'],
                        'lang' => $config['language']
    )
    ));
    // Send the request & returning response 
    return json_decode(curl_exec($curl), true);
}
function run($hackerearth,$config){
	// Get cURL resource
	$curl = curl_init();
	// Seting some options
	curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://api.hackerearth.com/v3/code/run/',
    CURLOPT_POST => 1,
    CURLOPT_CAINFO => 'cacert.pem',
    CURLOPT_SSL_VERIFYPEER => 'true',
    CURLOPT_ENCODING => 'UTF-8',
    CURLOPT_POSTFIELDS => array(
        				'client_secret' => $hackerearth['client_secret'],
                        'time_limit' => $hackerearth['time_limit']||$config['time'],
        				'memory_limit' => $hackerearth['memory_limit']||$config['memory'],
        				'source' => $config['source'],
        				'input' => $config['input'],
                        'lang' => $config['language'],
                        'sync' => '0'
    )
	));
	// Send the request & returning response 
	return json_decode(curl_exec($curl), true);
}
function run_with_file($hackerearth,$config){
    // Get cURL resource
    $curl = curl_init();
    // Seting some options
    $myfile = fopen($config['file'], "r") or die("Unable to open file!");
    curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://api.hackerearth.com/v3/code/run/',
    CURLOPT_POST => 1,
    CURLOPT_CAINFO => 'cacert.pem',
    CURLOPT_SSL_VERIFYPEER => 'true',
    CURLOPT_ENCODING => 'UTF-8',
    CURLOPT_POSTFIELDS => array(
                        'client_secret' => $hackerearth['client_secret'],
                        'time_limit' => $hackerearth['time_limit']||$config['time'],
                        'memory_limit' => $hackerearth['memory_limit']||$config['memory'],
                        'source' => fread($myfile,filesize($config['file'])),
                        'input' => $config['input'],
                        'lang' => $config['language']
    )
    ));
    // Send the request & returning response 
    return json_decode(curl_exec($curl), true);
}


?>