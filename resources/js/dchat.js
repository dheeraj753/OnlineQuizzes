var count=0;var diff=0;var temp=0;
function get_content(){
	myVar = setInterval(function(){
		$.post("../resources/controller/ajax.php?stat=2",{rid:rid},
			function(data, status){
				if(document.getElementById("dchat").innerHTML!=data){
					document.getElementById("dchat").innerHTML=data;
					$('#dchat').scrollTop($('#dchat').get(0).scrollHeight);
				}
			}
		);
	},300);
};
function post_comment(){
	var content=document.getElementById("content").value;
	$.post("../resources/controller/ajax.php?stat=0",{content:content,did:did,uid:uid,rid:rid},
		function(data, status){
		}
	);
	document.getElementById("content").value="";
}