<div class="row justify-center">
    <div class="post-nav">

        <?php
            $prevPost = get_previous_post(true);
            $nextPost = get_next_post(true);
        ?>

        <?php 
            $prevPost = get_previous_post(true);
                if ($prevPost) {
                    $args = array(
                        'posts_per_page' => 1,
                        'include' => $prevPost->ID
                );
                
            $prevPost = get_posts($args);
                foreach ($prevPost as $post) {
                    setup_postdata($post);
        ?>

        <div class="post-nav__previous">
            <div class="col-small-12">
                
                <!-- ADD THE THUMBNIAL AND LINK IT TO THE POST -->
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>

                <div class="post-nav__overlay">
                    <!-- ALSO WITH THE TITLE -->
                    <h4 class="post-nav__previous--heading">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h4>

                    <div class="post-nav__previous--cont"> 
                        <a href="<?php the_permalink(); ?>"><?php the_excerpt('taxispirit_excerpt_length'); ?></a>
                    </div>

                    <!-- FINALLY SHOW AN ACTUAL NAVIGATIONAL PROMPT -->
                    <div class="post-nav__previous--previous">
                        <a href="<?php the_permalink(); ?>">< Previous Story</a>
                    </div>
                </div>

            </div>
        </div>

            <?php wp_reset_postdata();
                    } //end foreach
                } // end if

            $nextPost = get_next_post(true);
                if ($nextPost) {
                    $args = array(
                        'posts_per_page' => 1,
                        'include' => $nextPost->ID
                );
            $nextPost = get_posts($args);
                foreach ($nextPost as $post) {
                    setup_postdata($post);
            ?>

            <div class="post-nav__next">
                <div class="col-sm-12">

                    <!-- ADD THE THUMBNIAL AND LINK IT TO THE POST -->
                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>

                    <div class="post-nav__overlay">
                        <!-- ALSO WITH THE TITLE -->
                        <h4 class="post-nav__next--heading">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h4>
                        <div class="post-nav__next--cont">
                            <a href="<?php the_permalink(); ?>"><?php the_excerpt('taxispirit_excerpt_length'); ?></a>
                        </div>
                        <!-- FINALLY SHOW AN ACTUAL NAVIGATIONAL PROMPT -->
                        <div class="post-nav__next--next">
                            <a href="<?php the_permalink(); ?>"> Next Story ></a>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

        <?php wp_reset_postdata();
                } //end foreach
            } // end if
        ?>

    </div>
</div>