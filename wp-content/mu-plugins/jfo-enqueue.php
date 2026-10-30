<?php
/**
 * jfo-enqueue.php – Must-use plugin
 * Enqueues janfoshag.de custom CSS and dark-mode toggle JS.
 * Lives in wp-content/mu-plugins/ – WordPress loads it automatically.
 */
add_action( 'wp_enqueue_scripts', function () {
	$jfo_base = content_url( 'uploads/jfo' );
	wp_enqueue_style(
		'jfo-custom',
		$jfo_base . '/custom.css',
		array( 'astra-theme-css' ),
		'1.8.3'
	);
	wp_enqueue_script(
		'jfo-dark-mode',
		$jfo_base . '/dark-mode-toggle.js',
		array(),
		'1.2.0',
		true
	);
} );

/* Theme vor dem ersten Paint setzen: gespeicherte Wahl, sonst Dark als Default (kein Hell-Aufblitzen) */
add_action( 'wp_head', function () {
	echo "<script>(function(){var t='dark';try{t=localStorage.getItem('jfo-theme')||'dark';}catch(e){}document.documentElement.setAttribute('data-theme',t);})();</script>\n";
}, 0 );
