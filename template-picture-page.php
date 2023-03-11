<?php 
/*
Template Name: Picture Page
*/

get_header();?>
<img class="img-styling" src="<?php echo get_hero_image_url(); ?>" alt="Small Hero Image">
<section class="page-wrap">
<div class="container content-container">
    <h1><?php the_title();?></h1>
    <?php get_template_part('includes/section', 'content');?>
</div>
</section>
<?php get_footer();?>