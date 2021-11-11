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
        $this->add_control(
			'hr-1',
			[
				'type' => Controls_Manager::DIVIDER,
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
        /*$repeater->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name' => 'thumbnail', // // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `thumbnail_size` and `thumbnail_custom_dimension`.
				'exclude' => [ 'custom' ],
				'include' => [],
				'default' => 'large',
			]
		);*/

		$repeater->add_control(
			'list_content', [
				'label' => __( 'Content', 'plugin-domain' ),
				'type' => Controls_Manager::WYSIWYG,
				'default' => __( 'List Content' , 'plugin-domain' ),
				'show_label' => false,
			]
		);

		/*$repeater->add_control(
			'list_color',
			[
				'label' => __( 'Color', 'plugin-domain' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}}' => 'color: {{VALUE}}'
				],
			]
		);*/

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
			'image_section',
			[
				'label' => __( 'Image', 'plugin-name' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control( //add_responsive_control,add_control
			'image-spacing',
			[
				'label' => __( 'Spacing', 'plugin-domain' ),
				'type' => Controls_Manager::SLIDER,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
				/*
                'desktop_default' => [
					'size' => 30,
					'unit' => 'px',
				],
				'tablet_default' => [
					'size' => 20,
					'unit' => 'px',
				],
				'mobile_default' => [
					'size' => 10,
					'unit' => 'px',
				],                
                'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 50,
				],*/
				'selectors' => [
					'{{WRAPPER}} > .elementor-widget-container .memoryline-image' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control( //add_responsive_control,add_control
			'image-width',
			[
				'label' => __( 'Width (%)', 'plugin-domain' ),
				'type' => Controls_Manager::SLIDER,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
				/*
                'desktop_default' => [
					'size' => 30,
					'unit' => 'px',
				],
				'tablet_default' => [
					'size' => 20,
					'unit' => 'px',
				],
				'mobile_default' => [
					'size' => 10,
					'unit' => 'px',
				],
                */
                'size_units' => [ 'px','%' ],
				
                'range' => [
				    'px' => [
						'min' => 0,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => '%',
					//'size' => 50,
				],
				'selectors' => [
					'{{WRAPPER}} > .elementor-widget-container .memoryline-image' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control( //add_responsive_control,add_control
			'image-border-radius',
			[
				'label' => __( 'Border Radius', 'plugin-domain' ),
				'type' => Controls_Manager::SLIDER,
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
				/*
                'desktop_default' => [
					'size' => 30,
					'unit' => 'px',
				],
				'tablet_default' => [
					'size' => 20,
					'unit' => 'px',
				],
				'mobile_default' => [
					'size' => 10,
					'unit' => 'px',
				], 
                */
                'size_units' => [ 'px', '%' ],
				/*'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 50,
				],*/
				'selectors' => [
					'{{WRAPPER}} > .elementor-widget-container .memoryline-image' => 'border-radius: {{SIZE}}{{UNIT}};',
				],
			]
		);
        $this->add_responsive_control(
			'image-align',
			[
				'label' => __( 'Alignment', 'elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'flex-row'    => [
						'title' => __( 'Left', 'elementor' ),
						'icon' => 'eicon-h-align-left',
					],
					'flex-row-reverse' => [
						'title' => __( 'Right', 'elementor' ),
						'icon' => 'eicon-h-align-right',
					],
					'flex-column' => [
						'title' => __( 'Top', 'elementor' ),
						'icon' => 'eicon-v-align-top',
					],
					'flex-column-reverse' => [
						'title' => __( 'Bottom', 'elementor' ),
						'icon' => 'eicon-v-align-bottom',
					],
				],
				'prefix_class' => 'elementor%s-align-',
				'default' => 'flex-column',
			]
		);
		$this->end_controls_section();
		    
        $this->start_controls_section(
			'other_section',
			[
				'label' => __( 'Other', 'plugin-name' ),
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
				echo '<div class="memoryline-text d-flex '.$settings['image-align'].'" style="color:#734c5e">';
                echo '<div class="memoryline-image"><img src="'.$item['list_image']['url'].'" /></div>';
                echo '<div class="memoryline-con-wrap" style="color:#734c5e">';
                echo '<div class="memoryline-heading">'.$item['list_title'].'</div>';
                echo '<div class="memoryline-desc">'.$item['list_content'].'</div>';
				echo '</div>';
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