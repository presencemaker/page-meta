<?php

$screens = array( 'post', 'page', 'custom_post_type' );

function meta_box_page_title(){
	add_meta_box( 
		'page-title', 
		'Page Meta', 
		'meta_box_page_title_callback', 
		$screens, 
		'side', 
		'core' 
	);
}
add_action( 'add_meta_boxes', 'meta_box_page_title' );

function meta_box_page_title_callback( $post ){
	$page_title = get_post_meta( $post->ID, 'page_title', true );
	$page_tags = get_post_meta( $post->ID, 'page_tags', true );
	$page_description = get_post_meta( $post->ID, 'page_description', true );

	wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );?>
	<input type="text" name="page_title" id="page_title" placeholder="Page Title" value="<?=$page_title;?>" />
	<small>Your title should be clear and succinct. Keep it relevant and less than 65 characters.</small>

	<input type="text" name="page_tags" id="page_tags" placeholder="Page Tags" value="<?=$page_tags;?>" />
	<small>Comma separated list of keywords.</small>

	<textarea name="page_description" id="page_description" placeholder="Page Description"><?=$page_description;?></textarea>
	<small>The page description should be short and sweet as well. Preferably copy a bit of text right from the page's content.</small>
<?php }

function page_title_save( $post_id ){
	// Bail if we're doing an auto save
	if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

	// if our nonce isn't there, or we can't verify it, bail
	if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;

	// if our current user can't edit this post, bail
	if( !current_user_can( 'edit_post' ) ) return;

	// now we can actually save the data
	$allowed = array( 
		'a' => array( // on allow a tags
			'href' => array() // and those anchords can only have href attribute
		)
	);

	// Probably a good idea to make sure your data is set
	if( isset( $_POST['page_title'] ) )
		update_post_meta( $post_id, 'page_title', $_POST['page_title'] );
}
add_action( 'save_post', 'page_title_save' );

function page_tags_save( $post_id ){
	// Bail if we're doing an auto save
	if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

	// if our nonce isn't there, or we can't verify it, bail
	if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;

	// if our current user can't edit this post, bail
	if( !current_user_can( 'edit_post' ) ) return;

	// now we can actually save the data
	$allowed = array( 
		'a' => array( // on allow a tags
			'href' => array() // and those anchords can only have href attribute
		)
	);

	// Probably a good idea to make sure your data is set
	if( isset( $_POST['page_tags'] ) )
		update_post_meta( $post_id, 'page_tags', $_POST['page_tags'] );
}
add_action( 'save_post', 'page_tags_save' );

function page_description_save( $post_id ){
	// Bail if we're doing an auto save
	if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

	// if our nonce isn't there, or we can't verify it, bail
	if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;

	// if our current user can't edit this post, bail
	if( !current_user_can( 'edit_post' ) ) return;

	// now we can actually save the data
	$allowed = array( 
		'a' => array( // on allow a tags
			'href' => array() // and those anchords can only have href attribute
		)
	);

	if( isset( $_POST['page_description'] ) )
		update_post_meta( $post_id, 'page_description', $_POST['page_description'] );
}
add_action( 'save_post', 'page_description_save' );

function meta_box_share_thumbnail(){
	add_meta_box( 
		'share-thumb', 
		'Share Thumbnail', 
		'meta_box_share_thumb_callback', 
		$screens, 
		'side', 
		'core' 
	);
}
add_action( 'add_meta_boxes', 'meta_box_share_thumbnail' );

function meta_box_share_thumb_callback( $post ){
	$share_thumb = get_post_meta( $post->ID, 'share_thumb', true );

	wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );?>
	<small>This is the image that will be shown as a preview by services like Facebook and Twitter.</small><br /><br />
	<div class="dropzone">
		<?php if( $share_thumb != '' ):?>
			<img src="<?=$share_thumb;?>" alt="Share Thumbnail" class="share-thumb-preview" />
		<?php endif;?>
	</div>
	<input type="hidden" value="<?=$share_thumb;?>" name="share_thumb" id="share_thumb" />
<?php }

function page_share_thumb_save( $post_id ){
	// Bail if we're doing an auto save
	if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

	// if our nonce isn't there, or we can't verify it, bail
	if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;

	// if our current user can't edit this post, bail
	if( !current_user_can( 'edit_post' ) ) return;

	// now we can actually save the data
	$allowed = array( 
		'a' => array( // on allow a tags
			'href' => array() // and those anchords can only have href attribute
		)
	);

	// Probably a good idea to make sure your data is set
	if( isset( $_POST['share_thumb'] ) )
		update_post_meta( $post_id, 'share_thumb', '/wp-content/uploads/share_thumbs/'.$_POST['share_thumb'] );
}
add_action( 'save_post', 'page_share_thumb_save' );