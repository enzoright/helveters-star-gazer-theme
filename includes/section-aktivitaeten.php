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
                <strong>
                  <?php the_title(); ?>
                </strong>
              </div>
              <div class="aktivitaet-daten row">
                <?php if (get_field('aktivitaet_start')): ?>
                  <div class="col row">
                    <div class="col-12"><strong> Aktivitätsdauer</strong></div>
                    <div class="col-12 row">
                      <div class="col-2">von:</div>
                      <div class="col-10">
                        <?php the_field('aktivitaet_start'); ?>
                      </div>
                      <div class="col-2">bis:</div>
                      <div class="col-10">
                        <?php the_field('aktivitaet_end'); ?>
                      </div>
                    </div>

                  </div>
                <?php endif; ?>
              </div>
            </button>
          </h2>
          <div id="<?php echo 'flush-collapse' . get_the_ID(); ?>" class="accordion-collapse collapse"
            aria-labelledby="<?php echo 'flush-heading' . get_the_ID(); ?>" data-bs-parent="#accordionFlush">
            <div class="accordion-body container">
              <div class="row">
                <div class="col aktivitaet-img">

                  <?php
                  $image = get_field('aktivitaet_image');
                  if (!empty($image)): ?>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                  <?php endif; ?>
                </div>
                <div class="col aktivitaet-content row">
                  <div class="col-12">
                    <?php the_content(); ?>
                  </div>
                  <div class="col-12">
                    <?php if (get_field("aktivitaet_email")):
                      the_field("aktivitaet_email_txt");
                    endif; ?> <a href="mailto:<?php the_field("aktivitaet_email"); ?>"><?php
                        the_field("aktivitaet_email"); ?></a>
                  </div>
                </div>
                <div class="col aktivitaet-file">
                  <?php
                  $file = get_field('aktivitaet_file');
                  if ($file):
                    ?>
                    <a target="_blank"
                      href="<?php echo admin_url('admin-post.php') . '?action=aktivitaet_download&post_id=' . get_the_ID(); ?>"><button
                        type="button" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                          fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                          <path
                            d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                          <path
                            d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                        </svg>
                        <?php echo $file['filename']; ?>
                      </button></a>

                  <?php endif; ?>
                </div>
              </div>


            </div>
          </div>
        </div>
      </div>

    <?php endwhile; else: endif; ?>
</div>