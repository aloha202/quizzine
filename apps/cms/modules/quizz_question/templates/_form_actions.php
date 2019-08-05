<div class="sf_admin_actions">
<?php if ($form->isNew()): ?>
      <?php echo $helper->linkToList(array(  'label' => 'Back to Questions',  'params' =>   array(  ),  'class_suffix' => 'list',)) ?>
  <?php echo $helper->linkToSave($form->getObject(), array(  'label' => 'Save and Add Answers',  'params' =>   array(  ),  'class_suffix' => 'save',)) ?>
  <?php echo $helper->linkToSaveAndList($form->getObject(), array(  'label' => 'Save and back to Questions',  'params' =>   array(  ),  'class_suffix' => 'save_and_list',)) ?>
<?php else: ?>
      <?php echo $helper->linkToList(array(  'label' => 'Back to Questions',  'params' =>   array(  ),  'class_suffix' => 'list',)) ?>
  <?php echo $helper->linkToSave($form->getObject(), array(  'label' => 'Save and Add Answers',  'params' =>   array(  ),  'class_suffix' => 'save',)) ?>
  <?php echo $helper->linkToSaveAndList($form->getObject(), array(  'label' => 'Save and back to Questions',  'params' =>   array(  ),  'class_suffix' => 'save_and_list',)) ?>
<?php endif; ?>
</div>
