<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Agency - Start Bootstrap Theme</title>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <?php 
    add_action( 'wp_head', 'my_facebook_tags' );
    function my_facebook_tags() {
        if( is_single() ) {
        ?>
        <meta property="og:title" content="<?php the_title() ?>" />
        <meta property="og:site_name" content="<?php bloginfo( 'name' ) ?>" />
        <meta property="og:url" content="<?php the_permalink() ?>" />
        <meta property="og:description" content="<?php the_excerpt() ?>" />
        <meta property="og:type" content="article" />

        <?php 
          if ( has_post_thumbnail() ) :
            $image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' ); 
        ?>
          <meta property="og:image" content="<?php echo $image[0]; ?>"/>  
        <?php endif; ?>

        <?php
        }
    }
    wp_head(); ?>
<style type="text/css">
    header {
        background-image: url(<?php echo esc_url(get_theme_mod( 'home_top_background_image'));?>);
    }    
</style>
</head>

<body id="page-top" class="index">

    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">Start Bootstrap</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'menu_class' => 'nav navbar-nav navbar-right' ) ); ?>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <header>
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></div>
                <div class="intro-heading"><?php echo get_bloginfo( 'description', 'display' ); ?></div>
                <a href="#services" class="page-scroll btn btn-xl">Tell Me More</a>
            </div>
        </div>
    </header>