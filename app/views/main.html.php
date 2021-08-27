<div class="grid md:grid-cols-2 sm:grid-cols-1 gap-4 p-3">
	<?php
	foreach($posts as $p):
	?>
		<div class="shadow-lg rounded cursor-pointer bg-gray-800 p-5" onclick="changeRoute('<?php echo 'article/' . $p->id ?>')">
			<h1 class="font-bold text-lg mb-3 text-white"><?php echo $p->title ?></h1>
			<span class="text-white text-opacity-75">
				<?php echo $p->content ?>
			</span>
		</div>
	<?php endforeach;?>
	
	

</div>


<script>

	function changeRoute(route, $event) {
		window.location.href = route
	}
</script>
