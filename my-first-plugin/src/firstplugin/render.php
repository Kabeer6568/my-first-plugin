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
	<div class="pets-card alignfull" id="">
		<div class="pets-card-inner">
			<h2 class="hero-title"><?php echo  esc_html( $attributes['headingText'] )  ?>  </h2>
			<div class="pets-card-grid">
	
<?php    while ( $query->have_posts() ) {
        $query->the_post(); ?>
        

<div class="our-pets">
<div class="pet-img">
<a href="<?php the_permalink() ?>"><?php the_post_thumbnail('medium') ?> </a>
</div>
<div class="pets-info">
    <h3><?php the_title() ?> <?php if( $attributes['showWeight'] ) { echo '(' . get_field('weight') . ' lbs )';} ?></h3>
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





<?php
// Get all species terms
$species_terms = get_terms( array(
    'taxonomy'   => 'species',
    'hide_empty' => true, // only show terms that have posts
) );

if ( ! empty( $species_terms ) && ! is_wp_error( $species_terms ) ) { ?>

<select name=""  id="showPets">
	<option value="" selected disabled>-- Select a pet --</option>

    <?php foreach ( $species_terms as $term ) { ?>


  <optgroup label="<?php echo esc_html( $term->name ); ?>">
	<option value="<?php echo esc_attr( $term->slug ); ?>">
                <?php echo 'All ' . esc_html( $term->name ); ?>
            </option>
       


        <!-- // Query pets in this species -->
        <?php $args = array(
            'post_type'      => 'pets',
            'posts_per_page' => -1,
            'tax_query'      => array(
                array(
                    'taxonomy' => 'species',
                    'field'    => 'term_id',
                    'terms'    => $term->term_id,
                ),
            ),
        );

        $query = new WP_Query($args);

        if ( $query->have_posts() ) {
             ?>
			

           <?php while ( $query->have_posts() ) {
                $query->the_post();
                ?>
              
					<option
					value="<?php echo esc_attr(get_the_ID()); ?>" 
    data-title="<?php echo esc_attr(get_the_title()); ?>" 
    data-excerpt="<?php echo esc_attr(get_the_excerpt()); ?>" 
    data-img="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'medium')); ?>" 
    data-link="<?php the_permalink(); ?>"
					> <a href="<?php the_permalink(); ?>"> <?php  the_title();  ?> </a> </option>

                <?php
            }
            
        } else {
            echo '<p>No pets found in this species.</p>';
        }

        wp_reset_postdata();
    } ?>

</select>
<div id="stayHidden" style="display:none;">
	<div class="our-pets">
<div class="pet-img">
<a id="petLink"> <img id="petImg" > </a>
</div>
<div class="pets-info">
    <h3 id="petTitle"></h3>
	<p id="petExcerpt"></p>
    </div>
 </div>
</div>

<?php } else {
    echo '<p>No species found.</p>';
}
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