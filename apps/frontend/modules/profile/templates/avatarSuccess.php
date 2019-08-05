<?php echo page_header($page); ?>
<div class="content-group">
<?php include_component('profile', 'menu'); ?>


<div class="form">
    <form method="post" action="" enctype="multipart/form-data" class='form-horizontal' id='profile_form_avatar'>
        <div class="card">
            <div class="card-content">
<?php if($profile->getImage()): ?>
<p class='well'><?=__('Вы можете выбрать зону, которая будет отображаться на ваших аватарках. Кликните по одному из изображений справа') ?></p>
<?php else: ?>
<p class='well'><?=__('Выберите картинку из загрузите ее') ?></p>
<?php endif; ?>
            </div>
        </div>
        <table cellpadding="0" cellspacing="0">
            <?php echo $form; ?>
        </table>
        <br />
        <?php if($profile->getImage()): ?>
        <input type="submit" value="<?=__('Сохранить') ?>" class="btn <?php echo dsg_button2(); ?>" />
        <a href='<?php echo url_for('profile/avatarDelete'); ?>' onclick='return window.confirm("<?=__('Вы уверены?') ?>")' class='btn <?php echo dsg_button2(); ?>'><?=__('Удалить фотографию') ?></a>
        <?php else: ?>
        <input type="submit" value="<?=__('Загрузить фотографию') ?>" class="btn <?php echo dsg_button2(); ?>" />
        <?php endif; ?>
    </form>
</div>
</div>
<script type='text/javascript'>

    $(function(){
        var phImageBuilder = null;
        if(window.phImageBuilder){
            window.phImageBuilder.onSelectionStart(function(self){
               phImageBuilder = self;
            });
            window.phImageBuilder.onSelectionSave(function(self){
               phImageBuilder = null;
            });            
            window.phImageBuilder.onSelectionCancel(function(self){
               phImageBuilder = null;
            });            

            $('#profile_form_avatar').submit(function(){
                if(phImageBuilder){
                    phImageBuilder.saveSelection();                    
                    return false;
                }
                
            });
        }

    });

</script>