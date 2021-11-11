<?php
function mos_oew_settings_init() {
	register_setting( 'mos_oew', 'mos_oew_options' );
	add_settings_section('mos_oew_section_top_nav', '', 'mos_oew_section_top_nav_cb', 'mos_oew');
	add_settings_section('mos_oew_section_dash_start', '', 'mos_oew_section_dash_start_cb', 'mos_oew');
	add_settings_section('mos_oew_section_dash_end', '', 'mos_oew_section_end_cb', 'mos_oew');
	
	add_settings_section('mos_oew_section_scripts_start', '', 'mos_oew_section_scripts_start_cb', 'mos_oew');
	add_settings_field( 'field_jquery', __( 'JQuery', 'mos_oew' ), 'mos_oew_field_jquery_cb', 'mos_oew', 'mos_oew_section_scripts_start', [ 'label_for' => 'jquery', 'class' => 'mos_oew_row', 'mos_oew_custom_data' => 'custom', ] );
	add_settings_field( 'field_css', __( 'Custom Css', 'mos_oew' ), 'mos_oew_field_css_cb', 'mos_oew', 'mos_oew_section_scripts_start', [ 'label_for' => 'mos_oew_css' ] );
	add_settings_field( 'field_js', __( 'Custom Js', 'mos_oew' ), 'mos_oew_field_js_cb', 'mos_oew', 'mos_oew_section_scripts_start', [ 'label_for' => 'mos_oew_js' ] );
	add_settings_section('mos_oew_section_scripts_end', '', 'mos_oew_section_end_cb', 'mos_oew');

}
add_action( 'admin_init', 'mos_oew_settings_init' );

function get_mos_oew_active_tab () {
	$output = array(
		'option_prefix' => admin_url() . "/options-general.php?page=mos_oew_settings&tab=",
		//'option_prefix' => "?post_type=p_file&page=mos_oew_settings&tab=",
	);
	if (isset($_GET['tab'])) $active_tab = $_GET['tab'];
	elseif (isset($_COOKIE['mos_oew_active_tab'])) $active_tab = $_COOKIE['mos_oew_active_tab'];
	else $active_tab = 'dashboard';
	$output['active_tab'] = $active_tab;
	return $output;
}
function mos_oew_section_top_nav_cb( $args ) {
	$data = get_mos_oew_active_tab ();
	?>
    <ul class="nav nav-tabs">
        <li class="tab-nav <?php if($data['active_tab'] == 'dashboard') echo 'active';?>"><a data-id="dashboard" href="<?php echo $data['option_prefix'];?>dashboard">Dashboard</a></li>
        <li class="tab-nav <?php if($data['active_tab'] == 'scripts') echo 'active';?>"><a data-id="scripts" href="<?php echo $data['option_prefix'];?>scripts">Advanced CSS, JS</a></li>
    </ul>
	<?php
}
function mos_oew_section_dash_start_cb( $args ) {
	$data = get_mos_oew_active_tab ();
  global $mos_oew_options;
	?>
	<div id="mos-oew-dashboard" class="tab-con <?php if($data['active_tab'] == 'dashboard') echo 'active';?>">
		<?php var_dump($mos_oew_options) ?>

	<?php
}
function mos_oew_section_scripts_start_cb( $args ) {
	$data = get_mos_oew_active_tab ();
	?>
	<div id="mos-oew-scripts" class="tab-con <?php if($data['active_tab'] == 'scripts') echo 'active';?>">
	<?php
}
function mos_oew_field_jquery_cb( $args ) {
	global $mos_oew_options;
	?>
	<label for="<?php echo esc_attr( $args['label_for'] ); ?>"><input name="mos_oew_options[<?php echo esc_attr( $args['label_for'] ); ?>]" type="checkbox" id="<?php echo esc_attr( $args['label_for'] ); ?>" value="1" <?php echo isset( $mos_oew_options[ $args['label_for'] ] ) ? ( checked( $mos_oew_options[ $args['label_for'] ], 1, false ) ) : ( '' ); ?>><?php esc_html_e( 'Yes I like to add JQuery from Plugin.', 'mos_oew' ); ?></label>
	<?php
}

function mos_oew_field_css_cb( $args ) {
	global $mos_oew_options;
	?>
	<textarea name="mos_oew_options[<?php echo esc_attr( $args['label_for'] ); ?>]" id="<?php echo esc_attr( $args['label_for'] ); ?>" rows="10" class="regular-text"><?php echo isset( $mos_oew_options[ $args['label_for'] ] ) ? esc_html_e($mos_oew_options[$args['label_for']]) : '';?></textarea>
	<script>
    var editor = CodeMirror.fromTextArea(document.getElementById("mos_oew_css"), {
      lineNumbers: true,
      mode: "text/css",
      theme: "abcdef",
      extraKeys: {"Ctrl-Space": "autocomplete"}
    });
	</script>
	<?php
}
function mos_oew_field_js_cb( $args ) {
	global $mos_oew_options;
	?>
	<textarea name="mos_oew_options[<?php echo esc_attr( $args['label_for'] ); ?>]" id="<?php echo esc_attr( $args['label_for'] ); ?>" rows="10" class="regular-text"><?php echo isset( $mos_oew_options[ $args['label_for'] ] ) ? esc_html_e($mos_oew_options[$args['label_for']]) : '';?></textarea>
	<script>
    var editor = CodeMirror.fromTextArea(document.getElementById("mos_oew_js"), {
      lineNumbers: true,
      mode: "text/css",
      theme: "abcdef",
      extraKeys: {"Ctrl-Space": "autocomplete"}
    });
	</script>
	<?php
}
function mos_oew_section_end_cb( $args ) {
	$data = get_mos_oew_active_tab ();
	?>
	</div>
	<?php
}


function mos_oew_options_page() {
	//add_menu_page( 'WPOrg', 'WPOrg Options', 'manage_options', 'mos_oew', 'mos_oew_options_page_html' );
	add_submenu_page( 'options-general.php', 'Orfeostory Elementor Widgets Settings', 'OEW Settings', 'manage_options', 'mos_oew_settings', 'mos_oew_admin_page' );
}
add_action( 'admin_menu', 'mos_oew_options_page' );

function mos_oew_admin_page() {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}
	if ( isset( $_GET['settings-updated'] ) ) {
		add_settings_error( 'mos_oew_messages', 'mos_oew_message', __( 'Settings Saved', 'mos_oew' ), 'updated' );
	}
	settings_errors( 'mos_oew_messages' );
	?>
	<div class="wrap mos-oew-wrapper">
		<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
		<form action="options.php" method="post">
		<?php
		settings_fields( 'mos_oew' );
		do_settings_sections( 'mos_oew' );
		submit_button( 'Save Settings' );
		?>
		</form>
	</div>
	<?php
}