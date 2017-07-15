
$(document).ready(function () {    
	$("#editor").on("contextmenu",function(e){
        return false;
    });
        $(document).keydown(function(event) {
        if (event.ctrlKey==true && (event.which == '118' || event.which == '86' || event.which == '67' || event.which == '88')) {
            alert('No cut copy paste :P');
            event.preventDefault();
         }
    });
        var error=0;
        $(document).keyup(function(event) {
        if (event.which == '122'||event.which == '27'){
        	error++;
            alert('This incident will be reported');
            console.log(error);
            event.preventDefault();
         }
    });
});

function full(){
var docElm = document.documentElement;
if (docElm.requestFullscreen) {
    docElm.requestFullscreen();
}
else if (docElm.mozRequestFullScreen) {
    docElm.mozRequestFullScreen();
}
else if (docElm.webkitRequestFullScreen) {
    docElm.webkitRequestFullScreen();
}
 
}


function end_full()
{
	if (document.exitFullscreen) {
    document.exitFullscreen();
}
else if (document.mozCancelFullScreen) {
    document.mozCancelFullScreen();
}
else if (document.webkitCancelFullScreen) {
    document.webkitCancelFullScreen();
}
}
