<?php

use App\Models\User;
?>

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

	<?php if (User::isLogged()) : ?>
		<div class="flex justify-center items-stretch gap-x-2">
			<textarea class="flex-grow rounded p-3 text-black" placeholder="Votre commentaire..." id="commentText"></textarea>
			<button class="bg-gray-900 p-3 px-5 rounded" onclick="sendComment(<?= $post->id ?>, <?= User::getLogged()->id ?>)">Commenter</button>
		</div>
	<?php endif; ?>
</div>