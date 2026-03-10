<?php
$paged = get_query_var('paged') ? get_query_var('paged') : 1;

if (isset($_POST['paged'])) {
    $paged = intval($_POST['paged']);
}

$args = [
    "post_type" => "veiculo",
    "posts_per_page" => 4,
    "paged" => $paged,
    'no_found_rows' => false,
];

$query = new WP_Query($args);

if ( $query->have_posts() ) {

    while ( $query->have_posts() ) :
        $query->the_post();
        get_template_part('template-parts/veiculo-card');
    endwhile;

    if ($query->max_num_pages > 1) {
        echo '<div class="pagination">';
        echo paginate_links([
            'base'      => add_query_arg('paged','%#%'),
            'format'    => '?paged=%#%',
            'total'     => $query->max_num_pages,
            'current'   => $paged,
            'prev_text' => '«',
            'next_text' => '»',
            'type'      => 'list',
        ]);
        echo '</div>';
    }
} else {

    echo '<p>Nenhum veículo encontrado.</p>';

}

wp_reset_postdata();