//document.getElementById('submita').onclick = function(){ajx()};


function ajx() {
    alert('jhghgggjhhjhj');
    var x = document.forms["myforms"]["scd"].value;
    var y = document.forms["myforms"]["sct"].value;
    var z = document.forms["myforms"]["res"].value;
    document.getElementById("txtresult").innerHTML = x;
    alert('sdddddddddd');
    //var x = document.getElementById("scd").innerHTML;
    //var y = document.getElementById("sct").innerHTML;
    //var z = document.getElementById("result").innerHTML;
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtresult").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","getuser.php?x="+x+"&y="+y+"&z="z,true);
        xmlhttp.send();
    return false;
    }
alert("hie ");







/*var currentPos = 0;
var intervalHandle;

function beginAnimate() {
	document.getElementById("extra").style.position = "absolute";
	document.getElementById("extra").style.left = "0px";
    document.getElementById("extra").style.top = "100px";
    // cause the animateBox function to be called
    intervalHandle = setInterval(animateBox,1000);
}

function animateBox() {
    // set new position
    currentPos+=5;
    document.getElementById("extra").style.left = currentPos + "px";
    // 
    if ( currentPos > 900) {
        // clear interval
        clearInterval(intervalHandle);
        // reset custom inline styles
        document.getElementById("extra").style.position = "";
        document.getElementById("extra").style.left = "";
        document.getElementById("sxtra").style.top = "";
    }
}

window.onload =  function() {
        document.getElementById("extra").style.position = "";
        document.getElementById("extra").style.left = "";
        document.getElementById("sxtra").style.top = "";
	setTimeout(beginAnimate,5000);
};
*/
