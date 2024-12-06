<?php get_template_part('template-parts/header') ?>

<h1>single.php</h1>
<?php if (have_posts()): while (have_posts()) : the_post(); ?>
    <!-- <h1> "Vad som ska vara före", </h1> "Vad som ska vara efter/avslutande tag", true/false "echo för att visa eller inte" -->
    <?php the_title("<h1>", "</h1>", true) ?>
    <?php if (has_post_thumbnail()) {
      the_post_thumbnail('md');
    } ?>
    <!--  <?php // använd <?= eller echo, wp_get_attachment_image(/* id som pekar på den bild som man vill visa + , */ 'md')
          ?> -->
    <h4><?php the_author() ?></h4>
    <h5><?php the_date() . " " . the_time() ?></h5>
    <h5><?php the_tags() ?></h5>
    <p><?php the_content() ?></p>
  <?php endwhile; ?>
<?php else : ?>
  <p>Här var det tomt, posta ett blogginlägg för att visa innehåll.</p>
<?php endif; ?>


<?php get_template_part('template-parts/footer') ?>
