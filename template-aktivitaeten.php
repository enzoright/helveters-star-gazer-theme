<?php
/*
Template Name: Aktivitaeten
*/
?>
<?php get_header();?>
<img class="img-styling" src="<?php echo get_hero_image_url(); ?>" alt="Small Hero Image">
<div class="container content-container">
   <h1>Aktivitäten</h1>
   <div class="aktivitaet-text">
   <h4>Hier findest du eine aktuelle Übersicht über alle Events, Abenteuer und Challenges, die jeden Samstag stattfinden. Dazu bekommst du hier jeden Samstag einen Überblick über die aktuellen Aktivitäten: Wo die Aktivitäten stattfinden, was du mitnehmen solltest und jeder ist herzlich eingeladen, bei uns jederzeit vorbeizuschauen.</h4>
   </div>
    <?php get_template_part('includes/section', 'aktivitaeten');?>
</div>
<?php get_footer();?>