<?php
$bu = get_query_var('bu');
$count = get_query_var('count');
// $menuclass = get_query_var( 'menuclass' );
?>
<!-- An opening div has already been sent -->
  <?php
    // Define our WP Query Parameters
    $query_options = array(
         'category_name' => $bu,
         'posts_per_page' => $count,
         'paged' => true,
    );
    $the_query = new WP_Query( $query_options );
  ?>
  <div id="" class="my-posts">
    <?php
      while ($the_query -> have_posts()) : $the_query -> the_post();
        // get_template_part( 'views/content', get_post_format() );
        // Display the Post Title with Hyperlink
        the_title( '<h4 class="text-lg font-bold entry-title -mb-3"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' );
        // Display the Post Excerpt
        the_excerpt(__('(more…)'));
        // Repeat the process and reset once it hits the limit
      endwhile;
    ?>
  </div>
</div>

<?php wp_reset_postdata();?>

<!-- load more posts bu, all, ... -->
<?php
  if ($bu == 'cs'){
    $ucbu = 'Central Services';
  }else {
    $ucbu = ucwords( $bu ) ;
  }
?>
<div  class="loadmore w-full py-2 flex justify-around">
  <a class="btn btn-blue" href="<?php echo site_url( '/category/' ), $bu ?>/">Load more <?php echo $ucbu;?> posts</a>
  <a class="btn btn-blue" href="<?php echo site_url( '/blog/' )?>">All Posts</a>


<?php
