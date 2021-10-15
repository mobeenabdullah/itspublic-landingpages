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
		<div class="wrap upload-form">
			<h1>
                <span class="dashicons dashicons-cloud-upload" style="margin-right: 10px; font-size: 30px;"></span>
                Docs Uploader
            </h1>
            <hr>
            <table class="form-table" role="presentation">
                <tbody>
                <tr>
                    <th scope="row">Select PDF/PPT files</th>
                    <td><input type="file" name="files[]" class="files-data form-control" multiple></td>
                </tr>
                </tbody>
            </table>

            <p class="submit">
                <input type="submit" name="submit" id="submit" class="button button-primary btn-upload" value="Start Uploading">
            </p>
		</div>
		<?php
	}

	public function cvf_upload_files(){

		$valid_formats = array("jpg", "png", "gif", "bmp", "jpeg", "pdf"); // Supported file types
		$max_file_size = 1024 * 500; // in kb
		$max_image_upload = 1000; // Define how many images can be uploaded to the current post
		$wp_upload_dir = wp_upload_dir();
		$path = $wp_upload_dir['path'] . '/';
		$count = 0;

		// Image upload handler
		if( $_SERVER['REQUEST_METHOD'] == "POST" ){

			// Check if user is trying to upload more than the allowed number of images for the current post
			if( ( count( $_FILES['files']['name'] ) ) > $max_image_upload ) {
				$upload_message[] = "Sorry you can only upload " . $max_image_upload . " images for each Ad";
			} else {

				foreach ( $_FILES['files']['name'] as $f => $name ) {
					$extension = pathinfo( $name, PATHINFO_EXTENSION );
					// Generate a randon code for each file name
					//$new_filename = $this->cvf_td_generate_random_code( 20 )  . '.' . $extension;
					$new_filename = $this->generate_document_name( $name );

					if ( $_FILES['files']['error'][$f] == 4 ) {
						continue;
					}

					if ( $_FILES['files']['error'][$f] == 0 ) {
						// Check if image size is larger than the allowed file size
						if ( $_FILES['files']['size'][$f] > $max_file_size ) {
							$upload_message[] = "$name is too large!.";
							continue;

							// Check if the file being uploaded is in the allowed file types
						} elseif( ! in_array( strtolower( $extension ), $valid_formats ) ){
							$upload_message[] = "$name is not a valid format";
							continue;

						} else{
							// If no errors, upload the file...

                            $create_doc = wp_insert_post(array(
                                'post_title' => $new_filename,
                                'post_status'  => 'publish',
                                'post_type' => 'doc'
                            ));

							if( move_uploaded_file( $_FILES["files"]["tmp_name"][$f], $path.$new_filename ) ) {

								$count++;

								$filename = $path.$new_filename;
								$filetype = wp_check_filetype( basename( $filename ), null );
								$wp_upload_dir = wp_upload_dir();
								$attachment = array(
									'guid'           => $wp_upload_dir['url'] . '/' . basename( $filename ),
									'post_mime_type' => $filetype['type'],
									'post_title'     => preg_replace( '/\.[^.]+$/', '', basename( $filename ) ),
									'post_content'   => '',
									'post_status'    => 'inherit'
								);
								// Insert attachment to the database
								$attach_id = wp_insert_attachment( $attachment, $filename, $create_doc );

								require_once( ABSPATH . 'wp-admin/includes/image.php' );

								// Generate meta data
								$attach_data = wp_generate_attachment_metadata( $attach_id, $filename );
								wp_update_attachment_metadata( $attach_id, $attach_data );

							}
						}
					}
				}
			}
		}
		// Loop through each error then output it to the screen
		if ( isset( $upload_message ) ) :
			foreach ( $upload_message as $msg ){
				printf( __('<p class="bg-danger">%s</p>', 'wp-trade'), $msg );
			}
		endif;

		// If no error, show success message
		if( $count != 0 ){
			printf( __('<p class = "bg-success">%d files added successfully!</p>', 'wp-trade'), $count );
		}

		exit();
	}

    // Random code generator used for file names.
	public function generate_document_name($name) {

        $timestamp = time();

		//return $string;
		return $timestamp . '-' . $name;

	}
}

if( is_admin() )
	$upload_docs = new UploadDocs();
