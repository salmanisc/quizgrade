// SCROLL TO TOP ===============================================================================
$(function() {
	$(window).scroll(function() {
		if($(this).scrollTop() != 0) {
			$('#toTop').fadeIn();	
		} else {
			$('#toTop').fadeOut();
		}
	});
 
	$('#toTop').click(function() {
		$('body,html').animate({scrollTop:0},500);
	});	
	
});


 		
	$('.togglehandle').click(function()
	{
		$(this).toggleClass('active')
		$(this).next('.toggledata').slideToggle()
	});

// alert close 
	$('.clostalert').click(function()
	{
	$(this).parent('.alert').fadeOut ()
	});	
	

 	
$('.tooltip-test').tooltip();


 	
	var $acdata = $('.accrodian-data'),
		$acclick = $('.accrodian-trigger');

	$acdata.hide();
	$acclick.first().addClass('active').next().show();	
	
	$acclick.on('click', function(e) {
		if( $(this).next().is(':hidden') ) {
			$acclick.removeClass('active').next().slideUp(300);
			$(this).toggleClass('active').next().slideDown(300);
		}
		e.preventDefault();
	});
				

 				   
$(".news-strip ul li").click(function(){
    window.location=$(this).find("a").attr("href");return false;
});
 


	
	
