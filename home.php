<?php get_template_part('template-parts/header') ?>

<section class="grid w-full grid-cols-1 lg:grid-cols-9 gap-3">
	<div class="col-start-2 col-end-7 lg:col-start-2 lg:col-end-7 min-w-full bg-zinc-100 text-gray-900 bg-opacity-90 dark:bg-zinc-800 dark:text-gray-50 dark:bg-opacity-90 rounded-md shadow-md my-2 lg:my-4 py-4 px-4 md:px-6 lg:px-8">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<!-- Om inlägget har en utvald bild, visa upp den här -->
				<?php if (has_post_thumbnail()) : ?>
					<div class="w-fit h-fit place-self-center p-2 my-1 shadow-md bg-white rounded-md">
						<?php
						$image_id = get_post_thumbnail_id();
						echo wp_get_attachment_image(
							$image_id,
							'lg',
							false,
							[
								'loading' => 'lazy',
								'class' => 'place-self-center',
								'alt' => get_post_meta($image_id, '_wp_attachment_image_alt', true),
								'srcset' => wp_get_attachment_image_srcset($image_id),
								'sizes' => '(max-width: 768px) 100vw, (max-width: 1024px) 50vw, 25vw'
							]
						);
						?>
					</div>
				<?php endif; ?>
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
<div class="col-start-7 lg:col-start-7 lg:col-end-9">
	<!-- Widget för sidebar -->
	<?php if (is_active_sidebar('sidebar-widget')) : ?>
		<div class="relative">
			<button
				id="toggleSidebar"
				aria-expanded="false"
				class="fixed top-1/2 right-0 bg-gray-200 bg-opacity-80 text-gray-900 dark:bg-zinc-800 dark:text-gray-50 px-1 py-2 rounded-s-full shadow-lg lg:hidden z-10">
				<svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-6 h-6" viewBox="0 0 16 16">
					<path fill-rule="evenodd" d="M11.854 3.646a.5.5 0 0 1 0 .708L8.207 8l3.647 3.646a.5.5 0 0 1-.708.708l-4-4a.5.5 0 0 1 0-.708l4-4a.5.5 0 0 1 .708 0M4.5 1a.5.5 0 0 0-.5.5v13a.5.5 0 0 0 1 0v-13a.5.5 0 0 0-.5-.5" />
				</svg>
			</button>
			<aside
				id="sidebar"
				class="fixed bottom-2 right-0 w-3/5 h-3/4 bg-zinc-100 text-gray-900 dark:text-gray-50 dark:bg-zinc-800 transition-transform transform translate-x-full lg:bg-opacity-90 lg:dark:bg-opacity-90 lg:translate-x-0 lg:relative lg:w-full lg:h-auto lg:block z-20 px-2 md:px-4 shadow-md my-6 py-4 rounded-md">
				<div class="relative">
					<button
						id="closeSidebar"
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
