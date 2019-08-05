<?php echo page_header($page); ?>
<div class="content-group">
<?php include_component('profile' , 'menu'); ?>
    <div class="card">
    <div class="card-content">
<?php echo page_well($page); ?>
    </div>
    </div>
<form class="form-horizontal" action="" method='post'>

        <?php echo $form; ?>
        <div class="control-group">
            <div class="controls controls-center">        
            <button type="submit" class="btn <?php echo dsg_button2(); ?>"><?=__('Сохранить изменения') ?></button>
            <?php /*<a class="btn btn-danger" href='<?php echo url_for('profile/index'); ?>'><?=__('Отмена') ?></a>            */ ?>
            </div>
        </div>
            <?php //<button type="button" class="btn">Cancel</button> ?>

</form>
</div>
<?php /*echo form_choice_dependency('type', array(
    'fiz' => array('name', 'about'), 'jur' => array('company_name', 'company_vat')
), $form, '2parents', 'fade'); ?>

<?php echo form_toggle_dependency('is_newsletter', array('newsletter_address'), $form, '2parents', 'fade'); */?>