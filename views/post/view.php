
<div class="container">
	<!-- Example row of columns -->
	<div class="row">

			<div class="content">
				<h2><?= $post->title ?></h2>

				<?php if (!empty($post->img)): ?>

					<div class="text-center">
						<img src="uploads/<?= $post->img ?>" alt="" align="middle" width="90%">
					</div>

				<?php endif; ?>

				<p><?= $post->text ?></p>
			</div>
			<hr>

			<!-- <?php //foreach($comments as $comment): ?> -->

			<div class="content">

			<!-- <h2><?= $comment->user_name ?></h2>
			<p><?= $comment->created_at ?></p>
			<p><?= $comment->comm ?></p> -->
			<!-- <a class="btn btn-default" href="#" role="button">Ответить</a> -->

			<!-- <?php //if ((Auth::check()) && ((Auth::user()->email) == $comment->user_email	|| (Auth::user()->role) == 'admin')): ?> -->

			<form action="" method="post">
				<button type="submit" class="btn btn-danger">Удалить</button>
			</form>

		<hr>
	</div>

<!-- <?php //endforeach; ?> -->

<!-- 		<form action="" class="content" method="post" role="form">
			<h3>Добавить комментарий</h3>

			<input type="hidden" name="post_id" value="">
			<textarea name="comm" id="comm" rows="4" class="form-control" placeholder="Введите свой комментарий" required></textarea>

			<?php //if(Auth::check()): ?>
			<input type="hidden" name="user_email" value="  ">
			<input type="hidden"  name="user_name" value="  ">
			<?php //else: ?>
			<input class="form-control" name="user_email" type="email" placeholder="E-mail (обязательно)" required>
			<input class="form-control" name="user_name" type="text" placeholder="Имя (обязательно)" required>
			<?php //endif; ?>

			<button class="btn btn-default" type="submit">Отправить комментарий</button>
		</form>

	<?php //endif; ?> -->

</div>

<!-- <?php //if (Auth::check() && (Auth::user()->role == 'admin')): ?> -->

<form class="form-horizontal" role="form" method="POST" action="" enctype="multipart/form-data">
	
	<div class="form-group">
		<label for="file" class="col-md-4 control-label">Загрузить файл</label>
		<div class="col-md-6">
			<input name="id" type="hidden" class="form-control" value="<?=$post->id?>">
			<input id="file" type="file" class="form-control" name="file" required>
			<button type="submit" class="btn btn-info">Загрузить</button>
		</div>
	</form>
	<hr>
	<form class="form-horizontal" role="form" method="POST" action="" enctype="multipart/form-data">
		
		<div class="form-group">
			<label for="file" class="col-md-4 control-label">Удалить изображение</label>
			<div class="col-md-6">
				<input name="id" type="hidden" class="form-control" value="<?=$post->id?>">
				<button type="submit" class="btn btn-info">Удалить</button>
			</div>
		</form>
		<!-- <?php //endif; ?> -->
	</div>



