<?php
/**
 * The template for displaying the header
 */
echo get_template_part('template-parts/header/head');
wp_head();
?>

<body <?php body_class('bg-body'); ?>>
<?php wp_body_open(); ?>

<div class="site min-h-screen flex flex-col">

	<header class="site-header bg-gray-900 text-gray-100">
		<div class="container mx-auto px-4 py-4 flex items-center justify-between">
			<?php
			// Logo or site title
			$logo = AfzaliWP\Theme\Includes\Helper::get_logo();
			if ($logo): ?>
				<a href="<?php echo esc_url(home_url('/')); ?>" class="inline-block">
					<img src="<?php echo esc_url($logo); ?>" alt="<?php bloginfo('name'); ?>" class="h-10 w-auto">
				</a>
			<?php else: ?>
				<a href="<?php echo esc_url(home_url('/')); ?>" class="text-2xl font-bold hover:text-white">
					<?php bloginfo('name'); ?>
				</a>
			<?php endif; ?>

			<?php
			// Navigation partial with controller
			echo get_template_part('template-parts/header/navigation', '', ['controller' => $controller]);
			?>
		</div>
	</header>

	<div id="content" class="site-content container mt-0 mb-auto">
