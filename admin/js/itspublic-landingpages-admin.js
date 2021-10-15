(function( $ ) {
	$(document).ready(function() {

		// When the Upload button is clicked...
		$('body').on('click', '.upload-form .btn-upload', function(e){
			e.preventDefault;

			var fd = new FormData();
			var files_data = $('.upload-form .files-data'); // The <input type="file" /> field

			// Loop through each data and create an array file[] containing our files data.
			$.each($(files_data), function(i, obj) {
				$.each(obj.files,function(j,file){
					fd.append('files[' + j + ']', file);
				})
			});

			// our AJAX identifier
			fd.append('action', 'cvf_upload_files');

			// uncomment this code if you do not want to associate your uploads to the current page.
			//fd.append('post_id', <?php echo $post->ID; ?>);

			$.ajax({
				type: 'POST',
				url: ip_ajax_obj.ajaxUrl,
				data: fd,
				contentType: false,
				processData: false,
				success: function(response){
					$('.upload-response').html(response); // Append Server Response
				}
			});
		});

	});

})( jQuery );
