function clickFunction(tcode,aid,count){
               

              var ajaxRequest;  
               
               try {
                  // Opera 8.0+, Firefox, Safari
                  ajaxRequest = new XMLHttpRequest();
               }catch (e) {
                  // Internet Explorer Browsers
                  try {
                     ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
                  }catch (e) {
                     try{
                        ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
                     }catch (e){
                        // Something went wrong
                        alert("Your browser broke!");
                        return false;
                     }
                  }
               }
               
               // Create a function that will receive data 
               // sent from the server and will update
               // div section in the same page.
          
               ajaxRequest.onreadystatechange = function(){
                  if(ajaxRequest.readyState == 4){
                     var ajaxDisplay = document.getElementById(aid);
                     ajaxDisplay.innerHTML = ajaxRequest.responseText;
                  }
               }
               
               // Now get the value from user and pass it to
               // server script.


            
               var queryString = "?code=" + tcode + "&aid="+ aid;
        
               count = count + 1; 

               if(tcode == 1){
                queryString +="&likes="+ count;
               }else if (tcode == 2){
                queryString +="&dislikes="+ count;
               }


               
               ajaxRequest.open("GET", "posts.php" + queryString, true);
               ajaxRequest.send(null); 
}


         
//Browser Support Code
function ajaxFunction(code){
var gobtn = document.getElementById("go-btn");
///////////////////////// RANGE SLIDER SCRIPT //////////////////////////////
var slider1 = document.getElementById("minRange");
var output1 = document.getElementById("minRangeValue");
output1.innerHTML = slider1.value; // Display the default slider value



// Update the current slider value (each time you drag the slider handle)
slider1.oninput = function() {
  output1.innerHTML = this.value;
}

var slider = document.getElementById("maxRange");
var output = document.getElementById("maxRangeValue");
output.innerHTML = slider.value; // Display the default slider value

// Update the current slider value (each time you drag the slider handle)
slider.oninput = function() {
                output.innerHTML = this.value;
}

//////////////////////////////////////////////////////////////////////////////
if(code == "zip"){
slider1.value = 0;
slider.value = 5000;
gobtn.innerHTML = "Reset";
}



var ajaxRequest;  

try {
  // Opera 8.0+, Firefox, Safari
  ajaxRequest = new XMLHttpRequest();
}catch (e) {
  // Internet Explorer Browsers
  try {
     ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
  }catch (e) {
     try{
        ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
     }catch (e){
        // Something went wrong
        alert("Your browser broke!");
        return false;
     }
  }
}

// Create a function that will receive data 
// sent from the server and will update
// div section in the same page.

ajaxRequest.onreadystatechange = function(){
  if(ajaxRequest.readyState == 4){
     var ajaxDisplay = document.getElementById('ajaxDiv');
     ajaxDisplay.innerHTML = ajaxRequest.responseText;
  }
}

// Now get the value from user and pass it to
// server script.


var zip = document.getElementById('zip').value;
var minRange = document.getElementById('minRange').value;
var maxRange = document.getElementById('maxRange').value;


// //If Empty Zip
// if(zip == ""){
//   code = "-1";
// }


var queryString = "?code=" + code ;





queryString +="&zip="+ zip+ "&minRange=" + minRange + "&maxRange=" + maxRange;
ajaxRequest.open("GET", "feed.php" + queryString, true);
ajaxRequest.send(null); 
}
//-->