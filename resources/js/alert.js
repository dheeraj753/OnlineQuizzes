function alertclose()
{
	document.getElementById("alert").style.display="none";
}
function alertsuccessclose()
{
	document.getElementById("alertsuccess").style.display="none";
}
function regfail()
{
	openNav2();
	var rf=document.getElementById("regfail");
	rf.innerHTML="<span id='al'>The user name is already taken<br>or<br>The given email is already registered</span>";
	setTimeout(function(){ rf.innerHTML=""; },5000);
}
function logfail()
{
	openNav1();
	var lf=document.getElementById("logfail");
	lf.innerHTML="<span id='al'>Invalid Username/Password</span>";
	setTimeout(function(){ lf.innerHTML=""; },5000);
}