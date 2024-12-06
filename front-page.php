<?php get_template_part('template-parts/header') ?>

<main class="flex flex-col w-full">
  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Snowy-season-logo.png" alt="Logotype, company branding" class="mx-auto mb-8 h-20 w-20 md:h-32 md:w-32 lg:h-40 lg:w-40">
  <section class="mb-8 mx-4 md:mx-12 lg:mx-20 xl:mx-28 bg-zinc-100 py-3 px-4 rounded-md text-gray-900 bg-opacity-90 dark:bg-zinc-800 dark:text-gray-50 dark:bg-opacity-90">
    <?php if (have_posts()): while (have_posts()): the_post(); ?>
        <?php if (the_post_thumbnail()) : the_post_thumbnail();
        endif; ?>
        <?php the_content(); ?>
    <?php endwhile;
    endif; ?>
  </section>
</main>

<?php get_template_part('template-parts/footer') ?>
