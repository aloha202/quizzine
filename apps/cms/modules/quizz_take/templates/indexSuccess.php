<?php use_helper('Date') ?>
<?php include_partial('quizz_take/assets') ?>
<?php $header = __('Results for quizz: ', array(), 'messages') . $Quizz->name; ?>

<div id="sf_admin_container">
    <div class="page-heading animated fadeInDownBig">

  <h1><?php echo $header ?></h1>
    </div>

  

  <div id="sf_admin_header">
    <?php include_partial('quizz_take/list_header', array('pager' => $pager)) ?>
  </div>


   
    <div class='col-md-9'>
  <div class="box-info full">
      <h2><strong><?php echo $header ?></strong></h2>
      <?php include_partial('quizz_take/flashes') ?>

  <div id="sf_admin_content">
    <?php include_partial('quizz_take/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>
    <div class="sf_admin_actions">
      <?php include_partial('quizz_take/list_batch_actions', array('helper' => $helper)) ?>
      <?php include_partial('quizz_take/list_actions', array('helper' => $helper)) ?>
    </div>
  </div>
  </div>
    </div>
    
    
    <div class='col-md-3'>
  <div id="sf_admin_bar" class='box-info full'>
    <?php include_partial('quizz_take/filters', array('form' => $filters, 'configuration' => $configuration)) ?>
  </div>
        </div>
        
    

  <div id="sf_admin_footer">
    <?php include_partial('quizz_take/list_footer', array('pager' => $pager)) ?>
  </div>
</div>
<div class='clearfix'></div>
