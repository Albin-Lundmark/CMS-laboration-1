<!DOCTYPE html>
<html lang="sv">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>
    <?php
    if (is_home() || is_front_page()) {
      bloginfo('name');
      echo ' | ';
      bloginfo('description');
    } elseif (is_single() || is_page()) {
      wp_title('');
      echo ' | ';
      bloginfo('name');
    } elseif (is_category()) {
      single_cat_title();
      echo ' | ';
      bloginfo('name');
    } elseif (is_tag()) {
      single_tag_title();
      echo ' | ';
      bloginfo('name');
    } elseif (is_archive()) {
      the_archive_title();
      echo ' | ';
      bloginfo('name');
    } elseif (is_search()) {
      echo 'Sökresultat för: "' . get_search_query() . '"';
      echo ' | ';
      bloginfo('name');
    } elseif (is_404()) {
      echo 'Sidan kunde inte hittas';
      echo ' | ';
      bloginfo('name');
    } else {
      get_the_title();
      echo ' | ';
      bloginfo('name');
    }
    ?>
  </title>
  <?php wp_head() ?>
</head>

<body class="bg-gray-200 dark:bg-zinc-600 overflow-x-hidden">
  <header class="mb-8 border-b lg:border-b-2 border-b-black bg-gray-100 dark:bg-gray-900">
    <div class="grid grid-flow-row lg:grid-cols-3 pt-3">
      <h1 class="place-self-center font-serif text-3xl mb-2 lg:mb-0 lg:col-start-2 lg:col-end-2 dark:text-gray-50"><a href="/" aria-label="Link to homepage">Snowy season!</a></h1>
      <div class="place-self-center mb-2 lg:col-start-3 lg:col-end-4" aria-label="Search form">
        <?php get_search_form() ?>
      </div>
    </div>
    <div class="relative">
      <button
        aria-expanded="false"
        class="hamburger block md:hidden p-2 text-xl text-gray-900 dark:text-gray-50 focus:outline-none rounded">
        <span class="sr-only">Öppna meny</span>
        <svg xmlns="http://www.w3.org/2000/svg" width="40px" height="40px" fill="currentColor" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5" />
        </svg>
      </button>
      <!-- Mobil navbar -->
      <nav
        class="navbar hidden md:flex">
        <?php wp_nav_menu(array(
          'theme_location' => 'primary-menu',
          'container' => false,
          'menu_class' => 'flex flex-col md:hidden justify-around text-base lg:text-xl'
        )) ?>
      </nav>
    </div>
    <!-- Desktop navbar -->
    <nav class="sticky mb-2" aria-label="Navigation">
      <?php wp_nav_menu(array(
        'theme_location' => 'primary-menu',
        'container' => false,
        'menu_class' => 'hidden md:flex flex-row justify-around text-base lg:text-xl'
      )) ?>
    </nav>
  </header>
  <!-- På alla sidor där headern andvänds följer även en bakgrundsbild med -->
  <div class="absolute top-0 left-0 hidden md:block -z-10 bg-no-repeat bg-cover bg-fixed h-full w-full"
    style="background-image:url(<?= get_template_directory_uri() . "/assets/images/white-background-with-trees-desktop.jpg" ?>" alt="Background image" aria-label="Background image"></div>
  <div class="absolute top-20 left-0 block md:hidden -z-10 bg-cover bg-fixed h-full w-full"
    style="background-image:url(<?= get_template_directory_uri() . "/assets/images/white-background-with-trees.jpg" ?>" alt="Background image" aria-label="Background image"></div>
