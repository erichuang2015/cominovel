<?php
get_header( 'cominovel' );

if ( have_posts() ) {
	the_post();
	$comic         = new Cominovel_Comic( $GLOBALS['post'] );
	$has_sidebar   = is_registered_sidebar( 'cominovel_single' ) && is_active_sidebar( 'cominovel_single' );
	$is_oneshot    = $comic->is_oneshot();
	$first_chapter = $comic->get_first_chapter_id();
	$breadcrumb    = Cominovel_Breadcrumb::create( $comic );

	// Load the comic chapters to render chapter list.
	$comic->load_chapters();
	$comic->load_data( true );
	cominovel_template( 'single/comic', compact( 'comic', 'has_sidebar', 'breadcrumb', 'is_oneshot', 'first_chapter' ) );
}

do_action( 'cominovel_sidebars' );

// Get theme footer
get_footer( 'cominovel' );
