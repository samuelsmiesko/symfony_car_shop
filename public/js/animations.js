


//$(document).ready(function(){
    var username = localStorage.getItem("variable");

    console.log(username);
    console.log(localStorage.getItem("variable") === "white");
    if (localStorage.getItem("variable") === "white") {
        $("#myImg").attr("href", "../css/white.css");
        console.log("is white");
    }else{
        $("#myImg").attr("href", "../css/black.css");
        console.log("is black");
    }
    
    $("#BlackWhite").click(function(){
        
        if($("#myImg").attr('href') == '../css/white.css'){
            $("#myImg").attr("href", "../css/black.css");
            localStorage.setItem("variable", "black");
        }else{
            $("#myImg").attr("href", "../css/white.css"); 
            localStorage.setItem("variable", "white");   
        }
    });
//});




// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// When the user clicks on <span> (x), close the modal
myBtn.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}