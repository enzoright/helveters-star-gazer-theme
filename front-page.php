<?php get_header(); ?>
<?php $image = wp_get_attachment_image_src(get_theme_mod('hero_image'), 'full'); ?>
<div class="hero-image" style="background-image: url('<?php echo esc_url($image[0]); ?>');">
    <button class="circle-button" id="circle-button">
        <p>Jetzt: Abenteuer erleben!</p>
    </button>
</div>
<section class="page-wrap">
    <div class="container front-container">
        <h1 class="front-page-title"><?php the_title(); ?></h1>
        <?php get_template_part('includes/section', 'content'); ?>
        <div class="video-container"><iframe width="1130" height="640" src="https://www.youtube.com/embed/n6jGHrViLHM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe></div>
        <div class="newsletter">
            <h2>Newsletter</h2>
            <p>Abonniere unseren Newsletter und erhalte regelmässig Neuigkeiten und Angebote.</p>
            
        </div>
    </div>
</section>
<?php get_footer(); ?>