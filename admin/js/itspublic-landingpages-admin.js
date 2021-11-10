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

		function uploadGemeentePhoto(){
			// init DropzoneJS
			var myDropzone = new Dropzone("div#mwp-dropform-uploder-gemeente-photo", {

				url: ip_ajax_obj2.ajaxUrl,
				paramName: "mwp-dropform-file", // name of file field
				acceptedFiles: 'application/png, .jpg, .jpeg', // accepted file types
				maxFilesize: 20, // MB
				addRemoveLinks: false,

				//success file upload handling
				success: function (file, response) {
					// handle your response object
					console.log(response.status);

					file.previewElement.classList.add("dz-success");
					file['attachment_id'] = response.attachment_id; // adding uploaded ID to file object

					var post_id = response.post_id;

					file.previewElement.insertAdjacentHTML("beforeend","<div class='form-wraper'>" +
							"<form method='post' class='photo-update-form'>" +
								"<div class='licence-select'>" +
									"<h3>Choose License</h3>" +
									"<div class='select'>" +
										"<input type='checkbox' class='licence' name='licence' value='zero'>" +
										"<label for='lic1'>Zero</label>" +
										"<input type='checkbox' class='licence' name='licence' value='by-attribution'>" +
										"<label for='lic2'>By attribution</label>" +
										"<input type='checkbox'  class='licence' name='licence' value='by-attribution-No-derivative'>" +
										"<label for='lic3'>By attribution, No derivative</label>" +
										"<input type='checkbox' name='licence' class='licence' value='by-attribution-Share-alike'>" +
										"<label for='lic4'>By attribution, Share alike</label>" +
										"<input type='checkbox' name='licence' class='licence' value='by-attribution-nonCommercial-ShareAlike'>" +
										"<label for='lic5'>By Attribution-NonCommercial, ShareAlike</label>" +
									"</div>" +
								"</div>" +
								"<div class='photo-maker-info'>" +
									"<h3>Photographer</h3>" +
									"<input type='text' class='photo-maker' name='photo-maker'>" +
									"<input type='button' data-post-id='"+ post_id +"' value='submit' class='updatePhoto'>" +
								"</div>" +
							"</form>" +
						"</div>");

				},

				//error while handling file upload
				error: function (file,response) {
					file.previewElement.classList.add("dz-error");
				}

			});
		}
		uploadGemeentePhoto();

		$('body').on('click', '.updatePhoto', function(){

			let SelectedButton = $(this);
			const getRechten = [];
			const mainSelector = $(this).closest('.form-wraper');
			mainSelector.addClass('active-photo');
			const getMaker = $('.active-photo .photo-maker').val();
			$(".active-photo .licence:checked").each(function(){
				getRechten.push($(this).val());
			});

			let PhotoData = {
				PhotoGrapher : getMaker,
				Licence : getRechten,
				post_id : $(this).attr('data-post-id')
			}

			$.ajax({
				type: "POST",
				url: ip_ajax_obj3.ajaxUrl,
				data: PhotoData,
			}).success(function (data) {
				mainSelector.removeClass('active-photo');
				SelectedButton.attr('value', 'Updated');
			});
		});
	});

})( jQuery );
