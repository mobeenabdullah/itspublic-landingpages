(function( $ ) {
	$(document).ready(function() {
		$('.upload-form').hide();
		$('.reset-btn').hide();

		function uploadDocs(catId){
			// init DropzoneJS
			var myDropzone = new Dropzone("div#mwp-dropform-uploder", {

				url: ip_ajax_obj.ajaxUrl + "&docCat=" + catId,
				paramName: "mwp-dropform-file", // name of file field
				acceptedFiles: 'application/pdf,.ppt,.pptx,.xlsx, .xls', // accepted file types
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
		}

		Dropzone.autoDiscover = false; // Disable auto discover to prevent Dropzone being attached twice
		var newUploadURL = ip_ajax_obj.ajaxUrl;

		$('body').on('change', '.doc-taxonomy-form-input', function(){
			uploadDocs($(this).val());
			$('.upload-form').show();

			$('.doc-taxonomy-form-input').attr('disabled', 'disabled');
			$('.reset-btn').show();
		});

	});

})( jQuery );
