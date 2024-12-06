<?php get_template_part('template-parts/header') ?>

<section class="flex flex-col w-full">
  <div class="mb-8 mx-4 md:mx-12 lg:mx-20 xl:mx-28 bg-zinc-100 py-3 px-4 rounded-md text-gray-900 bg-opacity-90 dark:bg-zinc-800 dark:text-gray-50 dark:bg-opacity-90">
    <?php
    $args = array(
      'post_type' => 'post',
      'posts_per_page' => 5,
      'orderby' => 'date',
      'order' => 'DESC'
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) :
      while ($query->have_posts()) : $query->the_post(); ?>
        <div class="pt-4 pb-2 px-2">
          <h1 class="text-lg md:text-xl lg:text-2xl font-semibold"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h1>
          <p class="text-xs md:text-sm text-gray-600 dark:text-gray-200">Posted by: <?php the_author() ?></p>
          <p class="text-xs md:text-sm text-gray-600 dark:text-gray-200">Posted: <?php the_date() ?></p>
          <p class="text-xs md:text-sm text-gray-600 dark:text-gray-200"><?php if (the_tags()) : echo 'Tags: ' . the_tags(); ?><?php endif; ?></p>
          <p class="text-sm md:text-base lg:text-lg"><?php the_content() ?></p>
          <div class="w-full pt-2 border-b border-gray-900 dark:border-gray-500"></div>
        </div>
      <?php endwhile; ?>

      <!-- Pagination med WPs inbyggda paginate_links() -->
      <div class="text-center text-sm md:text-lg lg:text-xl">
        <?php echo paginate_links(
          array(
            'prev_text' => __('<span class="hover:underline">Föregående</span>'),
            'next_text' => __('<span class="hover:underline">Nästa</span>'),
            'before_page_number' => __('<span class=hover:underline">'),
            'after_page_number' => __('</span>')
          )
        ) ?>
      </div>
  </div>
<?php else : ?>
  <p>Här var det tomt, posta ett blogginlägg för att visa innehåll.</p>
<?php endif; ?>

</section>

<?php get_template_part('template-parts/footer') ?>
