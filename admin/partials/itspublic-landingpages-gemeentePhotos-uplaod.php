<?php

class UploadGemeentePhoto {
    /**
    	 * Holds the values to be used in the fields callbacks
    	 */
	private $options;

	/**
	 * Start up
	 */
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'add_photo_upload_page' ) );
		add_action( 'wp_ajax_photo_upload_files', array($this, 'photo_upload_files') );
        add_action( 'wp_ajax_updatePhoto', array($this, 'updatePhoto') );
	}

	/**
	 * Add docs upload page
	 */
	public function add_photo_upload_page () {
		add_menu_page(
			'Upload Gemeente Photos',
			'Upload Gemeente Photos',
			'manage_options',
			'upload-ip-gemeente-photos',
			array( $this, 'upload_gemeentePhoto_admin_page' ),
			'dashicons-cloud-upload'
		);
	}

    public function upload_gemeentePhoto_admin_page () {
     ?>
        <div class="wrap" id="mwp-dropform-wrapper" >
            <div id="mwp-dropform-uploder-gemeente-photo" class="dropzone"></div>
        </div>
        <?php
    }

    public function photo_upload_files(){

        if (!empty($_FILES)) {

            foreach ($_FILES as $file => $array) {
                if ($_FILES[$file]['error'] !== UPLOAD_ERR_OK) { // If there is some errors, during file upload
                    wp_send_json(array('status' => 'error', 'message' => __('Error: ', 'mwp-dropform') . $_FILES[$file]['error']));
                }

                $file_name = explode(".", $array['name']);
                $post_name = ucfirst($file_name[0]);
                $post_name = str_replace('_', ' ', $post_name);
                $description = 'Alle publicaties voor '. $post_name .' staan hier op een rijtje, direct te downloaden.';
                // HANDLE RECEIVED FILE
                $create_doc = wp_insert_post(array(
                    'post_title' => $post_name,
                    'post_status'  => 'publish',
                    'post_type' => 'gemeente',
                ));

                $post_id = $create_doc; // Set post ID to attach uploaded image to specific post

                update_post_meta($post_id, '_yoast_wpseo_metadesc', $description );
                $attachment_id = media_handle_upload($file, $post_id);
                set_post_thumbnail($post_id, $attachment_id);

                if (is_wp_error($attachment_id)) { // Check for errors during attachment creation
                    wp_send_json(array(
                        'status' => 'error',
                        'message' => __('Error while processing file', 'mwp-dropform'),
                    ));
                } else {
                    wp_send_json(array(
                        'status' => 'ok',
                        'attachment_id' => $attachment_id,
                        'post_id' => $post_id,
                        'message' => __('File uploaded', 'mwp-dropform'),
                    ));
                }
            }
        }
        wp_send_json(array('status' => 'error', 'message' => __('There is nothing to upload!', 'mwp-dropform')));
    }
    public  function  updatePhoto(){
        $my_data = $_POST['Licence'];
        update_field('maker', $_POST['PhotoGrapher'] , $_POST['post_id']);
        update_field('rechten', $my_data, $_POST['post_id']);

        wp_die();
    }
}

if( is_admin() )
    $UploadGemeentePhoto = new UploadGemeentePhoto();