<!-- <?php if (!empty($posts)): ?>
    <?php foreach ($posts as $post): ?>
        <?= $post->title; ?><br><br>
        <?= $post->text; ?><br><br><hr>
    <?php endforeach; ?>
<?php endif; ?>
 -->

<div class="container">
	<!-- Example row of columns -->
	<div class="row">
		<div class="content">
<!-- <?php if(!empty($category)): ?>
	<?php foreach($category as $cat): ?>
	<div class="container">
	        <h4>Категория &#8194;&#8658;&#8194; <?=$cat->name_category?></h4>
	</div>
	<?php endforeach; ?>
<?php endif; ?> -->
    <?php if(!empty($posts)): ?>
			<?php foreach($posts as $post): ?>

			<small class="pull-right"><?= $post->date ?></small>
			<h2><a href="<?= yii\helpers\Url::to(['post/view', 'id' => $post->id]) ?>"><?= $post->title ?></a></h2>

		<?php if (!empty($post->img)): ?>
			<div class="text-center">
				<img src="uploads/<?= $post->img ?>" alt="" align="middle" width="90%">
			</div>
		<?php endif; ?>

			<p><?= $post->abridgment ?></p>
			<p><a class="btn btn-default" href="<?= yii\helpers\Url::to(['post/view', 'id' => $post->id]) ?>" role="button">Подробнее &raquo;</a></p>
			<hr>

			<?php endforeach; ?>

			<div class="paginate container">
                <?= \yii\widgets\LinkPager::widget(['pagination' => $pagination]) ?>
			</div>
    <?php endif; ?>
		</div>



	</div>
</div>



