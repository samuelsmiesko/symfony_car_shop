


//$(document).ready(function(){
    var username = localStorage.getItem("variable");

    
    if (localStorage.getItem("variable") === "white") {
        $("#myImg").attr("href", "../css/white.css");
        console.log("is white");
    }else{
        $("#myImg").attr("href", "../css/black.css");
        
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





