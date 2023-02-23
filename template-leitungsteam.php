<?php
/*
Template Name: Leitungsteam
*/
?>
<?php get_header(); ?>
<img class="img-styling" src="<?php echo get_hero_image_url(); ?>" alt="Small Hero Image">
<div class="container content-container">
    <h1>Leitungsteam</h1>
    <div class="aktivitaet-text">
    </div>
    <div class="scoutleader-group-container container row">
        <?php

        if (have_rows('scoutleader_leitungsperson')) :
            while (have_rows('scoutleader_leitungsperson')) :
                the_row();
        ?>
                <div class="scoutleader-container col-xl-3 col-lg-4 col-md-6">
                    <div class="scoutleader-img-container">
                        <?php
                        $imgUrl = get_sub_field('scoutleader_bild')['url'];
                        $forename = get_sub_field('scoutleader_vorname');
                        $surname = get_sub_field('scoutleader_nachname');
                        $vulgo = get_sub_field('scoutleader_vulgo');
                        $job = get_sub_field('scoutleader_funktion1');
                        $job2 = get_sub_field('scoutleader_funktion2');
                        ?>
                        <img src="<?php echo $imgUrl; ?>" alt="<?php echo $forename . ' ' . $surname . ' vo ' . $vulgo; ?>" />


                    </div>
                    <div class="scoutleader-info">
                        <div class="scoutleader-info-txt">
                            <h5><?php echo $forename . ' ' . $surname; ?></h5>
                            <h5><?php echo ' v/o ' . $vulgo; ?></h5>
                            <h6><?php echo $job; ?>  <br/></h6>
                            <h6><?php echo $job2; ?>  <br/></h6>
                        </div>
                        <a class="scoutleader-mail" href="mailto:<?php echo $vulgo; ?>@pfadihelveter.ch"><div>
                            E-Mail <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="white" class="bi bi-envelope" viewBox="0 0 16 16">
                                <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                            </svg></div></a>
                    </div>
                </div>
        <?php
            endwhile;
        endif;
        ?>
    </div>
</div>
<?php get_footer(); ?>