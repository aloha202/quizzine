<?php echo page_header('Teachers') ;?>

<?php if ($pager->getNbResults()): ?>

    <div class="items">
        <?php foreach ($pager->getResults() as $user): ?>

            <?php if($user->getUserConfigSettings()->image): ?>

                <div class="card horizontal">
                    <div class="card-image">
                        <img src="<?php echo $user->getUserConfigSettings()->getImageThumbnail(); ?>">
                    </div>
                    <div class="card-stacked">
                        <div class="card-content">
                            <span class="card-title"><?php echo $user; ?></span>
                            <p><?php echo $user->getUserConfigSettings()->card_info; ?></p>
                        </div>
                        <div class="card-action">
                            <a href="<?php echo url_for('@user_home?username=' . $user->getUsername()); ?>"><?php echo __('Go to webpage'); ?></a>
                        </div>
                    </div>
                </div>

            <?php else: ?>
            <div class="card">
                <div class="card-content">


                    <span class="card-title"><?php echo $user; ?></span>
                    <p><?php echo $user->getUserConfigSettings()->card_info; ?></p>


                </div>
                <div class="card-action">
                    <a href="<?php echo url_for('@user_home?username=' . $user->getUsername()); ?>"><?php echo __('Go to webpage'); ?></a>
                </div>
            </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>

    <?php include_pager($pager, url_for('default/teachers')); ?>


<?php endif; ?>