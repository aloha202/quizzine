<a href="<?php echo url_for('quizz/results?id=' . $quizz->getId()); ?>" class="btn btn-default" style="font-size: 10px;"><?php echo __('See results'); ?>
<?php include_component('quizz_take', 'resultsCount', array('quizzId' => $quizz->getId())); ?>
</a>