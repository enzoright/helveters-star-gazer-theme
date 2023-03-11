<?php get_header();?>

<section class="page-wrap normal-page">
<div class="container content-container">
    <h1><?php the_title();?></h1>
    <?php get_template_part('includes/section', 'content');?>
</div>
</section>
<?php get_footer();?>