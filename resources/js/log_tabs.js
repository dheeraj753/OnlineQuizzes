function change_tab(status){
	if(status==1){
		document.getElementById("login").style.display="block";
		document.getElementById("register").style.display="none";
		document.getElementById("l").style.background="#b0a18e";
		document.getElementById("r").style.background="#97743a";
	}
	else{
		document.getElementById("register").style.display="block";
		document.getElementById("login").style.display="none";
		document.getElementById("l").style.background="#97743a";
		document.getElementById("r").style.background="#b0a18e";
	}
}