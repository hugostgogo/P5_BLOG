<div class="bg-red-500 mt-3 p-3">
	<h1 class="text-3xl text-white">Commentaires</h1>

	<?php foreach($comments as $comment):?>
		<div class="my-2 p-2 rounded bg-gray-900 text-white">
			<div>
				<div>
					<?php echo $comment->author_id ?>
				</div>
				<span><?php echo $comment->created_at ?></span>
			</div>
			<?php echo $comment->content ?>			
		</div>
	<?php endforeach; ?>
	<div class="flex">
		<div id="inputWrapper">
			<textarea id="commentInput"></textarea>
		</div>
		<div id="sendCommentButton" class="rounded bg-gray-900 p-3 text-white cursor-pointer">Commenter</div>
	</div>
	
</div>

<style> 
	#sendCommentButton {
		display: flex;
		justify-content: center;
		align-items: center;
	}

	#inputWrapper {
		flex-grow: 1;
		display: flex;
		padding-right: 10px;
	}

	#commentInput{
		display: block;
		flex-grow: 1;
		padding: 5px;
	}

	#commentInput:focus{
		outline: none;
	}
</style>