<?php 

add_action('init', 'veiculos_registrar_cpt');

function veiculos_registrar_cpt() {
    register_post_type('veiculo', [
        'label' => 'Veículos',
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-car',
        'supports' => ['title', 'editor', 'thumbnail'],
        'rewrite' => ['slug' => 'veiculos'],
    ]);
}

add_action('init', 'veiculos_taxonomia_marca');

function veiculos_taxonomia_marca() {
    register_taxonomy(
        'marca', 
        'veiculo', 
        [
        'labels' => [
            'name'=> 'Marcas',
            'singular_name'=> 'Marca',
        ],
        'public' => true,
        'hierarchical' => false,
        'rewrite' => ['slug' => 'marca'],
        'show_admin_column' => true,
        ]
    );
}