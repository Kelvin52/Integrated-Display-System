
 function doDate(){

  var str = "";

  var days = new Array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
  var months = new Array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
  var now = new Date();

  str = days[now.getDay()] + ", " + now.getDate() + " " + months[now.getMonth()] + " " + now.getFullYear() + " " + now.getHours() +":" + now.getMinutes() + ":" + now.getSeconds();


  document.getElementById("time").innerHTML =  str ;
 }
setInterval(doDate, 1000);

/* var timeouttime = 5000; */
var timeout = setTimeout(function() {
  window.location.href = "Promo_Vid.html";
}, timeouttime);

function ResetRedir(){
  console.log("mouse clicked");
  clearTimeout(timeout);
  timeout = setTimeout(function() {
    window.location.href = "Promo_Vid.html";
  }, timeouttime);
}

//window.addEventListener("click",ResetRedir); alt if onmousedown doesn't work
  
 /* function doDate(){

    var str = "";
    var days = new Array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
    var months = new Array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
    var seconds;
    var now = new Date();

    str += days[now.getDay()] + ", " + now.getDate() + " " + months[now.getMonth()] + " " + now.getFullYear() + " " + now.getHours() +":" + now.getMinutes(); // + ":" + now.getSeconds();


    document.getElementById("time").innerHTML =  str ;
}
	
setInterval(doDate, 1000); */

//document.getElementById('hnsButt').onclick = "location.href = 'http://127.0.0.1:8080/health%20And%20Safety%20Page.html'";
	
//document.getElementById('TTbutt').onclick = "location.href = 'http://127.0.0.1:8080/Prototype2.html'";
	
