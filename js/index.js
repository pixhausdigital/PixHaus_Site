// JavaScript Document
$(document).ready(function(e) {
	var getUrlParameter = function getUrlParameter(sParam) {
    	var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        	sURLVariables = sPageURL.split('&'),
        	sParameterName,
        	i;

	    for (i = 0; i < sURLVariables.length; i++) {
	        sParameterName = sURLVariables[i].split('=');
	
    	    if (sParameterName[0] === sParam) {
    	        return sParameterName[1] === undefined ? true : sParameterName[1];
    	    }
    	}
	};
	var lang = getUrlParameter('lang');
	if(lang == "pt" || lang == undefined){
		$("#ptSelect .notSelected").hide();
		$("#ptSelect .selected").show();	
	}else{
		$("#enSelect .notSelected").hide();
		$("#enSelect .selected").show();
	}
	
	if(jQuery.browser.mobile == false){
		$(".mobile").hide();	
	}else{
		$(".desktop").hide();
	}
	$(".weDoFloater").data("locked",false);
    $(".weDoFloater").hover(function(){
    	if($(this).data("locked") == false){
			$(this).find(".weDoOverlay").fadeIn();
		}
    }, function(){
		if($(this).data("locked") == false){
    		$(this).find(".weDoOverlay").fadeOut();
		}
	});
	 $(".weDoFloater").click(function(){
    	if($(this).data("locked") == false){
			$(this).find(".weDoOverlay").fadeIn();
			$(this).data("locked",true);
		}else{
			$(this).data("locked",false);
			$(this).find(".weDoOverlay").fadeOut();	
		}
	 });
	 $(".anchorMenu").click(function(){
		var id = $(this).attr("data-linkTo");
		$('html,body').animate({scrollTop: $("#"+id).offset().top},600, function(){
				setTimeout(function(){
					$('#headerContainer').removeClass('nav-down').addClass('nav-up');
				}, 200);
				//alert("boo");
			});
			$("#anchorMenuHamburger").hide();
			$("#anchorMenuHamburger").data("shown",false);
	 });
	
	 $("#hamburgerMenu").click(function(){
		 if($("#anchorMenuHamburger").data("shown") == true){
			$("#anchorMenuHamburger").hide();
			$("#anchorMenuHamburger").data("shown",false);
		 }else{
		 	$("#anchorMenuHamburger").show();
			$("#anchorMenuHamburger").data("shown",true);
		 }
	 });
	 var didScroll;
var lastScrollTop = 0;
var delta = 10;
var navbarHeight = $("#headerContainer").outerHeight();
//alert(navbarHeight);
// on scroll, let the interval function know the user has scrolled
$(window).scroll(function(event){
  didScroll = true;
});
// run hasScrolled() and reset didScroll status
setInterval(function() {
  if (didScroll) {
    hasScrolled();
    didScroll = false;
  }
}, 250);
function hasScrolled() {
	var st = $(this).scrollTop();
    //alert(Math.abs(lastScrollTop - st) <= delta);
    // Make sure they scroll more than delta
    if(Math.abs(lastScrollTop - st) <= delta)
        return;
    
    // If they scrolled down and are past the navbar, add class .nav-up.
    // This is necessary so you never see what is "behind" the navbar.
    if (st > lastScrollTop && st > navbarHeight){
		//alert("hide");
        // Scroll Down
        $('#headerContainer').removeClass('nav-down').addClass('nav-up');
		if($("#anchorMenuHamburger").data("shown") == true){
			$("#anchorMenuHamburger").hide();
			$("#anchorMenuHamburger").data("shown",false);
		 }
    } else {
		//alert("show");
        // Scroll Up
        if(st + $(window).height() < $(document).height()) {
            $('#headerContainer').removeClass('nav-up').addClass('nav-down');
			if($("#anchorMenuHamburger").data("shown") == true){
				$("#anchorMenuHamburger").hide();
				$("#anchorMenuHamburger").data("shown",false);
		 	}
        }
    }
    
    lastScrollTop = st;
}

	$("#submitButton").click(function(event) {
		$("#formDialog").dialog( "close" )
		$("#formDialog").html("");
        event.preventDefault();
		$.ajax({
  			type: "POST",
  			url: 'ajax/sendMail.php',
  			data: $("#mailForm").serialize(),//+"&token="+browserToken,
  			success: function(response)
  		{
			//alert(response);
			$("#hiddenStuff").append(response);
			var res =JSON.parse(response);
			if(res.errors.missing !== undefined) {
				$.each(res.errors.missing, function(k, v) {
            		if(v == "name"){
						$("#formDialog").append("<div>"+dialogText.missing.name+"</div>");
					}
					if(v == "email"){
						$("#formDialog").append("<div>"+dialogText.missing.email+"</div>");
					}
					if(v == "subject"){
						$("#formDialog").append("<div>"+dialogText.missing.subject+"</div>");
					}
					if(v == "message"){
						$("#formDialog").append("<div>"+dialogText.missing.message+"</div>");
					}
       			});
			}
			
			if(res.errors.validate !== undefined) {
				$.each(res.errors.validate, function(k, v) {
            		if(v == "name"){
						$("#formDialog").append("<div>"+dialogText.invalid.name+"</div>");
					}
					if(v == "email"){
						$("#formDialog").append("<div>"+dialogText.invalid.email+"</div>");
					}
       			});
			}
			if(res.errors.security !== undefined) {
				//alert(res.errors.security);
				$("#formDialog").append("<div>"+dialogText.failure+"</div>");
				
			}
			if(res.success == true){
				$("#formDialog").append("<div>"+dialogText.success+"</div>");
			}
			
			$("#formDialog").dialog( "open" ).parent().position({ my: 'center center', at: 'center', of: '#contactContainer' });
  		}
});
    });

	$( "#formDialog" ).dialog({
 		appendTo: "#contactContainer",
		position : { my: "center center", at: "center", of: "#contactContainer" },
		title: dialogText.title,
		width: "auto",
		buttons: [
    {
      text: dialogText.buttonText,
      click: function() {
        $( this ).dialog( "close" );
      }
 
      // Uncommenting the following line would hide the text,
      // resulting in the label being used as a tooltip
      //showText: false
	}]
	,autoOpen: false
	});//.parent().position({ my: 'center center', at: 'center', of: '#contactContainer' });

});



var id;
$(window).resize(function() {
    clearTimeout(id);
    id = setTimeout(doneResizing, 500);
    
});

function doneResizing(){
	$("#anchorMenuHamburger").hide();
	$("#anchorMenuHamburger").data("shown",false);   
}
