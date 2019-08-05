<?php echo page_header(__('My Quizzes')); ?>
    <div class="content-group">
<?php include_component('profile' , 'menu'); ?>

        <?php if ($pager->getNbResults()): ?>

            <div class="items">
                <?php foreach ($pager->getResults() as $QuizzTake): ?>

                    <div class="card">
                        <div class="card-content">


                            <span class="card-title"><?php echo $QuizzTake->getQuizz()->name; ?></span>
                            <p><?php echo __('You scored %percent% on %date%', array(
                                '%percent%' => "<strong class='big-strong'>{$QuizzTake->percentage}%</strong>",
                                    '%date%' => '<span class="date-span">' . project_date($QuizzTake->created_at) . '</span>'
                                )); ?></p>



                        </div>
                        <div class="card-action">
                            <a href="<?php echo url_for('quizz_show', $QuizzTake->getQuizz()); ?>" class="waves-effect waves-light btn <?php echo dsg_button1(); ?>"><?php echo __('Show info'); ?></a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <?php include_pager($pager, u_url('@profile_quizzes')); ?>
        <?php else: ?>
            <p><?php echo __("You haven't taken any quizzes so far"); ?></p>
            <a href="<?php echo u_url('@user_quizzes'); ?>" class="waves-effect waves-light btn <?php echo dsg_button1(); ?>"><?php echo __('Take your first quizz') ?></a>

        <?php endif; ?>


    </div>
