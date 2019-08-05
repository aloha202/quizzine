<?php echo page_header(__('Register')); ?>
<div class='general_view content-group'>


    <div class="card">
        <div class="card-content">
        By submitting the form you accept our <a href='<?php echo url_for_system_page('user_agreement'); ?>' id='user_agreement_link' target="_blank"><?=__('пользовательского соглашения') ?></a>
        </div>
    </div>
    <div class="form">
        <form method="post" action="<?php echo u_url('@register'); ?>" enctype="multipart/form-data" class='form-horizontal'>


                <?php echo $form; ?>
        <div class="control-group">
            <!-- Button -->
            <div class="controls">
                <button class="btn <?php echo dsg_button2(); ?>"><?=__('Register now') ?></button>
            </div>

        </form>
    </div>    
</div>
<div class='hidden'>

</div>