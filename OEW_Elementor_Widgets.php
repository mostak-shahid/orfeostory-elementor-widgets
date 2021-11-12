<?php

class OEW_Elementor_Widgets {

	protected static $instance = null;

	public static function get_instance() {
		if ( ! isset( static::$instance ) ) {
			static::$instance = new static;
		}

		return static::$instance;
	}

	protected function __construct() {
		require_once('victheme-timeline.php');
		//require_once('victheme-timeline.php');
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'register_widgets' ] );
	}

	public function register_widgets() {
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\VicTheme_Timeline_Widget() );
		//\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\My_Widget_1() );
		//\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Mos_Iconbox_Carousel_Widget() );
	}

}

add_action( 'init', 'oew_elementor_init' );
function oew_elementor_init() {
	OEW_Elementor_Widgets::get_instance();
}

function add_elementor_widget_categories( $elements_manager ) {

	$elements_manager->add_category(
		'orfeostory-elements',
		[
			'title' => __( 'Orfeostory Elements', 'orfeostory-elementor-widgets' ),
		]
	);
	/*$elements_manager->add_category(
		'second-category',
		[
			'title' => __( 'Second Category', 'orfeostory-elementor-widgets' ),
			'icon' => 'fa fa-plug',
		]
	);*/

}
add_action( 'elementor/elements/categories_registered', 'add_elementor_widget_categories' );