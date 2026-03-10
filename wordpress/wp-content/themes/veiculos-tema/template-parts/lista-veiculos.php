<?php
$paged = isset($_REQUEST['paged']) ? intval($_REQUEST['paged']) : 1;
$args = [
    "post_type" => "veiculo",
    "posts_per_page" => 4,
    "paged" => $paged,
];

$query = new WP_Query($args);

if ( $query->have_posts() ) {

    while ( $query->have_posts() ) :
        $query->the_post();
        get_template_part('template-parts/veiculo-card');
    endwhile;

    if ($query->max_num_pages > $paged) {
            echo '<div class="pagination">';
            echo paginate_links([
                'base' => '%_%',
                'format' => '?paged=%#%',
                'current' => $paged,
                'total' => $query->max_num_pages,
                'type' => 'list'
            ]);
            echo '</div>';
        }
} else {

    echo '<p>Nenhum veículo encontrado.</p>';

}

wp_reset_postdata();