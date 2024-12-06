<?php get_template_part('template-parts/header') ?>
<main class="flex flex-col w-full">
  <div class="mx-auto w-11/12 lg:w-3/5 px-3 py-2 bg-zinc-100 text-gray-900 bg-opacity-90 dark:bg-zinc-800 dark:text-gray-50 dark:bg-opacity-90 rounded-md shadow-md">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <section class="m-4">
          <h1 class="text-2xl font-semibold"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h1>
          <p class="text-sm font-light"><?php the_author() ?></p>
          <p class="text-sm font-light"><?php the_date() ?></p>
          <p class="text-sm font-light"><?php the_time() ?></p>
          <p class="text-sm font-light"><?php the_tags() ?></p>
          <p class="text-base"><?php the_content() ?></p>
        </section>
      <?php endwhile; ?>
    <?php endif; ?>
    <h2 class="pt-3 font-sans text-center text-blue-900 hover:text-blue-700 dark:text-blue-300 dark:hover:text-white hover:underline"><a href="<?= esc_url(home_url("/")) ?>">Klicka här för att gå tillbaka till hemsidan</a></h2>
  </div>
</main>
<?php get_template_part('template-parts/footer') ?>
