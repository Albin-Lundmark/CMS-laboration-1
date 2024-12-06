<?php

// Ladda in CSS filer till projektet, lägg till if() satser för att ha olika CSS för olika sidor
function load_theme_style()
{
  // Lägg till version med filemtime (filemtime kollar efter senaste uppdatering på filen efter datum) för att wordpress inte ska cacha css stylingen
  $version = filemtime(get_template_directory() . '/style.css');
  wp_enqueue_style(
    'albins-tailwind-style',
    get_template_directory_uri() . '/style.css',
    [],
    $version
  );
}
// Kör funktionen för att hämta styles
add_action('wp_enqueue_scripts', 'load_theme_style');

// Ladda in javascript fil för att kunna jobba med navbar, sidebar etc
function load_scripts()
{
  $script_version = filemtime(get_template_directory() . '/assets/js/main.js');
  wp_enqueue_script(
    'albins-js-functions',
    get_template_directory_uri() . '/assets/js/main.js',
    [],
    $script_version,
    true
  );
}
add_action('wp_enqueue_scripts', 'load_scripts');

// Registrera cpt för att kunna lägga till projects på wp-admin
function register_project_cpt()
{
  register_post_type('projects', array(
    'labels' => array(
      'name' => 'Projects',
      'singular_name' => 'Project'
    ),
    'public' => true,
    'has_archive' => true,
    'supports' => array('editor', 'title', 'thumbnail'),
    'rewrite' => array('slug' => 'projects'),
    'show_in_rest' => true,
  ));
  register_taxonomy('project_type', 'projects', array(
    'labels' => array(
      'name' => 'Project types',
      'singular' => 'Project type'
    ),
    'hierarchical' => true, // Gör att taxonomy fungerar som kategori, false gör att det blir som en tag
    'show_in_rest' => true,
    'rewrite' => 'project-type'
  ));
}
add_action('init', 'register_project_cpt');

// Registrera en meny på wp-admin sidan
function labbetttema_register_menus()
{
  register_nav_menus(array(
    'primary-menu' => __('Primary Menu', 'labbetttema'),
    'footer-menu' => __('Footer Menu', 'labbetttema')
  ));
}
// Initiera menyn för att den ska hamna på wp-admin sidan
add_action('init', 'labbetttema_register_menus');

// Ändra klasslistan på varje item i menyn för att kunna styla den med Tailwind
function tailwind_menu_item_classes($classes, $item, $args)
{
  if ($args->theme_location === 'primary-menu') {
    $classes[] = 'block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 hover:underline md:hover:bg-transparent md:hover:text-gray-700 md:p-0 dark:text-gray-200 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700';
  }
  if ($args->theme_location === 'footer-menu') {
    $classes[] = 'block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 hover:underline md:hover:bg-transparent md:hover:text-gray-700 md:p-0 dark:text-gray-200 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700';
  }
  return $classes;
}
add_filter('nav_menu_css_class', 'tailwind_menu_item_classes', 10, 4);

// Hur man skapar en widget
// Lägg til fler register_sidebar(array(/* Innehåll */)) under för att skapa fler widgets.
function labbetttema_register_sidebar()
{
  register_sidebar(array(
    'name' => 'Albins första widget',
    'id' => 'sidebar-widget',
    'before_widget' => '<div>',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="font-mono text-2xl">',
    'after_title' => '</h2>'
  ));
  register_sidebar(array(
    'name' => 'Albins andra widget',
    'id' => 'navbar-widget',
    'before_widget' => '<div>',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="font-mono text-2xl">',
    'after_title' => '</h2>'
  ));
}
add_action('widgets_init', 'labbetttema_register_sidebar');

// Lägg till möjlighet att ange utvaldbild
add_theme_support('post-thumbnails');
// Ange storlekar på bilder och om den ska cropas eller inte (false=crop, true=croppas inte)
add_image_size('sm', 200, 150, false);
add_image_size('md', 800, 600, false);
add_image_size('lg', 1024, 960, false);

// Lägg till ett filter för att kunna strukturera upp projektet med olika mappar
// Lägg till fler vid behov
add_filter('template_include', function ($template) {
  // Hemsidan
  if (is_front_page()) {
    $front_page_template = get_template_directory() . '/front-page.php';
    if (file_exists($front_page_template)) {
      return $front_page_template;
    }
  }
  // Arkiv
  if (is_archive()) {
    $archive_template = get_template_directory() . '/archive.php';
    if (file_exists($archive_template)) {
      return $archive_template;
    }
    return $template;
  }
  // Pages
  if (is_page()) {
    $post_id = get_queried_object_id();
    if (!$post_id) {
      return $template;
    }

    $slug = get_post_field('post_name', $post_id);
    $page_template = get_template_directory() . '/pages/page-' . $slug . '.php';
    if (file_exists($page_template)) {
      return $page_template;
    }

    $default_page_template = get_template_directory() . '/pages/page.php';
    if (file_exists($default_page_template)) {
      return $default_page_template;
    }
    return $template;
  }
  return $template;
});
