<?php
  $bu = get_query_var('bu');
  $size = get_query_var('size');
  $menuclass = get_query_var( 'menuclass' );

?>
<div class=" ">
  <nav id="" class="">
    <?php
    // $bu = strtolower($bu).$num;
    if ( has_nav_menu( $bu ) ) :
      wp_nav_menu( array(
        'theme_location' => $bu,
        'menu_id' => $bu.'-menu-'.$size,
        'walker' => new Bka2018\Core\WalkerNav(),
        'container' => 'ul',
        'menu_class' => 'bu-menu  text-lg  li-px-2 li-py-1 md:justify-end '.$menuclass,
      ) );
    endif;
    ?>
  </nav>
</div>
