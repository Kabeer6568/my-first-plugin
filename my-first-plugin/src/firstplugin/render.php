<?php
$args = array(
    'post_type'      => 'pets',
    // 'posts_per_page' => -1, // change to a number if you want limits
    // 'tax_query'      => array(
    //     array(
    //         'taxonomy' => 'species',
    //         'field'    => 'slug',   // can also be 'term_id' if you prefer
    //         'terms'    => 'dog',
    //     ),
    // ),
    // 'meta_query'     => array(
    //     array(
    //         'key'     => 'weight',
    //         'value'   => 10,
    //         'type'    => 'NUMERIC',
    //         'compare' => '>',
    //     ),
    // ),
);

$query = new WP_Query($args);

if ( $query->have_posts() ) { ?>

<!-- <div class="pets-card alignfull"> -->
	<div class="pets-card alignfull">
		<div class="pets-card-inner">
			<h2 class="hero-title">Our Pets</h2>
			<div class="pets-card-grid">
	
<?php    while ( $query->have_posts() ) {
        $query->the_post(); ?>
        

<div class="our-pets">
<div class="pet-img">
<a href="<?php the_permalink() ?>"><?php the_post_thumbnail('medium') ?> </a>
</div>
<div class="pets-info">
    <h3><?php the_title() ?></h3>
	<p><?php echo wp_trim_words(get_the_content(), 14) ?></p>
    </div>
 </div>



    <?php } ?>
	</div>
	 </div> 
	 </div>

<?php } else {
    echo '<p>No dogs found heavier than 10.</p>';
}

// reset post data
wp_reset_postdata();
?>



<!-- <div class="services">

  <div class="features">
    <h1>Service 1</h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium ut ratione ad expedita nemo voluptatum excepturi doloribus animi blanditiis, obcaecati consequuntur corrupti tempora, architecto sed deserunt omnis nulla, quidem vel.</p>
  </div>

  <div class="features">
    <h1>Service 2</h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium ut ratione ad expedita nemo voluptatum excepturi doloribus animi blanditiis, obcaecati consequuntur corrupti tempora, architecto sed deserunt omnis nulla, quidem vel.</p>
  </div>
  
  <div class="features">
    <h1>Service 3</h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium ut ratione ad expedita nemo voluptatum excepturi doloribus animi blanditiis, obcaecati consequuntur corrupti tempora, architecto sed deserunt omnis nulla, quidem vel.</p>
  </div>
  
</div> -->