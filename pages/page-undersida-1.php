<?php get_template_part('template-parts/header') ?>

<section class="grid w-full grid-cols-1 lg:grid-cols-9 gap-3">
  <div class="col-start-1 row-start-1 lg:col-start-4 lg:col-end-9 w-11/12 lg:min-w-full bg-zinc-100 text-gray-900 bg-opacity-90 dark:bg-zinc-800 dark:text-gray-50 dark:bg-opacity-90 rounded-md shadow-md mx-auto lg:mx-0 my-2 lg:my-4 py-4 px-4 md:px-6 lg:px-8">
    <?php
    /* Variabler med funktioner som gör det möjligt med paginering på andra sidor än på blog/nyhetssidan där alla inlägg annars hamnar */
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $args = array(
      'post_type' => 'post',
      'posts_per_page' => 5,
      'orderby' => 'date',
      'order' => 'DESC',
      'paged' => $paged
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
      <!-- Pagination med WPs inbyggda paginate_links(), skickar med ytterligare argument för att säkerställa att paginationen fungerar när det inte är på nyhets/blogsidan -->
      <div class="text-center text-sm md:text-lg lg:text-xl">
        <?php echo paginate_links(
          array(
            'base' => get_pagenum_link(1) . '%_%',
            'format' => 'page/%#%',
            'total' => $query->max_num_pages,
            'current' => $paged,
            'prev_text' => __('<span class="hover:underline">Föregående</span>'),
            'next_text' => __('<span class="hover:underline">Nästa</span>'),
            'before_page_number' => __('<span class=hover:underline">'),
            'after_page_number' => __('</span>')
          )
        ) ?>
      </div>
      <?php wp_reset_postdata(); ?>
  </div>
<?php else : ?>
  <p>Här var det tomt, posta ett blogginlägg för att visa innehåll.</p>
<?php endif; ?>

<div class="col-start-1 lg:col-start-2 lg:col-end-4">
  <!-- Widget för sidebar -->
  <?php if (is_active_sidebar('sidebar-widget')) : ?>
    <div class="relative">
      <button
        id="toggleSidebarLeft"
        aria-expanded="false"
        class="fixed top-1/2 left-0 bg-gray-200 bg-opacity-80 text-gray-900 dark:bg-zinc-800 dark:text-gray-50 px-1 py-2 rounded-e-full shadow-lg lg:hidden z-10">
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-6 h-6" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M4.146 3.646a.5.5 0 0 0 0 .708L7.793 8l-3.647 3.646a.5.5 0 0 0 .708.708l4-4a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708 0M11.5 1a.5.5 0 0 1 .5.5v13a.5.5 0 0 1-1 0v-13a.5.5 0 0 1 .5-.5" />
        </svg>
      </button>
      <aside
        id="sidebarLeft"
        class="fixed bottom-2 left-0 w-3/5 h-3/4 bg-zinc-100 text-gray-900 dark:text-gray-50 dark:bg-zinc-800 transition-transform transform -translate-x-full lg:bg-opacity-90 lg:dark:bg-opacity-90 lg:translate-x-0 lg:relative lg:w-full lg:h-auto lg:block z-20 px-2 md:px-4 shadow-md my-6 py-2 rounded-md">
        <div class="relative">
          <button
            id="closeSidebarLeft"
            aria-expanded="true"
            class="absolute top-4 right-4 text-gray-500 hover:text-gray-800 dark:text-gray-300 dark:hover:text-gray-100 lg:hidden">
            Stäng X
          </button>
          <?php dynamic_sidebar('sidebar-widget'); ?>
        </div>
      </aside>
    </div>
</div>
<?php endif; ?>

</section>

<?php get_template_part('template-parts/footer') ?>
