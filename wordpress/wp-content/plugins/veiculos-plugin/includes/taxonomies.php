<?php
add_action('init', function() {
    register_taxonomy('marca', 'veiculo', [
        'label' => 'Marca',
        'hierarchical' => true,
        'show_in_rest' => true,
        'rewrite' => ['slug' => 'marca'],
    ]);

    register_taxonomy('tipo', 'veiculo', [
        'label' => 'Tipo',
        'hierarchical' => false,
        'show_in_rest' => true,
        'rewrite' => ['slug' => 'tipo'],
    ]);
});