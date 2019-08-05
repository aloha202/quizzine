<?php echo page_header(__('Your personal area')); ?>


<div class="row">
	<div class="col s12 m6">
<?php include_partial('auth/form', array('form' => $form, 'page' => $page)); ?>
	</div>
</div>