<?php

// IP Docs Shortcode
function ip_show_docs( $atts ) {
	ob_start();
    $get_slug = '';
    $get_slug = $atts['slug'];
    if($get_slug){
        $arg_tax = array(
            array(
                'taxonomy' => 'doccategory',
                'field' => 'slug',
                'terms' => $get_slug,
            )
        );
    }else {
        $arg_tax = '';
    }

	$args = array(
		'posts_per_page' => -1,
		'post_type' => 'doc',
		'post_status' => 'publish',
        'tax_query' => $arg_tax
	);
	$my_query = new WP_Query($args);

	if( $my_query->have_posts() ) : ?>

        <div class="docs-list-search">
            <div class="docs-search">
                <input type="text" id="search-text" placeholder="Enter keyword to search...">
            </div>
            <div class="docs-results-found">
                <h5>Results found: <span class="docs-list-count"></span></h5>
            </div>
        </div>

        <div class="docs-list-header">
            <span class="doc-id-head">ID</span>
            <span class="doc-type-head">Type</span>
            <span class="doc-title-head">Name</span>
            <span class="doc-size-head">Size</span>
            <span class="doc-date-head">Uploaded on</span>
            <span class="doc-actions-head">Actions</span>
        </div>
        <ul class="docs-list">

            <?php while ($my_query->have_posts()) : $my_query->the_post(); ?>

                <?php $get_doc = get_field('ip_doc', get_the_ID()); ?>

                <?php if ($get_doc) : ?>
                    <li class="doc-item in">
                        <span class="doc-id">
                            <?php echo $get_doc['ID']; ?>
                        </span>
                        <span class="doc-type">

                            <?php
                                if($get_doc['subtype'] === 'vnd.ms-powerpoint') {
                                    $file_icon_url = 'https://img.icons8.com/color/50/000000/ms-powerpoint--v1.png';
                                } elseif($get_doc['subtype'] === 'vnd.openxmlformats-officedocument.presentationml.presentation') {
                                    $file_icon_url = 'https://img.icons8.com/color/50/000000/ms-powerpoint--v1.png';
                                } elseif($get_doc['subtype'] === 'pdf') {
                                    $file_icon_url = 'https://img.icons8.com/color/48/000000/adobe-acrobat--v1.png';
                                } else {
                                    $file_icon_url = 'https://img.icons8.com/external-kiranshastry-lineal-color-kiranshastry/48/000000/external-file-banking-and-finance-kiranshastry-lineal-color-kiranshastry-3.png';
                                }
                            ?>
                            <img src="<?php echo $file_icon_url; ?>" alt="<?php the_title(); ?>">
                        </span>
                        <span class="doc-title">
                            <a href="<?php echo $get_doc['url']; ?>" target="_blank">
                                <?php the_title(); ?>
                            </a>
                        </span>
                        <span class="doc-size">
                            <?php echo formatSizeUnits($get_doc['filesize']); ?>
                        </span>
                        <span class="doc-date">
                            <?php echo date_format(date_create($get_doc['date']), "m/d/Y"); ?>
                        </span>
                        <div class="doc-actions">
                            <a href="<?php echo $get_doc['url']; ?>" target="_blank">Download/View</a>
                        </div>
                    </li>

                <?php endif; ?>

            <?php endwhile; ?>

        </ul>

	<?php endif;
	wp_reset_query();

	$content = ob_get_clean();
	return $content;

}

add_shortcode('ip_docs', 'ip_show_docs');
