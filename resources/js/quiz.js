var sec=59;
var current=1;
var i;var j;var myVar;var answered;

function sub(){
		document.getElementById("qq").submit();
}
function counter(){
	time--;
	//document.getElementById("counter").innerHTML=time+":"+sec;
	myVar = setInterval(function(){
		if(sec==0){
			time--;
			sec=60;
		}
		if(time>=0){
			if(sec>=0){
				sec--;
				//document.getElementById("counter").innerHTML=time+":"+sec;
			}
		}
		document.getElementById("rtm").value=(time*60)+sec;
		if(time==0&&sec==0)
			document.forms[0].submit();
		},1000);
}
function change_ques(id){
	if(id>total)
		id=total;
	else if(id<=0)
		id=1;
	current=id;
	for(i=0;i<total;i++){
		if((i+1)==id){
			document.getElementById("curr"+(i+1)).setAttribute("class","active");
		}
		else{
			document.getElementById("curr"+(i+1)).removeAttribute("class");
		}
		answered = document.getElementsByName("q"+(i+1)+"");
		for (var j = 0, length = answered.length; j < length; j++) {
			if (answered[j].checked) {
				document.getElementById("curr"+(i+1)).style.background="#4dff4d";
				break;
			}
		}
	}
	for(i=0;i<total;i++){
		for(j=0;j<=6;j++){
			if((i+1)==id){
				document.getElementById("q"+(i+1)+""+j).style.display="block";
			}
			else{
				document.getElementById("q"+(i+1)+""+j).style.display="none";
			}
		}
	}
}
function detect_page_close(){
	setInterval(function(){
		if(sessionStorage.refresh==2){
			sub();
			sessionStorage.clear();
		}
		},10);
}