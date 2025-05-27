<form role="search" method="get" class="search-form flex items-center space-x-2" action="<?php echo home_url( '/' ); ?>">
	<label class="sr-only">
		<?php echo _x( 'Search for:', 'label' ) ?>
	</label>
	<input
		type="search"
		class="search-field flex-grow border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
		placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder' ) ?>"
		value="<?php echo get_search_query() ?>"
		name="s"
		title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>"
		aria-label="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>"
	/>
	<input
		type="submit"
		class="search-submit bg-blue-600 text-white font-semibold rounded-md px-4 py-2 hover:bg-blue-700 transition-colors cursor-pointer"
		value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>"
	/>
</form>
