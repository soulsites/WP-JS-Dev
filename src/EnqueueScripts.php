<?php

namespace GsapDev;

class EnqueueScripts {
    private $js_files = [
        'gsap.min.js' => 'gsap',
        'CSSRulePlugin.min.js' => 'gsap',
        'CustomEase.min.js' => 'gsap',
        'Draggable.min.js' => 'gsap',
        'EaselPlugin.min.js' => 'gsap',
        'EasePack.min.js' => 'gsap',
        'Flip.min.js' => 'gsap',
        'MotionPathPlugin.min.js' => 'gsap',
        'Observer.min.js' => 'gsap',
        'PixiPlugin.min.js' => 'gsap',
        'ScrollToPlugin.min.js' => 'gsap',
        'ScrollTrigger.min.js' => 'gsap',
        'TextPlugin.min.js' => 'gsap',
        'p5.min.js' => 'ps5',
    ];

    public function __construct() {
        add_action('wp_enqueue_scripts', [$this, 'enqueue_selected_scripts']);
    }

    public function enqueue_selected_scripts() {
        foreach ($this->js_files as $file => $folder) {
            $field_name = 'crb_' . str_replace(['.', '-'], '_', strtolower($file));
            $option = carbon_get_theme_option($field_name);
            if ($option) {
                wp_enqueue_script(
                    'gsapdev-' . $file,
                    plugin_dir_url(dirname(__FILE__)) . 'src/Public/js/' . $folder . '/' . $file,
                    array(),
                    null,
                    true
                );
            }
        }
    }
}