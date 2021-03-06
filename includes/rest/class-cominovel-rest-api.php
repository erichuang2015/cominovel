<?php
class Cominovel_Rest_Api {

	const NAMESPACE           = 'cominovel/v1';
	const ENDPOINT_COMIC_INFO = '/comic';
	const ENDPOINT_NOVEL_INFO = '/novel';


	public function __construct() {
		$this->includes();

		add_action( 'rest_api_init', array( $this, 'register_new_endpoint' ) );
	}

	public function includes() {
		require_once dirname( __FILE__ ) . '/class-cominovel-rest-data.php';
		require_once dirname( __FILE__ ) . '/class-cominovel-rest-user.php';
	}

	public function register_new_endpoint() {
		new Cominovel_Rest_Data();
		new Cominovel_Rest_User();
	}
}

new Cominovel_Rest_Api();
