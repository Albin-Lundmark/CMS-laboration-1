<?php get_template_part('template-parts/header') ?>
<main class="flex flex-col w-full">
  <div class="mx-auto w-11/12 lg:w-3/5 px-3 py-2 bg-zinc-100 text-gray-900 bg-opacity-90 dark:bg-zinc-800 dark:text-gray-50 dark:bg-opacity-90 rounded-md shadow-md">
    <?php if (have_posts()): while (have_posts()) : the_post(); ?>
        <!-- <h1> "Vad som ska vara före", </h1> "Vad som ska vara efter/avslutande tag", true/false "echo för att visa eller inte" -->
        <?php the_title("<h1>", "</h1>", true) ?>
        <?php if (has_post_thumbnail()) {
          the_post_thumbnail('md');
        } ?>
        <!--  <?php // använd <?= eller echo, wp_get_attachment_image(/* id som pekar på den bild som man vill visa + , */ 'md')
              ?> -->
        <h4><?php the_author() ?></h4>
        <h5><?php the_date() ?></h5>
        <h5><?php the_tags() ?></h5>
        <p><?php the_content() ?></p>
      <?php endwhile; ?>
    <?php else : ?>
      <p>Här var det tomt, posta ett blogginlägg för att visa innehåll.</p>
    <?php endif; ?>
  </div>
</main>


<?php get_template_part('template-parts/footer') ?>
