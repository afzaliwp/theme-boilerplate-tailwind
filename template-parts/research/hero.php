<?php
$hero = $args[ 'data' ];
?>
<div class="pt-11 pb-30 md:pt-30 md:pb-34 relative">
	<div class="container">
		<div class="flex flex-col items-center justify-center gap-4 md:gap-6 mx-auto max-w-[702px]">
			<h1 class="h1 font-bold text-black-500 text-center"><?php the_title(); ?></h1>
			<div class="body1 font-medium text-black-500 text-center ">
				<?php the_excerpt(); ?>
			</div>
		</div>
	</div>

	<div
		class="z-[-1] absolute top-0 right-0 translate-x-2/4 -translate-y-1/2 w-[870px] h-[870px] rounded-full bg-[#ebbd34] opacity-40 blur-[300px] transform"></div>
</div>