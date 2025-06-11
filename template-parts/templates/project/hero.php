<div class="py-11 md:py-20 relative">
	<div class="container flex flex-col-reverse md:flex-row items-center justify-between gap-[50px] md:gap-[130px]">
		<div class="w-12/12 md:w-7/12 bg-white-100 p-0 overflow-hidden">
			<?php the_post_thumbnail('large', [ 'class' => 'object-cover w-full h-full' ] ); ?>
		</div>

		<div class="flex flex-col w-12/12 md:w-7/12 gap-6">
			<h1 class="h1 font-bold text-black-500"><?php the_title(); ?></h1>
			<div class="body1 font-normal text-black-500"><?php the_excerpt(); ?></div>
		</div>
	</div>

	<div
		class="z-[-1] absolute top-0 right-0 translate-x-2/4 -translate-y-1/2 w-[870px] h-[870px] rounded-full bg-[#ebbd34] opacity-40 blur-[300px] transform"></div>
</div>