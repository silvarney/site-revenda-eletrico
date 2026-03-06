<?php

add_action('after_setup_theme', function() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
});

add_action('wp_enqueue_scripts', function() {
    wp_enqueue_style(
        'tailwind-style',
        get_template_directory_uri() . '/assets/css/output.css',
        [],
        filemtime(get_template_directory() . '/assets/css/output.css')
    );
});

function tema_scripts() {
    wp_enqueue_script(
        'filtro-veiculos',
        get_template_directory_uri() . '/assets/js/filtro-veiculos.js',
        [],
        null,
        true
    );

    wp_localize_script('filtro-veiculos', 'ajax_object', [
        'ajaxurl' => admin_url('admin-ajax.php')
    ]);
}

add_action('wp_enqueue_scripts', 'tema_scripts');