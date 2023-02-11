<?php get_header();?>
<section class="page-wrap">
<div class="container">
    <h1><?php the_title();?></h1>
    <?php get_template_part('includes/section', 'content');?>
</div>
</section>
<div>
    <?php if(has_custom_logo()): the_custom_logo(); endif; /* SVG Logos erlauben und Animation*/ ?> 
</div>
<?php get_footer();?>