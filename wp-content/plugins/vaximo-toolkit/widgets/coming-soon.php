<?php 
namespace Elementor;
class VaximoComingSoon extends Widget_Base{
    public function get_name(){
        return "Vaximo_Comingsoon";
    }
    public function get_title(){
        return "Coming Soon";
    }
    public function get_icon(){
        return "eicon-counter-circle";
    }
    public function get_categories(){
        return ['vaximocategory'];
    }

    protected function register_controls(){
        // Start Left Content
        $this-> start_controls_section(
            'comingsoon_section',
            [
                'label' => __('Content', 'vaximo-toolkit'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
            $this->add_control(
                'image',
                [
                    'label' => __( 'Banner Image', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::MEDIA,
                ]
            );
            $this->add_control(
                'title',
                [
                    'label'   => __('Title','vaximo-toolkit'),
                    'type'    => Controls_Manager:: TEXT,
                    'default' => __('Coming Soon', 'vaximo-toolkit'),
                ]
            );
            $this->add_control(
                'desc',
                [
                    'label'   => __('Description','vaximo-toolkit'),
                    'type' => Controls_Manager::WYSIWYG,
                    'default' => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices.', 'vaximo-toolkit'),
                ]
            );
        
            $this->add_control(
                'date', [
                    'label'       => __( 'Day Text', 'vaximo-toolkit' ),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => __( 'Days' , 'vaximo-toolkit' ),
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'hours', [
                    'label'       => __( 'Hours Text', 'vaximo-toolkit' ),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => __( 'Hours' , 'vaximo-toolkit' ),
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'minutes', [
                    'label'       => __( 'Minutes Text', 'vaximo-toolkit' ),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => __( 'Minutes' , 'vaximo-toolkit' ),
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'seconds', [
                    'label'       => __( 'Seconds Text', 'vaximo-toolkit' ),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => __( 'Seconds' , 'vaximo-toolkit' ),
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'emailtext',
                [
                    'label'      => __('Email Placeholder','vaximo-toolkit'),
                    'type'       => Controls_Manager:: TEXT,
                    'default'    => __('Enter your email','vaximo-toolkit'),
                ]
            );
            $this->add_control(
                'btn_text',
                [
                    'label' => __('Button Text','vaximo-toolkit'),
                    'type'  => Controls_Manager:: TEXT,
                ]
            );

            $this->add_control(
                'action_url', [
                    'label' => esc_html__( 'Action URL', 'vaximo-toolkit' ),
                    'description' => __( 'Enter here your MailChimp action URL. <a href="https://www.docs.envytheme.com/docs/vaximo-theme-documentation/tips-guides-troubleshoots/get-mailchimp-newsletter-form-action-url/" target="_blank"> How to </a>', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::TEXT,
                    'label_block' => true,
                    'default' => 'https://envytheme.us20.list-manage.com/subscribe/post?u=60e1ffe2e8a68ce1204cd39a5&amp;id=42d6d188d9
                    ',
                ]
            );
            
            $card_items = new Repeater();

            $card_items->add_control(
                'icon_type',
                [
                    'label'   => __( 'Icon Type', 'vaximo-toolkit' ),
                    'type'    => Controls_Manager::SELECT,
                    'options' => [
                        'font-awesome' 	  => __( 'Font Awesome', 'vaximo-toolkit' ),
                        'bxicon' 		  => __( 'Box Icon', 'vaximo-toolkit' ),
                    ],
                    'default' => 'bxicon',
                ]
            );
            $card_items->add_control(
                'bx_icon',
                [
                    'label'         => __( 'Icon', 'vaximo-toolkit' ),
                    'type' 	        => Controls_Manager::TEXT,
                    'condition'     => [
                        'icon_type' => 'bxicon'
                    ],
                    'description'   =>  __( 'Here you can use box icon class name. ex: bx bxl-facebook', 'vaximo-toolkit' ),
                ]
            );
            $card_items->add_control(
                'fa_icon',
                [
                    'label'     => __( 'Icon', 'vaximo-toolkit' ),
                    'type' 	    => Controls_Manager::ICON,
                    'condition' => [
                        'icon_type' => 'font-awesome'
                    ]
                ]
            );
            $card_items->add_control(
                'social_link',
                [
                    'label'       => __('URL', 'vaximo-toolkit'),
                    'type'        => Controls_Manager:: TEXT,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'social_list',
                [
                    'label'       => __( 'Add Social Icon', 'vaximo-toolkit' ),
                    'type'        => Controls_Manager::REPEATER,
                    'fields'      => $card_items->get_controls(),
                ]
            );
        $this-> end_controls_section();
        // End Right Content

        // Start Comingsoon Styling
        $this-> start_controls_section(
            'coming_style',
            [
                'label' => __('Content', 'vaximo-toolkit'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
            $this->add_control(
                'title_color',
                [
                    'label'     => __( 'Title Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .coming-soon-content h1' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_responsive_control(
                'title_size',
                [
                    'label'  => __( 'Title Font Size', 'vaximo-toolkit' ),
                    'type'   => Controls_Manager::SLIDER,
                    'range'  => [
                        'px' => [
                            'min' => 1,
                            'max' => 100,
                        ],
                    ],
                    'devices'   => [ 'desktop', 'tablet', 'mobile' ],
                    'unit'      => 'px',
                    'selectors' => [
                        '{{WRAPPER}}  .coming-soon-content h1' => 'font-size: {{SIZE}}{{UNIT}}',
                    ],
                ]
            );
            $this->add_control(
                'desc_color',
                [
                    'label'     => __( 'Description Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .coming-soon-content p' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_responsive_control(
                'desc_size',
                [
                    'label'  => __( 'Description Font Size', 'vaximo-toolkit' ),
                    'type'   => Controls_Manager::SLIDER,
                    'range'  => [
                        'px' => [
                            'min' => 1,
                            'max' => 50,
                        ],
                    ],
                    'devices'   => [ 'desktop', 'tablet', 'mobile' ],
                    'unit'      => 'px',
                    'selectors' => [
                        '{{WRAPPER}}  .coming-soon-content p' => 'font-size: {{SIZE}}{{UNIT}}',
                    ],
                ]
            );

            $this->add_control(
                'time_color',
                [
                    'label'     => __( 'Time Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .coming-soon-area .coming-soon-content #timer div' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'form_border_color',
                [
                    'label'     => __( 'Form Border Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .coming-soon-area .coming-soon-content .newsletter-form .input-newsletter' => 'border-color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'btn_onecolor', [
                    'label'     => __( 'Button  Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .coming-soon-area .coming-soon-content .newsletter-form button' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'btn_onehcolor', [
                    'label'     => __( 'Button  Hover Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .coming-soon-area .coming-soon-content .newsletter-form button:hover' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'btn_onehbgcolor', [
                    'label'     => __( 'Button Hover Background Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .default-btn::before, .default-btn::after' => 'background-color: {{VALUE}};',
                    ],
                ]
            );
        $this-> end_controls_section();

    }

    protected function render() {
        $settings = $this->get_settings_for_display(); 
        global $vaximo_opt;
        if(isset( $vaximo_opt['vaximo_due_date'] ) && $vaximo_opt['vaximo_due_date'] != '' ) {
            $cs_date =  $vaximo_opt['vaximo_due_date'];
        } else {
            $cs_date =  '';
        }

        ?>
        <div class="coming-soon-area" style="background-image: url(<?php echo esc_url( $settings['image']['url']); ?> )">
			<div class="d-table">
				<div class="d-table-cell">
					<div class="container">
						<div class="coming-soon-content">
                            <h1><?php echo esc_html( $settings['title'] );?></h1>
                            <p><?php echo wp_kses_post( $settings['desc'] );?></p>

							<div id="timer">
								<div id="days"></div>
								<div id="hours"></div>
								<div id="minutes"></div>
								<div id="seconds"></div>
							</div>
                            
                            <form class="newsletter-form mailchimp" data-toggle="validator" method="post" action="<?php echo get_bloginfo(); ?>/?na=s" onsubmit="return newsletter_check(this)">
                                <input type="email" class="input-newsletter" placeholder="<?php echo esc_attr( $settings['emailtext'] );?>" name="EMAIL" required autocomplete="off">
                                
                                <?php 
                                if ( $settings['btn_text'] !='' ) : ?>
                                    <button type="submit" class="default-btn"><?php echo esc_html( $settings['btn_text'] );?></button> <?php
                                endif; ?>

                                <p class="mchimp-errmessage" style="display: none;"></p>
                                <p class="mchimp-sucmessage" style="display: none;"></p>
                            </form>

							<ul class="header-content-right">
                                <?php if ( $settings['social_list'] != '' ) :
                                    foreach ( $settings['social_list'] as $item ) :
                                        // Icon
                                        $icon = '';
                                        if( $item['icon_type'] == 'bxicon' ):
                                            $icon = $item['bx_icon'];
                                        else:
                                            $icon = $item['fa_icon'];
                                        endif;
                                    
                                        if ( $icon != '' ) : ?>
                                        <li>
                                            <a href="<?php echo esc_url( $item['social_link'] ); ?>" target="_blank">
                                                <i class="<?php echo esc_attr( $icon ); ?>"></i>
                                            </a>
                                        </li><?php
                                        endif; 
                                    endforeach; 
                                endif;?>
                            </ul>
                            
						</div>
					</div>
				</div>
			</div>
        </div>

        <script>
            (function($){
            "use strict";
                $( window ).on( 'elementor/frontend/init', function() {
                    elementorFrontend.hooks.addAction( 'frontend/element_ready/Vaximo_Comingsoon.default', function($scope, $){
                        // Count Time 
                        function makeTimer() {
                            var endTime = new Date("<?php echo $cs_date; ?>");	

                            var endTime = (Date.parse(endTime)) / 1000;
                            var now = new Date();
                            var now = (Date.parse(now) / 1000);
                            var timeLeft = endTime - now;
                            var days = Math.floor(timeLeft / 86400); 
                            var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
                            var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600 )) / 60);
                            var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));
                            if (hours < "10") { hours = "0" + hours; }
                            if (minutes < "10") { minutes = "0" + minutes; }
                            if (seconds < "10") { seconds = "0" + seconds; }
                            $("#days").html(days + "<span><?php echo esc_html( $settings['date'] ); ?></span>");
                            $("#hours").html(hours + "<span><?php echo esc_html( $settings['hours'] ); ?></span>");
                            $("#minutes").html(minutes + "<span><?php echo esc_html( $settings['minutes'] ); ?></span>");
                            $("#seconds").html(seconds + "<span><?php echo esc_html( $settings['seconds'] ); ?></span>");
                        }
                        setInterval(function() { makeTimer(); }, 300);
                        });

                });  

                if( typeof elementorFrontend !== 'undefined'  ){
                    elementorFrontend.hooks.addAction( 'frontend/element_ready/Vaximo_Comingsoon.default', function($scope, $){
                        // Count Time 
                        function makeTimerLive() {
                            var endTime = new Date("<?php echo $cs_date; ?>");

                            var endTime = (Date.parse(endTime)) / 1000;
                            var now = new Date();
                            var now = (Date.parse(now) / 1000);
                            var timeLeft = endTime - now;
                            var days = Math.floor(timeLeft / 86400); 
                            var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
                            var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600 )) / 60);
                            var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));
                            if (hours < "10") { hours = "0" + hours; }
                            if (minutes < "10") { minutes = "0" + minutes; }
                            if (seconds < "10") { seconds = "0" + seconds; }
                            
                            $("#days").html(days + "<span><?php echo esc_html( $settings['date'] ); ?></span>");
                            $("#hours").html(hours + "<span><?php echo esc_html( $settings['hours'] ); ?></span>");
                            $("#minutes").html(minutes + "<span><?php echo esc_html( $settings['minutes'] ); ?></span>");
                            $("#seconds").html(seconds + "<span><?php echo esc_html( $settings['seconds'] ); ?></span>");
                        }
                        setInterval(function() { makeTimerLive(); }, 300);
                    });
                }
            
            }(jQuery));

             ;(function($){
                "use strict";
                $(document).ready(function () {
                    // MAILCHIMP
                    if ($(".mailchimp").length > 0) {
                        $(".mailchimp").ajaxChimp({
                            callback: mailchimpCallback,
                            url: "<?php echo esc_js($settings['action_url']) ?>" //Replace this with your own mailchimp post URL. Don't remove the "". Just paste the url inside "".
                        });
                    }
                    $(".memail").on("focus", function () {
                        $(".mchimp-errmessage").fadeOut();
                        $(".mchimp-sucmessage").fadeOut();
                    });
                    $(".memail").on("keydown", function () {
                        $(".mchimp-errmessage").fadeOut();
                        $(".mchimp-sucmessage").fadeOut();
                    });
                    $(".memail").on("click", function () {
                        $(".memail").val("");
                    });

                    function mailchimpCallback(resp) {
                        if (resp.result === "success") {
                            $(".mchimp-sucmessage").html(resp.msg).fadeIn(1000);
                            $(".mchimp-sucmessage").fadeOut(500);
                        } else if (resp.result === "error") {
                            $(".mchimp-errmessage").html(resp.msg).fadeIn(1000);
                        }
                    }
                });
            })(jQuery)
        </script>

        <?php
    }
     
}
Plugin::instance()->widgets_manager->register( new VaximoComingSoon );