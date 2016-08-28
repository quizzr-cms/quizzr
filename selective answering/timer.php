<script>
function setCookie(cname,cvalue)
{
var d = new Date();
d.setTime(d.getTime()+(24*60*60*1000));
var expires = "expires="+d.toGMTString();
document.cookie = cname + "=" + cvalue + "; " + expires;
}
function getCookie(cname)
{
var name = cname + "=";
var ca = document.cookie.split(';');
for(var i=0; i<ca.length; i++) 
  {
  var c = ca[i].trim();
  if (c.indexOf(name)==0) return c.substring(name.length,c.length);
  }
return "";
}

//check existing cookie
cook=getCookie("timer");

if(cook==""){
   //cookie not found, so set seconds=60
   var seconds = 10;
}else{
     seconds = cook;
     console.log(cook);
}

function secondPassed() {
    var minutes = Math.round((seconds - 30)/60);
    var remainingSeconds = seconds % 60;
    if (remainingSeconds < 10) {
        remainingSeconds = "0" + remainingSeconds; 
    }
    //store seconds to cookie
    setCookie("timer",seconds); //here 5 is expiry days
    
    document.getElementById('countdown').innerHTML = minutes + ":" +    remainingSeconds;
    if (seconds == 0) {
        clearInterval(countdownTimer);
		document.cookie = "timer=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
       window.location='timeuphandle.php';
		
    } else {    
        seconds--;
    }
}

var countdownTimer = setInterval(secondPassed, 1000);

</script>
<style>
.timer {
	font-size:30px;
}
</style>
<span id="countdown" class="timer"></span>