<?php echo page_header($page); ?>
<div class="content-group">
<?php include_component('profile', 'menu'); ?>
    <div class="card">
        <div class="card-content">
<?php echo page_well($page); ?>
        </div>
    </div>

<div class="form">
    <form method="post" action="" enctype="multipart/form-data" class='form-horizontal'>

            <?php echo $form; ?>


        <div class="control-group">
            <!-- Button -->
            <div class="controls controls-center">
                <button class="btn <?php echo dsg_button2(); ?>"><?=__('Сохранить пароль') ?></button>
            </div>
        </div>
    </form>
</div>
</div>