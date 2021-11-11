<?php
namespace Elementor;
class VicTheme_Timeline_Widget extends Widget_Base {
	public function get_name() {
		return 'oew-vicTheme-timeline-widget';
	}
	public function get_title() {
		return __( 'VicTheme Timeline', 'plugin-name' );
	}
	public function get_icon() {
		return 'eicon-time-line';
	}
	public function get_categories() {
		return [ 'orfeostory-elements' ];
	}
	protected function _register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'plugin-name' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'url',
			[
				'label' => __( 'URL to embed', 'plugin-name' ),
				'type' => Controls_Manager::TEXT,
				'input_type' => 'url',
				'placeholder' => __( 'https://your-link.com', 'plugin-name' ),
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'list_title', [
				'label' => __( 'Title', 'plugin-domain' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'List Title' , 'plugin-domain' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'list_image',
			[
				'label' => __( 'Choose Image', 'plugin-domain' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_control(
			'list_content', [
				'label' => __( 'Content', 'plugin-domain' ),
				'type' => Controls_Manager::WYSIWYG,
				'default' => __( 'List Content' , 'plugin-domain' ),
				'show_label' => false,
			]
		);

		$repeater->add_control(
			'list_color',
			[
				'label' => __( 'Color', 'plugin-domain' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}}' => 'color: {{VALUE}}'
				],
			]
		);

		$this->add_control(
			'list',
			[
				'label' => __( 'Repeater List', 'plugin-domain' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				/*'default' => [
					[
						'list_title' => __( 'Title #1', 'plugin-domain' ),
						'list_content' => __( 'Item content. Click the edit button to change this text.', 'plugin-domain' ),
					],
					[
						'list_title' => __( 'Title #2', 'plugin-domain' ),
						'list_content' => __( 'Item content. Click the edit button to change this text.', 'plugin-domain' ),
					],
				],*/
				'title_field' => '{{{ list_title }}}',
			]
		);
		$this->end_controls_section();
		    
        $this->start_controls_section(
			'style_section',
			[
				'label' => __( 'General', 'plugin-name' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'padding_style_tab',
			[
				'label' => __( 'Padding', 'elementor' ),
				'label_block' => true,
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} > .elementor-widget-container' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'margin_style_tab',
			[
				'label' => __( 'Margin', 'elementor' ),
				'label_block' => true,
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} > .elementor-widget-container' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();

	}
	protected function render() {

		$settings = $this->get_settings_for_display();

		//$html = wp_oembed_get( $settings['url'] );

		echo '<div class="mos-memoryline-wrapper">';

		//echo ( $html ) ? $html : $settings['url'];
        if ( sizeof($settings['list']) ) {
			echo '<div class="memoryline_section memoryline-simple mos_row memoryline-elements memoryline-connector" data-animation="true" data-line-time="600" data-line-color="rgba(115,76,94,0.5)" data-line-width="10" data-line-dash="dotted" data-line-offset-y="2" data-dot-time="100" data-dot-radius="8" data-dot-color="#734c5e" data-line-type="round">';
			$n = 1;
			$oleft = 1;
			$oright = 4;
			$oclass= '';
			$direction = 'forward';
			foreach (  $settings['list'] as $item ) {
				if ($n == $oleft) {
					$oclass= 'mos-col-offset-3-2';
					$direction = 'forward';
					$oleft+6;
				} elseif ($n == $oright) {
					$oclass= 'mos-col-offset-right-3-2';
					$direction = 'reverse';
					$oright+6;
				} else {
					$oclass= '';
				}
				//echo '<dt class="elementor-repeater-item-' . $item['_id'] . '">' . $n .'. '.$item['list_title'] . '</dt>';
				//echo '<dd>' . $item['list_content'] . '</dd>';
				echo '<div id="'.$item['_id'].'" class="memoryline-content mos-col-3 '.$oclass.'" data-dot-direction="'.$direction.'" data-dot-time="100" data-line-time="600" data-new-row="false">';
				echo '<div class="memoryline-title" style="color:#734c5e">' . $n . '</div>';
				echo '<div class="memoryline-text" style="color:#734c5e">';
				echo '<img src="'.$item['list_image']['url'].'" />';
				//echo Group_Control_Image_Size::get_attachment_image_html( $settings );
				echo $item['list_content'];
				echo '</div>';
				echo '</div>';
				$n++;
			}
			echo '</div><!--/.mos_row-->';
		}
		echo '</div><!--/.mos-memoryline-wrapper-->';

	}
	/*protected function _content_template() {
		?>
		<# if ( settings.list.length ) { #>
		<dl>
			<# _.each( settings.list, function( item ) { #>
				<dt class="elementor-repeater-item-{{ item._id }}">{{{ item.list_title }}}</dt>
				<dd>{{{ item.list_content }}}</dd>
			<# }); #>
		</dl>
		<# } #>
		<?php
    }*/

}