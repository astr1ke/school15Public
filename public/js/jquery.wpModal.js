$('.wpModal').on('click submit', function() {
	
	var element = $($(this).attr('href')).clone();
	
	var ModalContent = '<div class="wpModalBody"><span class="modal_close">&times;</span>';
		ModalContent += '<div class="wpModalContent"></div>';
		ModalContent += '</div><div class="wp-overlay"></div>';
	
	$('body').append(ModalContent);
	$('.wpModalContent').html(element[0]).children().show();

	$('.wp-overlay').fadeIn(400, function(){
		$('.wpModalBody')
			.css('display', 'block')
			.animate({opacity: 1, top: '50%'}, 500);
	});
	
	/*
	var formData = $('form.wpModal').serialize();
	$.ajax({
		type: 'POST',
		url: Url,
		data: formData,
		dataType: 'html'
	}).done(function(Result) {
		$('#wpModalContent').html(Result);
	});
	*/
	return false;
});

	
$(document).on('click', '.wp-overlay, .modal_close', function(){
	$('.wpModalBody').animate({
		opacity: 0,
		top: '45%'
		}, 300, function(){ 
			$(this).remove();
			$('.wp-overlay').fadeOut(300, function(){
				$(this).remove();
			});
		}
	);
});
