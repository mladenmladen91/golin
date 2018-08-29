$ = jQuery.noConflict();
$(document).ready(function(){
  
// when clicking on nav button nav-menu pops out
  $('#hamburger').click(function(e){

  	e.preventDefault();
  	$(this).toggleClass("transX");
  	$('#nav2').slideToggle(500);
  });
    
    

 //removing the results
 setInterval(function(){$('#confirm').remove();}, 3000); 		
 
// offices changing
    $(".offices_location a").click(function(e){
         e.preventDefault();
        
         $(".location_active").removeClass("location_active");
         $(".offices_default").removeClass("offices_default");
         
         $(this).addClass("location_active");
         $name = $(this).text().toLowerCase();
        
         $("."+$name).addClass("offices_default");
         
    }); 

// when we click on the link it goes to the direction
	$("#nav1 a, #nav2 a").click(function(e){
		e.preventDefault();
    var source = $(this).attr("href");
		var target = $(source).offset().top;
		$("#nav2").slideUp(500);
		$("#hamburger").removeClass("transX");
		$('html,body').animate({
			scrollTop: target
		},800,'linear');
	}); 

// date picker 
 $("#date_picker").datepicker({dateFormat: 'yy-mm-dd'}); 
    
	
});