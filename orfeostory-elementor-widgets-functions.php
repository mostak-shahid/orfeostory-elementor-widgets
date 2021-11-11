<?php
function mos_oew_admin_enqueue_scripts(){
	$page = @$_GET['page'];
	global $pagenow, $typenow;
	/*var_dump($pagenow); //options-general.php(If under settings)/edit.php(If under post type)
	var_dump($typenow); //post type(If under post type)
	var_dump($page); //mos_oew_settings(If under settings)*/
	
	if ($pagenow == 'options-general.php' AND $page == 'mos_oew_settings') {
		//wp_enqueue_style( 'bootstrap.min', plugins_url( 'css/bootstrap.min.css', __FILE__ ) );
		wp_enqueue_style( 'orfeostory-elementor-widgets-admin', plugins_url( 'css/orfeostory-elementor-widgets-admin.css', __FILE__ ) );
		
		//wp_enqueue_media();

		wp_enqueue_script( 'jquery' );
		
		/*Editor*/
		//wp_enqueue_style( 'docs', plugins_url( 'plugins/CodeMirror/doc/docs.css', __FILE__ ) );
		wp_enqueue_style( 'codemirror', plugins_url( 'plugins/CodeMirror/lib/codemirror.css', __FILE__ ) );
		wp_enqueue_style( 'show-hint', plugins_url( 'plugins/CodeMirror/addon/hint/show-hint.css', __FILE__ ) );

		wp_enqueue_script( 'codemirror', plugins_url( 'plugins/CodeMirror/lib/codemirror.js', __FILE__ ), array('jquery') );
		wp_enqueue_script( 'css', plugins_url( 'plugins/CodeMirror/mode/css/css.js', __FILE__ ), array('jquery') );
		wp_enqueue_script( 'javascript', plugins_url( 'plugins/CodeMirror/mode/javascript/javascript.js', __FILE__ ), array('jquery') );
		wp_enqueue_script( 'show-hint', plugins_url( 'plugins/CodeMirror/addon/hint/show-hint.js', __FILE__ ), array('jquery') );
		wp_enqueue_script( 'css-hint', plugins_url( 'plugins/CodeMirror/addon/hint/css-hint.js', __FILE__ ), array('jquery') );
		wp_enqueue_script( 'javascript-hint', plugins_url( 'plugins/CodeMirror/addon/hint/javascript-hint.js', __FILE__ ), array('jquery') );
		/*Editor*/

		wp_enqueue_script( 'orfeostory-elementor-widgets-functions', plugins_url( 'js/orfeostory-elementor-widgets-functions.js', __FILE__ ), array('jquery') );
		wp_enqueue_script( 'orfeostory-elementor-widgets-admin', plugins_url( 'js/orfeostory-elementor-widgets-admin.js', __FILE__ ), array('jquery') );
	}

}
add_action( 'admin_enqueue_scripts', 'mos_oew_admin_enqueue_scripts' );
function mos_oew_enqueue_scripts(){
	global $mos_oew_options;
	if (@$mos_oew_options['jquery']) {
		wp_enqueue_script( 'jquery' );
	}
	if (@$mos_oew_options['awesome']) {
		wp_enqueue_style( 'font-awesome.min', plugins_url( 'fonts/font-awesome-4.7.0/css/font-awesome.min.css', __FILE__ ) );
	}
	wp_enqueue_style( 'orfeostory-elementor-widgets', plugins_url( 'css/orfeostory-elementor-widgets.css', __FILE__ ) );
	wp_enqueue_script( 'orfeostory-elementor-widgets-functions', plugins_url( 'js/orfeostory-elementor-widgets-functions.js', __FILE__ ), array('jquery') );
	wp_enqueue_script( 'orfeostory-elementor-widgets', plugins_url( 'js/orfeostory-elementor-widgets.js', __FILE__ ), array('jquery') );
}
add_action( 'wp_enqueue_scripts', 'mos_oew_enqueue_scripts' );
function mos_oew_ajax_scripts(){
	wp_enqueue_script( 'orfeostory-elementor-widgets-ajax', plugins_url( 'js/orfeostory-elementor-widgets-ajax.js', __FILE__ ), array('jquery') );
	$ajax_params = array(
		'ajax_url' => admin_url('admin-ajax.php'),
		'ajax_nonce' => wp_create_nonce('mos_oew_verify'),
	);
	wp_localize_script( 'orfeostory-elementor-widgets-ajax', 'ajax_obj', $ajax_params );
}
add_action( 'wp_enqueue_scripts', 'mos_oew_ajax_scripts' );
add_action( 'admin_enqueue_scripts', 'mos_oew_ajax_scripts' );
function mos_oew_scripts() {
	global $mos_oew_options;
	if (@$mos_oew_options['css']) {
		?>
		<style>
			<?php echo $mos_oew_options['css'] ?>
		</style>
		<?php
	}
	if (@$mos_oew_options['js']) {
		?>
		<style>
			<?php echo $mos_oew_options['js'] ?>
		</style>
		<?php
	}
}
add_action( 'wp_footer', 'mos_oew_scripts', 100 );