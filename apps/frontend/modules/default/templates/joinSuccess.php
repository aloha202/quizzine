<?php if(isset($page)): echo page_header($page); endif; ?>

<?php if($page->content): ?>
    <div class="card">
        <div class="card-content">
            <?php echo $page->getRaw('content'); ?>
        </div>
    </div>
<?php endif; ?>

<div class='general_view content-group'>

    <div class="form">
        <form method="post" action="<?php echo url_for('@join'); ?>" enctype="multipart/form-data" class='form-horizontal'>


            <?php echo $form; ?>
            <div class="control-group">
                <!-- Button -->
                <div class="controls">
                    <button class="btn "><?=__('Join now') ?></button>
                </div>

        </form>
    </div>
</div>
