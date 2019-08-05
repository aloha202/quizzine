<?php if($quizz_question->getAnswers()->count()): ?>
    <ul>
        <?php foreach($quizz_question->getAnswers() as $answer): ?>
            <li><?php echo $answer->getName(); ?></li>
        <?php endforeach; ?>
    </ul>

<?php endif; ?>
