<h4 class="<?php echo get_text_class('header2_color', 'yellow-text text-darken-4'); ?>"><?php echo __('Your answers'); ?></h4>
<?php foreach ($Quizz->getResults() as $Answer): ?>
    <div class="card">
        <div class="quizz-result">
            <span class="question-name"><?php echo $Answer['question']; ?></span><br>
            <?php if (!empty($Answer['correct_answer'])): ?>
                <?php if ($Answer['correct_answer'] == $Answer['answer']): ?>
                    <strong style="color: green;"><?php echo $Answer['answer']; ?></strong>
                <?php else: ?>
                    <i><?php echo __('Your answer:'); ?></i>
                    <strong style="color: red;"><?php echo $Answer['answer']; ?></strong><br>
                    <i><?php echo __('Correct answer:'); ?></i>
                    <strong style="color: green;"><?php echo $Answer['correct_answer']; ?></strong><br>
                <?php endif; ?>
            <?php else: ?>
                <strong><?php echo $Answer['answer']; ?></strong>
            <?php endif; ?>
            <?php if ($Answer['question_comment']): ?>
                <div class="comment"><?php echo sfOutputEscaper::unescape($Answer['question_comment']); ?></div>
            <?php endif; ?>
        </div>
    </div>
<?php endforeach; ?>
<?php if($Quizz->QuizzTake->questions_count): ?>
<div class="summary">
    <?php echo __('You have scrored '); ?><strong><?php echo $Quizz->QuizzTake->percentage; ?>%</strong>
    (<?php echo $Quizz->QuizzTake->correct_answers_count; ?> <?php echo __('out of'); ?> <?php echo $Quizz->QuizzTake->questions_count; ?>)
</div>
<?php endif; ?>
