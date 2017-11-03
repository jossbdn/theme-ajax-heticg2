<div class="container">
  <div class="row articles_list">
    <?php
      $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

      $args = array(
        'post_type' => 'post',
        'posts_per_page' => 3,
        'paged' => $paged
      );

      // The Query
      $the_query = new WP_Query( $args );

      // The Loop
      if ( $the_query->have_posts() ) {

          while ( $the_query->have_posts() ) {
              $the_query->the_post();
              get_template_part('templates/misc/article');
          }

          /* Restore original Post Data */
          wp_reset_postdata();
      } else {
          // no posts found
      }
    ?>
  </div>
<script type="text/javascript">
   var current_page = <?= $paged; ?>;
   var max_paged = <?= $the_query->max_num_pages; ?>
</script>
</div>
<div class="container">
  <div class="row button_more">
      <a href="#" title="Read more" class="button">read more</a>
  </div>
</div>
