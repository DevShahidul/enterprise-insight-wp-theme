<?php
/*
Template Name: Front page
*/ 

get_header(); 

?>

<main>
    <section id="main">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <?php the_field('section_contents'); ?>
                    <div class="notify-form">
                        <input type="email" placeholder="Email" name="email" />
                        <input type="phone" placeholder="Phone Number (optional)" />
                        <a class="btn btn-red">
                            <img width="18" height="18" src="<?php echo get_template_directory_uri() .'/assets/images/bell-ic.png' ?>" alt="bell" />
                            Notify me
                        </a>
                    </div>
                    <?php echo do_shortcode('[wpforms id="76" title="false"]'); ?>
                    <span class="coming-text">Coming 2023, keep me informed</span>
                    <div>
                    <?php 
                    $link = get_field('what_is_enterprise_insight_button');
                    if( $link ): 
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                        ?>
                        <a href="<?php echo esc_url( $link_url ); ?>" class="btn small" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                    <?php endif; ?>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                <?php 
                    $image = get_field('hero_figure_image');
                    if( !empty( $image ) ): ?>
                        <img src="<?php echo esc_url($image['url']); ?>" class="macbook" alt="<?php echo esc_attr($image['alt']); ?>" />
                <?php endif; ?>
                </div>
            </div>
            <div class="moving-mouse-holder">
                <div class="mouse">
                    <div class="mouse-button">&nbsp;</div>
                </div>
                <div class="text">SCROLL DOWN <br> TO EXPLORE MORE</div>
            </div>
        </div>
    </section>

    <section id="options">
        <div class="container">
            <div class="row">
            <?php
            // Check rows exists.
            if( have_rows('option_contents') ):

                // Loop through rows.
                while( have_rows('option_contents') ) : the_row();

                    // Load sub field value.
                    $option_icon = get_sub_field('option_icon');
                    $option_title = get_sub_field('option_title'); 
                    $option_content = get_sub_field('option_paragraph_text'); 
                ?>
                    <div class="col-lg-4 col-md-12 option">
                        <?php
                        if( !empty( $option_icon ) ): ?>
                            <img width="20" height="20" src="<?php echo esc_url($option_icon['url']); ?>" alt="<?php echo esc_attr($option_icon['alt']); ?>">
                        <?php endif; ?>
                        <h3><?php echo $option_title; ?></h3>
                        <p><?php echo $option_content; ?></p>
                    </div>
                    <?php
                // End loop.
                endwhile;
                endif;
                ?>
            </div>
        </div>
    </section>
</main>
<!-- //End hero section -->

<!-- Beginning about section -->
<section id="about">
    <div class="container">
    <?php
    $rows = get_field('about_contents_row' );
    // Check rows exists.
    if( $rows ):

        // function consoleLog($msg) {
        //     echo '<script type="text/javascript">' .
        //       'console.log(' . $msg . ');</script>';
        // }
        // consoleLog($index);
    
        
        // Loop through rows.
        while( have_rows('about_contents_row') ) : the_row();
            
            $index = get_row_index();

            $classCount = $index % 2 === 0 ? 'second' : 'first';

            // Load sub field value.
            $label = get_sub_field('section_label'); 
            $title = get_sub_field('section_title'); 
            $contents = get_sub_field('section_content'); 
            $thumb = get_sub_field('section_thumb'); 
        ?>
            <div class="row <?php echo $classCount; ?>">
                <div class="col-lg-6 col-md-12">
                    <div>
                        <?php if($label) : ?>
                            <span class="text-mute"><?php echo $label; ?></span>
                        <?php endif; ?>
                        <?php if($title) : ?>
                            <h1><?php echo $title; ?></h1>
                        <?php endif; ?>
                        <?php if($contents) : ?>
                            <p><?php echo $contents; ?></p>
                        <?php endif; ?>
                    </div>
                </div>
                <?php if(!empty($thumb)) : ?>
                    <div class="col-lg-6 col-md-12">
                        <div class="about-img">
                                <img src="<?php echo esc_url($thumb['url']); ?>" alt="<?php echo esc_attr($thumb['alt']); ?>">
                        </div>
                    </div>
                <?php endif; ?>
            </div>
    <?php
        // End loop.
        endwhile;
    endif; ?>

    <?php 
    $centerLogo = get_field('center_logo');
    if(!empty($centerLogo)) : ?>     
        <div class="row">
            <div class="col-12 about-logo">
            <img width="155" height="155" src="<?php echo esc_url($centerLogo['url']); ?>" alt="<?php echo esc_attr($centerLogo['alt']); ?>">
            </div>
        </div>
    <?php endif; ?>
    </div>
