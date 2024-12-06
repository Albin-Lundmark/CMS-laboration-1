<?php get_template_part('template-parts/header') ?>
<main class="flex flex-col w-full">
  <div class="mx-auto w-11/12 lg:w-3/5 px-3 py-2 bg-zinc-100 text-gray-900 bg-opacity-90 dark:bg-zinc-800 dark:text-gray-50 dark:bg-opacity-90 rounded-md shadow-md">
    <h2 class="text-lg">Sökresultat: <?php the_search_query() ?></h2>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <h1 class="text-2xl font-semibold"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h1>
        <p class="text-sm font-light"><?php the_author() ?></p>
        <p class="text-sm font-light"><?php the_date() ?></p>
        <p class="text-sm font-light"><?php the_tags() ?></p>
        <p class="text-base"><?php the_excerpt() ?></p>
      <?php endwhile; ?>
    <?php else : ?>
      <p>Här var det tomt, posta ett nyhetsinlägg för att kunna söka.</p>
    <?php endif; ?>
  </div>
</main>
<?php get_template_part('template-parts/footer') ?>
