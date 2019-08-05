<h2><?php echo __('By %%whom%% at %%when%%', array(
	'%%whom%%' => $QuizzTake->getWhoBy(),
	'%%when%%' => project_datetime($QuizzTake->created_at)
)); ?></h2>

<?php foreach($Results as $Answer): ?>
<p>
	<?php echo $Answer['question']; ?><br >
	<strong><?php echo $Answer['answer']; ?></strong>
</p>

<?php endforeach; ?>