</section>
<!-- //End about section -->

<!-- Beginning shapes section -->
<section id="shapes">
    <div class="container">
    <?php
    $rows = get_field('shapes_content_row' );
    // Check rows exists.
    if( $rows ):

        // function consoleLog($msg) {
        //     echo '<script type="text/javascript">' .
        //       'console.log(' . $msg . ');</script>';
        // }
        // consoleLog($index);
    
        
        // Loop through rows.
        while( have_rows('shapes_content_row') ) : the_row();
            
            $shapes_row_index = get_row_index();

            $classCount = $shapes_row_index % 2 === 0 ? 'even' : 'odd';

            // Load sub field value.
            $shapes_slider = get_sub_field('shapes_slider'); 
        ?>
        <div class="row <?php echo $classCount; ?>">
            <div class="col-lg-6 col-md-12 shape-description">
                <?php the_sub_field('shapes_content'); ?>
                <?php
                    $shapes_link = get_sub_field('shapes_button_link'); 
                
                if($shapes_link):
                    $shapes_link_url = $shapes_link['url'];
                    $shapes_link_title = $shapes_link['title'];
                    $shapes_link_target = $shapes_link['target'] ? $shapes_link['target'] : '_self';
                    ?>
                    <a href="<?php echo esc_url( $shapes_link_url ); ?>" class="btn btn-red" target="<?php echo esc_attr( $shapes_link_target ); ?>"><?php echo esc_html( $shapes_link_title ); ?></a>
                <?php endif; ?>
            </div>
            <?php if(!empty($shapes_slider)) : ?>
                <div class="col-lg-6 col-md-12 shape-thumb">
                    <div class="shape-img slider">
                        <?php
                        if( have_rows('shapes_slider') ):
                            while( have_rows('shapes_slider') ) : the_row(); 
                                $slider_image = get_sub_field('slider_image'); 
                            ?>
                            <img src="<?php echo esc_url($slider_image['url']); ?>" alt="<?php echo esc_attr($slider_image['alt']); ?>">
                        <?php 
                        // End inner loop
                        endwhile; endif; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    <?php
        // End loop.
        endwhile;
    endif; ?>
    </div>
</section>
<!-- //End shapes section -->

<!-- Beginning coming soon section -->
<section class="coming-soon">
    <div class="container">
        <div class="row">
            <div class="col">
                <?php $coming_soon_thumb = get_field('coming_soon_thumb');
                if( !empty( $coming_soon_thumb ) ): ?>
                    <img src="<?php echo esc_url($coming_soon_thumb['url']); ?>" alt="<?php echo esc_attr($coming_soon_thumb['alt']); ?>" />
                <?php endif; ?>

                <?php the_field('coming_soon_content'); ?>
                <?php 
                    $coming_btn = get_field('coming_soon_btn');
                if(!empty($coming_btn)) : 
                    $coming_btn_url = $coming_btn['url'];
                    $coming_btn_title = $coming_btn['title'];
                    $coming_btn_target = $coming_btn['target'] ? $coming_btn['target'] : '_self';
                ?>
                    <a href="<?php echo esc_url( $coming_btn_url ); ?>" class="btn btn-red" target="<?php echo esc_attr( $coming_btn_target ); ?>"><?php echo esc_html( $coming_btn_title ); ?></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<!-- //End coming soon section -->



<?php get_footer(); ?>