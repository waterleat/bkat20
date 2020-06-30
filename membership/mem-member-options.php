<div class="map w-full px-4 ">
  <h2>option page</h2>
  <div class="flex flex-wrap">
    <a href="<?php echo get_page_link( get_page_by_title( 'dojo map' )->ID ); ?>" class="bg-green-200 py-2 px-4 m-4 ">Dojo Map</a>
    <a href="<?php echo get_page_link( get_page_by_title( 'event venue' )->ID ); ?>" class="bg-green-200 py-2 px-4 m-4 ">Membership distribution from a venue</a>
    <a href="<?php echo get_page_link( get_page_by_title( 'ind member' )->ID ); ?>" class="bg-green-200 py-2 px-4 m-4 ">Individual profile</a>
    <a href="<?php echo get_page_link( get_page_by_title( 'ind member' )->ID ); ?>" class="bg-green-200 py-2 px-4 m-4 ">your dojo pages accessed from end of profile page</a>
    <a href="<?php echo esc_url( home_url( '/wp-admin/edit.php?post_type=venues' ) ); ?>" class="bg-green-200 py-2 px-4 m-4 ">venues</a>
    <a href="<?php echo esc_url( home_url( '/wp-admin/edit.php?post_type=event' ) ); ?>" class="bg-green-200 py-2 px-4 m-4 ">events</a>
    <a href="<?php echo esc_url( home_url( '/wp-admin/edit.php' ) ); ?>" class="bg-green-200 py-2 px-4 m-4 ">post for front page</a>
  </div>
  <p>One has to be logged in to see this page. The selections that can be made will depend on the members access priviliges. </p>
  <ul>
    <li>ordinary members</li>
      <ul>
        <li>change personal details</li>
        <li>renew membership and book events</li>
      </ul>
    <li>dojo officers (for their own dojo)</li>
      <ul>
        <li>change all dojo details except dojo name and dojo leader</li>
        <li>location of dojo marker on map</li>
        <li>add new 'temporary' members to BKA</li>
        <li>check visiting member has valid insurance/membership to BKA</li>
        <li>approve existing member to be a dojo member</li>
      </ul>
    <li>bu officers</li>
      <ul>
        <li>create and edit events, venues and gradings</li>
        <li>add/edit 'posts' to main page of site</li>
        <li>create the booking details for events and gradings</li>
      </ul>
    <li>BKA officers (elected, co-opted)</li>
      <ul>
        <li>depending on needs - access more info about members</li>
        <li>roles for: child protection, coach coordinator, membership secretary, etc.</li>
      </ul>
    <li>site admin</li>
      <ul>
        <li>assign access rights to individual members</li>
        <li>functionality of site</li>
        <li>change themes and plugins</li>
      </ul>
    <li>web administrators</li>
      <ul>
        <li>those with access to the database and code</li>
      </ul>
  </ul>
</div>
<?php
