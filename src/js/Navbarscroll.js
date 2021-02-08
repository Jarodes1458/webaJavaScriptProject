
$(document).ready(function(){
  $(window).scroll(function(){
  	var scroll = $(window).scrollTop();
	  if (scroll > 1700) {
      $("#banner").css("background" , "#333");
      document.getElementById("banner").style.top = "-100px";
	  }
    else if (scroll < 700)
      {
        $("#banner").css("background" , "none");  
        document.getElementById("banner").style.top = "0";
      }
      else
      {
        $("#banner").css("background" , "#333");  
        document.getElementById("banner").style.top = "0";	
      }
        
  })
})