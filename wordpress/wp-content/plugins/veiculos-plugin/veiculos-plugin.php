<?php
/**
 * Plugin Name: Veículos Plugin
 * Description: Plugin para gerenciar veículos.
 * Version: 1.0.0
 */

if (!defined('ABSPATH')) exit;

define('VP_PATH', plugin_dir_path(__FILE__));
define('VP_URL', plugin_dir_url(__FILE__));

require_once VP_PATH . 'includes/init.php';
//require_once VP_PATH . 'includes/cpt.php';
require_once VP_PATH . 'includes/taxonomies.php';
require_once VP_PATH . 'includes/shortcodes.php';
require_once VP_PATH . 'includes/post-type-veiculos.php';
require_once VP_PATH . 'includes/metabox-veiculos.php';
require_once VP_PATH . 'includes/query-veiculos.php';

add_action('wp_ajax_filtrar_veiculos', 'filtrar_veiculos');
add_action('wp_ajax_nopriv_filtrar_veiculos', 'filtrar_veiculos');

function filtrar_veiculos() {
    $marca = $_POST['marca'] ?? '';

    $args = [
        'post_type' => 'veiculo',
        'posts_per_page' => 12,
    ];

    if ($marca) {
        $args['tax_query'] = [
            [
                'taxonomy' => 'marca',
                'field' => 'slug',
                'terms' => sanitize_title($marca)
            ]
        ];
    }

    $query = new WP_Query($args);

    if ($query->have_posts()) :

        while ($query->have_posts()) :
            $query->the_post();
            get_template_part('template-parts/veiculo-card');
        endwhile;

    else :

        echo '<p>Nenhum veículo encontrado.</p>';

    endif;

    wp_reset_postdata();

    wp_die();
}