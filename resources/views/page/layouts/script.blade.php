<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.2/js/bootstrap.min.js"></script>
<script src="/page/lib/easing/easing.min.js"></script>
<script src="/page/lib/owlcarousel/owl.carousel.min.js"></script>

<!-- Contact Javascript File -->
<script src="/page/mail/jqBootstrapValidation.min.js"></script>
<script src="/page/mail/contact.js"></script>

<!-- Template Javascript -->
<script src="/page/js/main.js"></script>
<script>
  $(function(){
	$('.mhn-slide').owlCarousel({
		nav:true,
		//loop:true,
		slideBy:'page',
		rewind:false,
		responsive:{
			0:{items:1},
			480:{items:2},
			600:{items:3},
			1000:{items:4}
		},
		smartSpeed:70,
		onInitialized:function(e){
			$(e.target).find('img').each(function(){
				if(this.complete){
					$(this).closest('.mhn-inner').find('.loader-circle').hide();
					$(this).closest('.mhn-inner').find('.mhn-img').css('background-image','url('+$(e.target).attr('src')+')');
				}else{
					$(this).bind('load',function(e){
						$(e.target).closest('.mhn-inner').find('.loader-circle').hide();
						$(e.target).closest('.mhn-inner').find('.mhn-img').css('background-image','url('+$(e.target).attr('src')+')');
					});
				}
			});
		},
		navText:['<svg viewBox="0 0 24 24"><path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z"></path></svg>','<svg viewBox="0 0 24 24"><path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"></path></svg>']
	});
});
</script>