<?php if(isset($page)): echo page_header($page); endif; ?>
<?php foreach($Quizzes as $Quizz): ?>

    <div class="quizz">
        <div class="card">
            <div class="card-content">
                <span class="card-title"><?php echo $Quizz->name; ?></span>
                <p><?php echo $Quizz->getRaw('description'); ?></p>
            </div>
        </div>

        <a href="<?php echo url_for('quizz_show', $Quizz); ?>" class="waves-effect waves-light btn <?php echo dsg_button1(); ?>"><?php echo $Quizz->isPassed() ? __('Quizz is taken') : __('Take the quizz'); ?></a>
    </div>

<?php endforeach; ?>