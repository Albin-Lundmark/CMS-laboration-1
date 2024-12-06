<form role="search" method="get" class="flex items-center space-x-2" action="<?php echo esc_url(home_url('/')); ?>">
  <label>
    <span class="sr-only"><?php esc_html_e('Search for:', 'textdomain'); ?></span>
    <input type="search" class="search-field text-sm md:text-base border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
      placeholder="<?php esc_attr_e('Sök här...', 'textdomain'); ?>"
      value="<?php echo get_search_query(); ?>" name="s" />
  </label>
  <button type="submit" class="search-submit text-sm md:text-base bg-gray-300 text-gray-900 dark:bg-gray-700 bg-opacity-40 dark:text-white px-4 py-2 rounded-lg hover:bg-gray-500">
    <?php esc_html_e('Sök', 'textdomain'); ?>
  </button>
</form>
