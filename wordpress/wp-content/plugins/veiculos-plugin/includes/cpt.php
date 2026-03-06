<?php
add_action('init', function() {
    $labels = [
        'name' => 'Veículos',
        'singular_name' => 'Veículo',
        'add_new_item' => 'Adicionar Novo Veículo'
    ];

    $args = [
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'supports' => ['title','editor','thumbnail','custom-fields'],
        'show_in_rest' => true // ativa REST API
    ];

    register_post_type('veiculo', $args);
});