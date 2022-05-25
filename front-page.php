<?php
/*
Template Name: Front page
*/ 

get_header(); 

$title = get_field('test_title'); 
?>

<main>
    <section id="main">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <?php if($title) : ?>
                        <h1><?php echo $title; ?>
                    <?php endif; ?>
                    </h1>
                    <p>
                        The next generation of enterprise architecture <br/> tooling
                    </p>
                    <div class="notify-form">
                        <input type="email" placeholder="Email" name="email" />
                        <input type="phone" placeholder="Phone Number (optional)" />
                        <a class="btn btn-red">
                            <img width="18" height="18" src="<?php echo get_template_directory_uri() .'/assets/images/bell-ic.png' ?>" alt="bell" />
                            Notify me
                        </a>
                    </div>
                    <span class="coming-text">Coming 2023, keep me informed</span>
                    <div>
                        <a href="#" class="btn small">What is Enterprise Insight?</a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <img src="<?php echo get_template_directory_uri() .'/assets/images/smaller/min/main_image.png' ?>" class="macbook" alt="main_image" />
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
                <div class="col-lg-4 col-md-12 option">
                    <img width="20" height="20" src="<?php echo get_template_directory_uri() .'/assets/images/feather-ic.png' ?>" alt="">
                    <h3>Creation</h3>
                    <p>
                        Import data into our flexible metamodel <br />
                        through our REST API and out of the box <br />
                        connectors. Generate visualizations <br />
                        automatically in minutes
                    </p>
                </div>
                <div class="col-lg-5 col-md-12 option center">
                    <img width="20" height="20" src="<?php echo get_template_directory_uri() .'/assets/images/grid-ic.png' ?>" alt="">
                    <h3>Customization</h3>
                    <p>
                        Our automation engine has powerful customization options, <br />
                        with the ability to supplement with the manual editing. Use our <br />
                        automation engine to export content to the diagramming tool or <br />
                        start with a blank slate. Diagrams are stored in an open format <br />
                        and can be imported from / exported to draw.io / diagrams.net
                    </p>
                </div>
                <div class="col-lg-3 col-md-12 option">
                    <img width="20" height="20" src="<?php echo get_template_directory_uri() .'/assets/images/union.png' ?>" alt="">
                    <h3>Communication</h3>
                    <p>
                        Enterprise Insight Portal is a simple,<br />
                        collaborative consumption interface for your <br />
                        information consumers. Publish your content<br />
                        and allow your audience to interact with it.
                    </p>
                </div>
            </div>
        </div>
    </section>
</main>



<?php get_footer(); ?>