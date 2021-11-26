<div class="rounded p-2 flex flex-col gap-3">
	<span class="text-xl">Commentaires (<?= $post->commentsCount ?>)</span>
	<div class="flex flex-col gap-2">
		<?php foreach ($post->comments as $comment) : ?>
			<div>
				<?php
				$model = get_class($comment);
				?>
				<?php include($_SERVER['DOCUMENT_ROOT'] . $model::card) ?>
			</div>
		<?php endforeach; ?>
	</div>

	<?php if (isLogged()) : ?>
		<form class="flex justify-center items-stretch gap-x-2" action="/comments" method="POST">
			<input type="hidden" name="post_id" value="<?= $post->id ?>">
			<input type="hidden" name="author_id" value="<?= getLogged()->id ?>">
			<textarea class="flex-grow rounded p-3 text-black" placeholder="Votre commentaire..." name="content"></textarea>
			<button class="bg-gray-900 p-3 px-5 rounded">Commenter</button>
		</form>
	<?php endif; ?>
</div>