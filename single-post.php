<?php get_template_part('template-parts/header') ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <section class="m-4">
      <h1 class="text-2xl"><?php the_title() ?></h1>
      <h3><?php the_author() ?></h3>
      <h5><?php the_date() ?></h5>
      <h5><?php the_time() ?></h5>
      <h6><?php the_tags() ?></h6>
      <p><?php the_content() ?></p>
    </section>
  <?php endwhile; ?>
<?php endif; ?>
<h1 class="mt-3 hover:text-blue-600"><a href="/" class="p-2">Till hemsidan</a></h1>
<?php get_template_part('template-parts/footer') ?>
