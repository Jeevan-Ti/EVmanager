function getdata() {
	var oldengstat = $('#enginestat').html();
	var olddoorstat = $('#doorstat').html();
	var oldheadlightstat = $('#headlightstat').html();
	var oldwindowstat = $('#windowstat').html();
	var oldalarmstat = $('#alarmstat').html();
	var oldbatterystat = $('#batterystat').html();
	var oldpressurestat = $('#pressurestat').html();
	$.get("core/classes/heart.php?allstat=1",function(data,status){
data = data.split("*#");
if(data[0]=='0' && (oldengstat=="Roaring" || oldengstat=="----")){
	$("#enginestat").html("Sleeping");
	document.getElementById('engtoff').style.display = "none";	
	document.getElementById('engton').style.display = "block";	

}else if(data[0]=='1' && (oldengstat=="Sleeping" || oldengstat=="----")){
	$("#enginestat").html("Roaring");
	document.getElementById('engton').style.display = "none";	
	document.getElementById('engtoff').style.display = "block";	

}
if(data[1]=='0' && (olddoorstat=="Locked" || olddoorstat=="----")){
	$("#doorstat").html("Un-Locked");
	document.getElementById('doorun').style.display = "none";	
	document.getElementById('doorl').style.display = "block";	
	
}else if(data[1]=='1' && (olddoorstat=="Un-Locked" || olddoorstat=="----")){
	$("#doorstat").html("Locked");
	document.getElementById('doorl').style.display = "none";	
	document.getElementById('doorun').style.display = "block";	
	
}
if(data[2]=='0' && (oldheadlightstat=="On" || oldheadlightstat=="----")){
	$("#headlightstat").html("Off");
	document.getElementById('hlof').style.display = "none";	
	document.getElementById('hlon').style.display = "block";	
	
}else if(data[2]=='1' && (oldheadlightstat=="Off" || oldheadlightstat=="----")){
	$("#headlightstat").html("On");
	document.getElementById('hlon').style.display = "none";	
	document.getElementById('hlof').style.display = "block";	
	
}
if(data[3]=='0' && (oldwindowstat=="Closed" || oldwindowstat=="----")){
	$("#windowstat").html("Open");
	document.getElementById('won').style.display = "none";	
	document.getElementById('wof').style.display = "block";	
	
}else if(data[3]=='1' && (oldwindowstat=="Open" || oldwindowstat=="----")){
	$("#windowstat").html("Closed");
	document.getElementById('wof').style.display = "none";	
	document.getElementById('won').style.display = "block";	
	
}
if(data[4]=='0' && (oldalarmstat=="Ringing" || oldalarmstat=="----")){
	$("#alarmstat").html("Sleeping");
	document.getElementById('sal').style.display = "none";	
	document.getElementById('ral').style.display = "block";	
	
}else if(data[4]=='1' && (oldalarmstat=="Sleeping" || oldalarmstat=="----")){
	$("#alarmstat").html("Ringing");
	document.getElementById('ral').style.display = "none";	
	document.getElementById('sal').style.display = "block";	
	
}
if(oldbatterystat!=data[5]){
$("#batterystat").html(data[5]);
}
if(oldpressurestat!=data[6]){
$("#pressurestat").html(data[6]);
}


});
	window.setInterval(function(){
  getdata();
}, 10000);
}
