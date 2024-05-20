
function burgerMenu(){
    
    if(document.getElementById("panel").style.display == "block"){
       document.getElementById("panel").style.display = "none";     
    }else{
      document.getElementById("panel").style.display = "block";     
      document.getElementById("login").style.display = "none";  
    }
}

function loginMenu(){
    
    if(document.getElementById("login").style.display == "block"){
       document.getElementById("login").style.display = "none";     
    }else{
      document.getElementById("login").style.display = "block"; 
      document.getElementById("panel").style.display = "none";     
    }
}