<?php
/*
Template Name: Leitungsteam
*/
?>
<?php get_header();?>
<img class="img-styling" src="<?php echo get_hero_image_url(); ?>" alt="Small Hero Image">
<div class="container content-container">
   <h1>Leitungsteam</h1>
   <div class="aktivitaet-text">
   </div>
    <div class="scoutleader-group-container container">
        <?php
            
            if(have_rows('scoutleader_leitungsperson')):
                while(have_rows('scoutleader_leitungsperson')):
                    the_row();
                    ?>
                    <div class="scoutleader-container">
                        <img src="<?php echo get_sub_field('scoutleader_bild')['url'];?>" alt="TODO Name hinzufügen"/>
                        <div class="scoutleader-desc">
                            <div class="scoutleader-desc-names"></div>
                            <div class="scoutleader-desc-functions"></div>
                        </div>
                        <div class="scoutleader-mail"></div>
                    </div>
<?php
                endwhile;
            endif;
        ?>
    </div>
</div>
<?php get_footer();?>