<?php

add_action('add_meta_boxes', function() {
    add_meta_box(
        'veiculos_detalhes',
        'Detalhes do Veículo',
        'veiculos_metabox_html',
        'veiculo'
    );
});

function veiculos_metabox_html($post) {
    $preco = get_post_meta($post->ID, 'preco', true);
    $autonomia = get_post_meta($post->ID, 'autonomia', true);
    ?>
    <p>
        <label for="preco">Preço:</label>
        <input type="text" id="preco" name="preco" value="<?= esc_attr($preco) ?>">
    </p>
    <p>
        <label for="autonomia">Autonomia (km):</label>
        <input type="text" id="autonomia" name="autonomia" value="<?= esc_attr($autonomia) ?>">
    </p>
    
    <?php
}

add_action('save_post', function($post_id) {
    if (isset($_POST['preco'])) {
        update_post_meta($post_id, 'preco', sanitize_text_field($_POST['preco']));
    }
    if (isset($_POST['autonomia'])) {
        update_post_meta($post_id, 'autonomia', sanitize_text_field($_POST['autonomia']));
    }

});