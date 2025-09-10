<?php
/**
 * Footer Newsletter Widget
 */

namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Vaximo_FooterNewsletter extends Widget_Base {

	public function get_name() {
        return 'Vaximo_FooterNewsletter';
    }

	public function get_title() {
        return esc_html__( 'Footer Newsletter', 'vaximo-toolkit' );
    }

	public function get_icon() {
        return 'eicon-info-box';
    }

	public function get_categories() {
        return [ 'vaximocategory' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'vaximo_DMbanner_Area',
			[
				'label' => esc_html__( 'Newsletter Control', 'vaximo-toolkit' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
        );

        $this->add_control(
            'news_title', [
                'label'       => __( 'Newsletter Title', 'vaximo-toolkit' ),
                'type'        => Controls_Manager::TEXT,
                'default'     => __('Newsletter', 'vaximo-toolkit'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'news_desc', [
                'label'       => __( 'Newsletter Description', 'vaximo-toolkit' ),
                'type'        => Controls_Manager::TEXT,
                'default'     => __('Latest resources sent to your inbox weekly', 'vaximo-toolkit'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'ph_text',
            [
                'label'       => __('Placeholder Text', 'vaximo-toolkit'),
                'type'        => Controls_Manager::TEXT,
                'default'     => __('Enetr your email address', 'vaximo-toolkit'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'news_btn_text',
            [
                'label'       => __('Newsletter Button Text', 'vaximo-toolkit'),
                'type'        => Controls_Manager::TEXT,
                'default'     => __('Subscribe Now', 'vaximo-toolkit'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'email_url', [
                'label'       => __( 'MailChimp URL', 'vaximo-toolkit' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $this-> end_controls_section();
       

        $this->start_controls_section(
			'section_style',
			[
				'label' => esc_html__( 'Style', 'vaximo-toolkit' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
        );

            $this->add_control(
                'titlecolor',
                [
                    'label' => esc_html__( 'Title Color', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-footer-widget-card h3' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name' => 'typography_title',
                    'label' => __( 'Title Typography', 'vaximo-toolkit' ),
                    'selector' => '{{WRAPPER}} .single-footer-widget-card h3',
                ]
            );

            $this->add_control(
                'ndesccolor',
                [
                    'label' => esc_html__( 'Description Color', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-footer-widget-card .widget-newsletter-content p' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name' => 'typography_ndesc',
                    'label' => __( 'Description Typography', 'vaximo-toolkit' ),
                    'selector' => '{{WRAPPER}} .single-footer-widget-card .widget-newsletter-content p',
                ]
            );

            $this->add_control(
                'form_bgcolor',
                [
                    'label'     => __( 'Form Background Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-footer-widget-card .newsletter-form .input-newsletter' => 'background-color: {{VALUE}} !important',
                    ],
                ]
            );
            $this->add_control(
                'form_borcolor',
                [
                    'label'     => __( 'Form Border Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-footer-widget-card .newsletter-form .input-newsletter' => 'border-color: {{VALUE}} !important',
                    ],
                ]
            );
            $this->add_control(
                'form_color',
                [
                    'label'     => __( 'Form Color', 'vaximo-toolkit' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-footer-widget-card .newsletter-form .input-newsletter' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'btn_color',
                [
                    'label' => esc_html__( 'Button Color', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-footer-widget-card .newsletter-form .default-btn' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'btn_bgcolor',
                [
                    'label' => esc_html__( 'Button Background Color', 'vaximo-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-footer-widget-card .newsletter-form .default-btn' => 'background: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name' => 'typography_btn',
                    'label' => __( 'Button Typography', 'vaximo-toolkit' ),
                    'selector' => '{{WRAPPER}} .single-footer-widget-card .newsletter-form .default-btn',
                ]
            );
        $this->end_controls_section();
    }

	protected function render() {

        $settings       = $this->get_settings_for_display();
        ?>
        <div class="single-footer-widget-card">
            <h3><?php echo esc_html( $settings['news_title'] ); ?></h3>
            
            <div class="widget-newsletter-content">
                <p><?php echo esc_html( $settings['news_desc'] ); ?></p>
            </div>   

            <form method="post" class="newsletter-form mailchimp" data-bs-toggle="validator">
                <input type="email" class=" memail input-newsletter" placeholder="<?php echo esc_attr($settings['ph_text']); ?>" name="EMAIL" required>

                <button type="submit" class="default-btn"><?php echo esc_html( $settings['news_btn_text'] ); ?></button>

                <div class="mchimp-errmessage alert alert-danger" style="display: none;"></div>
                <div class="mchimp-sucmessage alert alert-primary" style="display: none;"></div>
            </form>
        </div>

        <script>
            ;(function($){
                "use strict";
                $(document).ready(function () {
                    // MAILCHIMP
                    $(".mailchimp").ajaxChimp({
                        callback: mailchimpCallback,
                        url: "<?php echo esc_js($settings['email_url']) ?>"
                    });
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
                            $(".mchimp-sucmessage").fadeOut(3000);
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

Plugin::instance()->widgets_manager->register( new Vaximo_FooterNewsletter );