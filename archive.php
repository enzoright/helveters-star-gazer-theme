<?php // When u have a Blog it will show there all files
?>
<?php get_header();?>
<div class="container">
    <h1><?php the_title();?></h1>
    <?php get_template_part('includes/section', 'archive');?>
</div>
<?php get_footer();?>