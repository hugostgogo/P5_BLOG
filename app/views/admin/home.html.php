<div class="grid md:grid-cols-1 sm:grid-cols-1 gap-4 p-3" id="postsWrapper">
    <div class="text-white text-3xl">Posts</div>

	<?php
	foreach($posts as $post):
	?>
		<div class="shadow-lg rounded cursor-pointer bg-gray-800 p-5" onclick="changeRoute('<?php echo 'article/' . $post->id ?>')">
			<h1 class="font-bold text-lg mb-3 text-white"><?php echo $post->title ?></h1>
			<span class="text-white text-opacity-75">
				<?php echo $post->content ?>
			</span>
            <div>
            <div>Commentaires (<?php echo count($post->comments); ?>)</div>
            <?php foreach ($post->comments as $comment): ?>
                <div class="text-sm text-gray-400">
                    <?php echo $comment->author_id ?>
                    <?php echo $comment->created_at ?>
                    <?php echo $comment->content ?>
                </div>
            <?php endforeach; ?>
            </div>
		</div>
	<?php endforeach;?>
</div>

<script>

	function changeRoute(route, $event) {
		window.location.href = route
	}
</script>

<style>
#postsWrapper {
    max-height: 40vh;
    overflow: auto;
}
</style>
