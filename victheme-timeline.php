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

		$repeater = new Repeater();

		$repeater->add_control(
			'list_title', [
				'label' => __( 'Title', 'orfeostory-elementor-widgets' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'List Title' , 'orfeostory-elementor-widgets' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'list_image',
			[
				'label' => __( 'Choose Image', 'orfeostory-elementor-widgets' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);
		$repeater->add_control(
			'list_content', [
				'label' => __( 'Content', 'orfeostory-elementor-widgets' ),
				'type' => Controls_Manager::WYSIWYG,
				'default' => __( 'List Content' , 'orfeostory-elementor-widgets' ),
				'show_label' => false,
			]
		);

		$this->add_control(
			'list',
			[
				//'label' => __( 'Repeater List', 'orfeostory-elementor-widgets' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				/*'default' => [
					[
						'list_title' => __( 'Title #1', 'orfeostory-elementor-widgets' ),
						'list_content' => __( 'Item content. Click the edit button to change this text.', 'orfeostory-elementor-widgets' ),
					],
					[
						'list_title' => __( 'Title #2', 'orfeostory-elementor-widgets' ),
						'list_content' => __( 'Item content. Click the edit button to change this text.', 'orfeostory-elementor-widgets' ),
					],
				],*/
				'title_field' => '{{{ list_title }}}',
			]
		);
		$this->end_controls_section();
		    
        $this->start_controls_section(
			'general_style_section',
			[
				'label' => __( 'General', 'plugin-name' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);        
        $this->add_control(
			'animate_style_section',
			[
				'label' => __( 'Animate', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'false' => __( 'No', 'orfeostory-elementor-widgets' ),
					'true'  => __( 'Yes', 'orfeostory-elementor-widgets' ),
				],
				'default' => 'true',
			]
		);
        $this->add_control(
			'drawing_dots_time_style_section',
			[
				'label' => __( 'Drawing Dots Time', 'orfeostory-elementor-widgets' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 100,
			]
		);
        $this->add_control(
			'drawing_line_time_style_section',
			[
				'label' => __( 'Drawing Line Time', 'orfeostory-elementor-widgets' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 600,
			]
		);
		$this->end_controls_section();
		    
        $this->start_controls_section(
			'points_style_section',
			[
				'label' => __( 'Points', 'plugin-name' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		); 
        $this->add_control(
			'dot_radius_style_section',
			[
				'label' => __( 'Dot Radius', 'orfeostory-elementor-widgets' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 8,
			]
		);
        $this->add_control(
			'line_width_style_section',
			[
				'label' => __( 'Line Width', 'orfeostory-elementor-widgets' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 10,
			]
		);
        $this->add_control(
			'line_type_style_section',
			[
				'label' => __( 'Line Type', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'round'  => __( 'Round', 'orfeostory-elementor-widgets' ),
					'square' => __( 'Square', 'orfeostory-elementor-widgets' ),
					'butt' => __( 'Butt', 'orfeostory-elementor-widgets' ),
				],
				'default' => 'round',
			]
		);
        $this->add_control(
			'line_dash_style_section',
			[
				'label' => __( 'Line Dash', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'line'  => __( 'Line', 'orfeostory-elementor-widgets' ),
					'dashed' => __( 'Dashed', 'orfeostory-elementor-widgets' ),
					'dotted' => __( 'Dotted', 'orfeostory-elementor-widgets' ),
				],
				'default' => 'line',
			]
		);        
        $this->add_control(
			'line_color_style_section',
			[
				'label' => __( 'Line color', 'orfeostory-elementor-widgets' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
                'default' => 'rgba(115,76,94,0.5)',
			]
		);   
        $this->add_control(
			'dot_color_style_section',
			[
				'label' => __( 'Dot color', 'orfeostory-elementor-widgets' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
                'default' => '#734c5e',
			]
		);
        $this->end_controls_section();
		    
        $this->start_controls_section(
			'image_style_section',
			[
				'label' => __( 'Image', 'plugin-name' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control( //add_responsive_control,add_control
			'image-spacing',
			[
				'label' => __( 'Spacing', 'orfeostory-elementor-widgets' ),
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
				'label' => __( 'Width (%)', 'orfeostory-elementor-widgets' ),
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
				'label' => __( 'Border Radius', 'orfeostory-elementor-widgets' ),
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
        $this->add_control(
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
				'default' => 'flex-column',
			]
		);
		$this->end_controls_section();
		    
        $this->start_controls_section(
			'content_style_section',
			[
				'label' => __( 'Content', 'plugin-name' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
        $this->add_control(
			'content-align',
			[
				'label' => __( 'Alignment', 'elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left'    => [
						'title' => __( 'Left', 'elementor' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'elementor' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'elementor' ),
						'icon' => 'eicon-text-align-right',
					],
					'justify' => [
						'title' => __( 'Justify', 'elementor' ),
						'icon' => 'eicon-text-align-justify',
					],
				],
				'default' => 'left',
			]
		);
        $this->add_control(
			'content-valign',
			[
				'label' => __( 'Vertical Alignment', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'align-items-start'  => __( 'Top', 'orfeostory-elementor-widgets' ),
					'align-items-center' => __( 'Middle', 'orfeostory-elementor-widgets' ),
					'align-items-end' => __( 'Bottom', 'orfeostory-elementor-widgets' ),
				],
				'default' => 'align-items-start',
			]
		);
        
		$this->add_control(
			'content-padding',
			[
				'label' => __( 'Padding', 'elementor' ),
				'label_block' => true,
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} > .elementor-widget-container .memoryline-con-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'content-margin',
			[
				'label' => __( 'Margin', 'elementor' ),
				'label_block' => true,
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} > .elementor-widget-container .memoryline-con-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->add_control(
			'title_style_heading',
			[
				'label' => __( 'Title', 'plugin-name' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        
		$this->add_responsive_control( //add_responsive_control,add_control
			'title_style_spacing',
			[
				'label' => __( 'Spacing', 'orfeostory-elementor-widgets' ),
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
					'{{WRAPPER}} > .elementor-widget-container .memoryline-heading' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
        $this->add_control(
			'title_style_color',
			[
				'label' => __( 'Color', 'orfeostory-elementor-widgets' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} > .elementor-widget-container .memoryline-heading' => 'color: {{VALUE}}',
				],
			]
		);
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_style_typography',
				'label' => __( 'Typography', 'orfeostory-elementor-widgets' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} > .elementor-widget-container .memoryline-heading',
			]
		);
        $this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'title_style_text_shadow',
				'label' => __( 'Text Shadow', 'orfeostory-elementor-widgets' ),
				'selector' => '{{WRAPPER}} > .elementor-widget-container .memoryline-heading',
                'separator' => 'after',
			]
		);        
        $this->add_control(
			'description_style_heading',
			[
				'label' => __( 'Description', 'plugin-name' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        $this->add_control(
			'description_style_color',
			[
				'label' => __( 'Color', 'orfeostory-elementor-widgets' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} > .elementor-widget-container .memoryline-desc' => 'color: {{VALUE}}',
				],
			]
		);
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'description_style_typography',
				'label' => __( 'Typography', 'orfeostory-elementor-widgets' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} > .elementor-widget-container .memoryline-desc',
			]
		);
        $this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'description_style_text_shadow',
				'label' => __( 'Text Shadow', 'orfeostory-elementor-widgets' ),
				'selector' => '{{WRAPPER}} > .elementor-widget-container .memoryline-desc',
                'separator' => 'after',
			]
		); 
		$this->end_controls_section();

	}
	protected function render() {

		$settings = $this->get_settings_for_display();
		echo '<div class="mos-memoryline-wrapper">';
        if ( sizeof($settings['list']) ) {
			echo '<div class="memoryline_section memoryline-simple mos_row memoryline-elements memoryline-connector" data-animation="'.$settings['animate_style_section'].'" data-line-time="'.$settings['drawing_line_time_style_section'].'" data-line-color="'.$settings['line_color_style_section'].'" data-line-width="'.$settings['line_width_style_section'].'" data-line-dash="'.$settings['line_dash_style_section'].'" data-line-offset-y="2" data-dot-time="'.$settings['drawing_dots_time_style_section'].'" data-dot-radius="'.$settings['dot_radius_style_section'].'" data-dot-color="'.$settings['dot_color_style_section'].'" data-line-type="'.$settings['line_type_style_section'].'">';
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
				echo '<div id="'.$item['_id'].'" class="memoryline-content mos-col-3 '.$oclass.'" data-dot-direction="'.$direction.'" data-dot-time="'.$settings['drawing_dots_time_style_section'].'" data-line-time="'.$settings['drawing_line_time_style_section'].'" data-new-row="false">';
				echo '<div class="memoryline-title">' . $n . '</div>';
				echo '<div class="memoryline-text d-flex '.$settings['image-align'].' '.$settings['content-valign'].'">';
                echo '<div class="memoryline-image"><img src="'.$item['list_image']['url'].'" /></div>';
                echo '<div class="memoryline-con-wrap text-'.$settings['content-align'].'">';
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