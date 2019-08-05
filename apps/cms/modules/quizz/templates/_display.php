<?php
    $types = Quizz::getDisplayTypes();
    echo $types[$quizz->getDisplay()];
?>