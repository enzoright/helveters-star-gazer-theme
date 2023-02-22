<?php get_header();?>
<?php $image = wp_get_attachment_image_src(get_theme_mod('hero_image'), 'full'); ?>
<div class="hero-image" style="background-image: url('<?php echo esc_url($image[0]); ?>');">
    <!-- Hier können weitere Elemente wie Überschrift und Text hinzugefügt werden -->
</div>
<section class="page-wrap">
<div class="container front-container">
    <h1 class="front-page-title"><?php the_title();?></h1>
    <?php get_template_part('includes/section', 'content');?>
    <button class="btn">Schnuppern</button>
</div>
</section>
<?php get_footer();?>