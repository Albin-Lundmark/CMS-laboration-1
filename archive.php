<?php get_template_part('template-parts/header') ?>

<main class="flex flex-col w-full">
  <section class="mb-8 mx-4 md:mx-12 lg:mx-20 xl:mx-28 bg-gray-50 py-3 px-4 rounded-md text-gray-900 bg-opacity-80 dark:bg-gray-800 dark:text-gray-50 dark:bg-opacity-90">
    <h1 class="text-center text-gray-900 dark:text-gray-50 text-3xl font-semibold pt-3"><?php the_archive_title() ?></h1>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="text-center p-2">
          <h1 class="text-2xl font-semibold"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h1>
          <p class="text-sm text-gray-600 dark:text-gray-200">Posted by: <?php the_author() ?></p>
          <p class="text-sm text-gray-600 dark:text-gray-200">Posted: <?php the_date() ?></p>
          <p class="text-sm text-gray-600 dark:text-gray-200"><?php if (the_tags()) : echo 'Tags: ' . the_tags(); ?><?php endif; ?></p>
          <?php if (has_post_thumbnail()) {
            $image_id = get_post_thumbnail_id();
            $image_html = wp_get_attachment_image(
              $image_id,
              'md',
              [
                'loading' => 'lazy'
              ]
            );
          }
          ?>
          <p class="text-base"><?php the_content() ?></p>
        </div>
      <?php endwhile; ?>

      <!-- Pagination med WPs inbyggda paginate_links() -->
      <div class="text-center text-xl">
        <?php echo paginate_links(
          array(
            'prev_text' => __('<span class="hover:underline">Föregående</span>'),
            'next_text' => __('<span class="hover:underline">Nästa</span>'),
            'before_page_number' => __('<span class=hover:underline">'),
            'after_page_number' => __('</span>')
          )
        ) ?>
      </div>

    <?php else : ?>
      <p>Här var det tomt, posta ett blogginlägg för att visa innehåll.</p>
    <?php endif; ?>
  </section>
</main>

<?php get_template_part('template-parts/footer') ?>
