<?php
class UploadDocs {
	/**
	 * Holds the values to be used in the fields callbacks
	 */
	private $options;

	/**
	 * Start up
	 */
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'add_docs_upload_page' ) );
		add_action( 'wp_ajax_cvf_upload_files', array($this, 'cvf_upload_files') );
	}

	/**
	 * Add docs upload page
	 */
	public function add_docs_upload_page () {
		add_menu_page(
			'Upload Documents',
			'Upload Docs',
			'manage_options',
			'upload-ip-docs',
			array( $this, 'upload_docs_admin_page' ),
			'dashicons-cloud-upload'
		);
	}
	/**
	 * Options page callback
	 */
	public function upload_docs_admin_page () {
		?>
		<div class="wrap upload-form" id="mwp-dropform-wrapper">
            <div id="mwp-dropform-uploder" class="dropzone"></div>
		</div>
		<?php
	}

	public function cvf_upload_files(){

		if (!empty($_FILES)) {

			foreach ($_FILES as $file => $array) {
				if ($_FILES[$file]['error'] !== UPLOAD_ERR_OK) { // If there is some errors, during file upload
					wp_send_json(array('status' => 'error', 'message' => __('Error: ', 'mwp-dropform') . $_FILES[$file]['error']));
				}

				// HANDLE RECEIVED FILE
				$create_doc = wp_insert_post(array(
					'post_title' => $array['name'],
					'post_status'  => 'publish',
					'post_type' => 'doc'
				));

				$post_id = $create_doc; // Set post ID to attach uploaded image to specific post

				$attachment_id = media_handle_upload($file, $post_id);

                update_field('ip_doc', $attachment_id, $post_id);

				if (is_wp_error($attachment_id)) { // Check for errors during attachment creation
					wp_send_json(array(
						'status' => 'error',
						'message' => __('Error while processing file', 'mwp-dropform'),
					));
				} else {
					wp_send_json(array(
						'status' => 'ok',
						'attachment_id' => $attachment_id,
						'message' => __('File uploaded', 'mwp-dropform'),
					));
				}
			}
		}
		wp_send_json(array('status' => 'error', 'message' => __('There is nothing to upload!', 'mwp-dropform')));
	}
}

if( is_admin() )
	$upload_docs = new UploadDocs();
