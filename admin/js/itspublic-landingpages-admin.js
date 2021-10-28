(function( $ ) {
	$(document).ready(function() {

		Dropzone.autoDiscover = false; // Disable auto discover to prevent Dropzone being attached twice

		// init DropzoneJS
		var myDropzone = new Dropzone("div#mwp-dropform-uploder", {

			url: ip_ajax_obj.ajaxUrl,
			params: {
				'mwp-dropform-nonce': $('#mwp-dropform-nonce').val()
			},
			paramName: "mwp-dropform-file", // name of file field
			acceptedFiles: 'application/pdf,.ppt', // accepted file types
			maxFilesize: 20, // MB
			addRemoveLinks: false,

			//success file upload handling
			success: function (file, response) {
				// handle your response object
				console.log(response.status);

				file.previewElement.classList.add("dz-success");
				file['attachment_id'] = response.attachment_id; // adding uploaded ID to file object
			},

			//error while handling file upload
			error: function (file,response) {
				file.previewElement.classList.add("dz-error");
			}

		});


		// When the Upload button is clicked...
		// $('body').on('click', '.upload-form .btn-upload', function(e){
		// 	e.preventDefault;
		//
		// 	var fd = new FormData();
		// 	var files_data = $('.upload-form .files-data'); // The <input type="file" /> field
		//
		// 	// Loop through each data and create an array file[] containing our files data.
		// 	$.each($(files_data), function(i, obj) {
		// 		$.each(obj.files,function(j,file){
		// 			fd.append('files[' + j + ']', file);
		// 		})
		// 	});
		//
		// 	// our AJAX identifier
		// 	fd.append('action', 'cvf_upload_files');
		//
		// 	// uncomment this code if you do not want to associate your uploads to the current page.
		// 	//fd.append('post_id', <?php echo $post->ID; ?>);
		//
		// 	$.ajax({
		// 		type: 'POST',
		// 		url: ip_ajax_obj.ajaxUrl,
		// 		data: fd,
		// 		contentType: false,
		// 		processData: false,
		// 		success: function(response){
		// 			$('.upload-response').html(response); // Append Server Response
		// 		}
		// 	});
		// });

	});

})( jQuery );
