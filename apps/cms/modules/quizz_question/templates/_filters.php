<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<div class="sf_admin_filter">
    
    <h2><strong><?php echo __('Go to Quizz'); ?></strong></h2>
  <?php if ($form->hasGlobalErrors()): ?>
    <?php echo $form->renderGlobalErrors() ?>
  <?php endif; ?>

  <form action="<?php echo url_for('quizz_question_collection', array('action' => 'filter')) ?>" method="post">
      <?php echo $form->renderHiddenFields() ?>
      
      <div class="form_padding">
        <?php foreach ($configuration->getFormFilterFields($form) as $name => $field): ?>
        <?php if ((isset($form[$name]) && $form[$name]->isHidden()) || (!isset($form[$name]) && $field->isReal())) continue ?>
          <?php include_partial('quizz_question/filters_field', array(
            'name'       => $name,
            'attributes' => $field->getConfig('attributes', array()),
            'label'      => $field->getConfig('label'),
            'help'       => $field->getConfig('help'),
            'form'       => $form,
            'field'      => $field,
            'class'      => 'sf_admin_form_row sf_admin_'.strtolower($field->getType()).' sf_admin_filter_field_'.$name,
          )) ?>
        <?php endforeach; ?>
      </div>

      <div class='sf_admin_actions'>
            <input type="submit" value="<?php echo __('Go', array(), 'sf_admin') ?>" class='btn btn-primary' />
      </div>
  </form>
</div>
