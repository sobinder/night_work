jQuery(function($) {
$(document).ready(function() {

/*
if($('#bh-sl-address').val() == ''){
     function explode(){
   // $('html, body').animate({scrollTop:$(".simple-locator-form").offset().top - 80}, 600);
   // $('#bh-sl-address').trigger('focus');
  //  $('.address-input').tooltip('show');
      $('.location-distance, .loc-dist, .loc-directions').hide();
}
setTimeout(explode,600);
}

else {
  function explodes(){
   // $('html, body').animate({scrollTop:$(".simple-locator-form").offset().top - 80}, 600);
   // $('#bh-sl-address').trigger('focus');
  //  $('.address-input').tooltip('show');
      $('.location-distance, .loc-dist, .loc-directions').show();
}
setTimeout(explodes,600);
}

$("body").on("change","#bh-sl-address",function(){
   $('.location-distance, .loc-dist, .loc-directions').show();
  //  e.preventDefault();
});

$("body").on("click",".loc-directions a",function(e){
   //  e.preventDefault();
});

*/  

$(document).on('keyup', '#zip', function(e) {
		var leng = $(this).val().length;
		if(leng > 4) {
			$('input#bh-sl-address').val($(this).val());
			$('form#bh-sl-user-location').submit();
			$("#location").find('option').remove();
			$(".menu-891").addClass("loading");
			setTimeout(function() {
				$("ul.list option:lt(5)").each(function(i) {
					$(this).clone().appendTo("#location");
					$(".menu-891").removeClass("loading")
				})
			},2000);
		}
	});
	$(".wpcf7").on('wpcf7:mailsent', function(event) {
		$("#location").find('option').remove()
	});
});
}(jQuery))
