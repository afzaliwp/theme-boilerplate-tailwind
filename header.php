<?php
/**
 * The template for displaying the header
 */

use AfzaliWP\Theme\Includes\Helper;
use AfzaliWP\Theme\Includes\Controllers\Header;

$logo          = Helper::get_logo('full', 'w-[61px] h-[27px] md:w-[133px] md:h-[60px]');
$controller    = new Header();
$action_button = $controller->get_action_button();
echo get_template_part( 'template-parts/header/head' );
wp_head();
?>

<body <?php body_class( 'bg-util-bg' ); ?>>
<?php wp_body_open(); ?>

<div class="site min-h-screen flex flex-col">

	<header class="bg-white shadow-sm sticky top-0 z-50">
		<div class="container mx-auto py-3 md:py-4 flex items-center justify-between">
			<div class="flex items-center space-x-2">
				<?php echo $logo; ?>
			</div>

			<button type="button" class="flex md:hidden items-center" id="openSidebar">
				<i class="afz-icon afz-bars text-primary-500 text-[36px]"></i>
			</button>

			<nav class="hidden md:flex">
				<?php
				wp_nav_menu( [
					'theme_location' => 'primary',
					'container'      => false,
					'menu_class'     => 'flex space-x-8 text-black text-base font-normal',
					'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					'link_before'    => '<span class="relative duration-300 hover:text-primary-300">',
					'link_after'     => '</span>',
				] );
				?>
			</nav>

			<div class="hidden md:flex">
				<?php if ( ! empty( $action_button[ 'label' ] ) ) { ?>
					<a
						href="<?php echo esc_url( $action_button[ 'link' ] ); ?>"
						class="bg-primary-500 text-white text-body1-reg px-[70px] py-[12px] rounded-md hover:bg-primary-400 transition"
					>
						<?php echo $action_button[ 'label' ]; ?>
					</a>
				<?php } ?>
			</div>
		</div>
	</header>

	<!-- Sidebar for Mobile -->
	<div id="sidebar" class="fixed inset-0 z-50 bg-white transform -translate-x-full transition-transform duration-300">
		<div class="flex justify-between items-center py-1 px-4 border-b border-white-300">
			<div class="flex items-center space-x-2">
				<?php echo $logo; ?>
			</div>
			<button type="button" class="text-primary-500 text-[36px]" id="closeSidebar">
				<i class="afz-icon afz-cross text-primary-500"></i>
			</button>
		</div>

		<nav class="flex flex-col p-4 space-y-6">
			<?php
			wp_nav_menu( [
				'theme_location' => 'primary',
				'container'      => false,
				'menu_class'     => 'flex flex-col space-y-4 text-black text-base font-normal',
				'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
				'link_before'    => '<span class="relative duration-300 hover:text-primary-300">',
				'link_after'     => '</span>',
			] );
			?>
		</nav>

		<div class="p-4">
			<?php if ( ! empty( $action_button[ 'label' ] ) ) { ?>
				<a
					href="<?php echo esc_url( $action_button[ 'link' ] ); ?>"
					class="w-full block bg-primary-500 text-white text-body1-reg px-[70px] py-[12px] rounded-md hover:bg-primary-400 transition w-full text-center"
				>
					<?php echo $action_button[ 'label' ]; ?>
				</a>
			<?php } ?>
		</div>
	</div>

	<script async defer>
		// Get elements
		const openSidebarBtn = document.getElementById('openSidebar');
		const closeSidebarBtn = document.getElementById('closeSidebar');
		const sidebar = document.getElementById('sidebar');

		// Open sidebar
		openSidebarBtn.addEventListener('click', () => {
			sidebar.classList.remove('-translate-x-full');
			sidebar.classList.add('translate-x-0');
		});

		// Close sidebar
		closeSidebarBtn.addEventListener('click', () => {
			sidebar.classList.remove('translate-x-0');
			sidebar.classList.add('-translate-x-full');
		});
	</script>

	<div id="content" class="site-content my-0">
