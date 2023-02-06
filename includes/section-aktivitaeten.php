<div class="aktivitaet-container">

  <?php if (have_posts()):
    while (have_posts()):
      the_post(); ?>

      <!-- accordion thing-->


      <div class="accordion accordion-flush" id="accordionFlush">
        <div class="accordion-item">
          <h2 class="accordion-header" id="<?php echo 'flush-heading' . get_the_ID(); ?>">
            <button class="accordion-button collapsed container" type="button" data-bs-toggle="collapse"
              data-bs-target="<?php echo '#flush-collapse' . get_the_ID(); ?>" aria-expanded="false"
              aria-controls="<?php echo 'flush-collapse' . get_the_ID(); ?>">
              <div class="aktivitaet-titel">
                <strong><?php the_title(); ?></strong>
              </div>
              <div class="aktivitaet-daten row">
                <div class="col row">
                  <div class="col-12"><strong> Aktivitätsdauer</strong></div>
                  <div class="col-12 row"> 
                    <div class="col-2">von:</div>
                    <div class="col-10"> <?php the_field('aktivitaet_start'); ?></div>
                    <div class="col-2">bis:</div>
                    <div class="col-10"><?php the_field('aktivitaet_end'); ?></div>
                  </div>

                </div>
              </div>
            </button>
          </h2>
          <div id="<?php echo 'flush-collapse' . get_the_ID(); ?>" class="accordion-collapse collapse"
            aria-labelledby="<?php echo 'flush-heading' . get_the_ID(); ?>" data-bs-parent="#accordionFlush">
            <div class="accordion-body container">
              <div class="row">
                <div class="col aktivitaet-img">

                </div>
                <div class="col aktivitaet-content">
                  <?php the_content(); ?>
                </div>
                <div class="col aktivitaet-file">

                </div>
              </div>


            </div>
          </div>
        </div>
      </div>

    <?php endwhile; else: endif; ?>
</div>