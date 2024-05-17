


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





