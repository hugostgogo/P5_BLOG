<div class="p-3">
	<div class="bg-gray-800 rounded text-white p-5">
		<h2 class="text-3xl pb-5"><?php echo $p->title ?></h2>
		<p><?php echo $p->content ?></p>
	</div>
	<hr class="mt-3"/>
	<?php include('app/Components/Comments.php'); ?>
	
</div>

