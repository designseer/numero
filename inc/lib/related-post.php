<?php

function numero_related_post() {

	$args = '';
    $count = get_theme_mod( 'numero_blog_page_relative_count' , 3);
      
	$args = wp_parse_args( $args, array(
		'category__in'   => wp_get_post_categories( get_the_ID() ),
		'posts_per_page' => $count,
		'post__not_in'   => array( get_the_ID() )
	) );
	$related = new WP_Query( $args );

	if ( $related->have_posts() ) {
	?>
		
			<?php
            $num = 0;
			while ( $related->have_posts() ) {
				$related->the_post();
                
                
                if  ( get_the_post_thumbnail()=='')
                {
                    $background_img_relatedpost   = get_template_directory_uri() . '/img/04-screenshot.jpg';
                    
                    $post_thumbnail= '<img src="'.$background_img_relatedpost.'" class="img-responsive">';
                }
                else
                {
                    $post_thumbnail = get_the_post_thumbnail( get_the_ID(), 'img-responsive' );
                }
                
				$class_format = '';
                
				if  ( get_the_post_thumbnail() !='' )
				$class_format = 'fa-format-' . get_post_format( get_the_ID() );
                
                 $title=get_the_title();
                
                global $post;
                $categories = get_the_category($post->ID);
                $cat_link = get_category_link($categories[0]->cat_ID);
                
                
				printf(                    
					'<article class="col-md-4 col-sm-6 col-xs-12">
                        <header class="entry-header"> %s <a href="%s">
                          <h6>%s</h6></a> 
                          <a href="%s">' .esc_html( $categories[0]->cat_name) . '</a> , 
                        </header>
                      </article>',
					wp_kses_post($post_thumbnail),
                    esc_url( get_permalink() ),
                    esc_html($title),
                    esc_attr($cat_link) );
				?>
			<?php
			}
			?>
		
	<?php
	}
	wp_reset_postdata();
}

?>