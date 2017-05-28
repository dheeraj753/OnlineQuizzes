var qcount=1;
var opcount=new Array();
opcount[0]=2;
var current=1;
function add_ques(){
	var i;
	var j;
	for(i=0;i<qcount;i++){
		for(j=0;j<=opcount[i];j++){
			document.getElementById("q"+(i+1)+"."+j).style.display="none";
		}
	}
	qcount++;current=qcount;
	opcount[qcount-1]=2;
	var table=document.getElementById("ques_table");
	var add_index=table.rows.length;
	var new_row=table.insertRow(add_index-3);
	new_row.setAttribute("id","q"+current+".0");
	var cell1 = new_row.insertCell(0);
	cell1.setAttribute("colspan","2");
	cell1.innerHTML='<textarea class="form-control" name="q'+qcount+'0"></textarea><input id="'+qcount+'" type="hidden" value="1" name="'+qcount+'">';
	var cell2;var add_index;var new_row;
	for(i=0;i<2;i++){
		table=document.getElementById("ques_table");
		add_index=table.rows.length;
		new_row=table.insertRow(add_index-3);
		
		
		new_row.setAttribute("id","q"+current+"."+(i+1));
		new_row.setAttribute("class","input-group")
		cell1 = new_row.insertCell(0);
		cell2 = new_row.insertCell(1);
		cell1.setAttribute("class","input-group-addon");
		
		////////////////////////////////////////////////
		cell1.setAttribute("id",qcount+"."+(i+1));
		cell1.setAttribute("onclick","set_ans(this.id)");
		////////////////////////////////////////////////
		
		cell2.setAttribute("class","form-group nopadding");
		cell1.innerHTML=String.fromCharCode(65+i);
		cell2.innerHTML='<input class="form-control" type="text" name="q'+qcount+''+(i+1)+'"/>';
	}
	document.getElementById("num_ques").value=qcount;
	set_ans(qcount+".1");
}
function add_opt(){
	if(opcount[current-1]<6){
		var table=document.getElementById("ques_table");
		var new_row_index=document.getElementById("q"+current+"."+opcount[current-1]).rowIndex;
		var new_row=table.insertRow(new_row_index+1);
		new_row.setAttribute("id","q"+current+"."+(opcount[current-1]+1));
		new_row.setAttribute("class","input-group");
		
		
		var cell1 = new_row.insertCell(0);
		var cell2 = new_row.insertCell(1);
		cell1.setAttribute("class","input-group-addon");
		
		////////////////////////////////////////////////
		cell1.setAttribute("id",current+"."+(opcount[current-1]+1));
		cell1.setAttribute("onclick","set_ans(this.id)");
		cell1.style.background="#ff4d4d";
		////////////////////////////////////////////////
		
		cell2.setAttribute("class","form-group nopadding");
		cell1.innerHTML=String.fromCharCode(65+opcount[current-1]);
		cell2.innerHTML='<input class="form-control" type="text" name="q'+current+''+(opcount[current-1]+1)+'"/>';
		opcount[current-1]++;
	}
}
function set_ans(id){
	//document.getElementById("title").value=id;
	var i;
	var str="";
	for(i=0;i<opcount[current-1];i++){
		str=current+"."+(i+1);
		if(str==id){
			document.getElementById(id).style.background="#4dff4d";
			document.getElementById(current).value=(i+1);
		}
		else{
			document.getElementById(str).style.background="#ff4d4d";
		}
	}
}
function change_ques(direction){
	if(direction==1){
		current++;
	}
	else if(direction==0){
		current--;
	}
	if(current>qcount) current=qcount;
	else if(current<1) current=1;
	var i;
	var j;
	for(i=0;i<qcount;i++){
		for(j=0;j<=opcount[i];j++){
			if((i+1)==current){
				document.getElementById("q"+(i+1)+"."+j).style.display="block";
			}
			else{
				document.getElementById("q"+(i+1)+"."+j).style.display="none";
			}
		}
	}
}