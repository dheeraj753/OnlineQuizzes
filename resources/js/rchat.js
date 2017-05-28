var count=0;var diff=0;var temp=0;
function get_content(){
	myVar = setInterval(function(){
		$.post("../resources/controller/ajax.php?stat=2",{rid:rid},
			function(data, status){
				if(document.getElementById("rchat").innerHTML!=data){
					document.getElementById("rchat").innerHTML=data;
					$('#rchat').scrollTop($('#rchat').get(0).scrollHeight);
				}
				//$( "#rchat" ).append(data);
			}
		);
	},300);
};
function post_comment(){
	var content=document.getElementById("content").value;
	$.post("../resources/controller/ajax.php?stat=0",{content:content,uid:uid,rid:rid},
		function(data, status){
			//$( "#dchat" ).append(data);
		}
	);
	document.getElementById("content").value="";
}