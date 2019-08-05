<?php if (isset($page)): echo page_header($Quizz->name); endif; ?>
<h4 class="<?php echo get_text_class('header2_color', 'yellow-text text-darken-4'); ?>"><?php echo $Quizz->name; ?></h4>
<?php if ($Quizz->description): ?>
    <div class="card <?php echo get_text_class('quizz_text_color'); ?>">
        <div class="card-content"><?php echo $Quizz->getRaw('description'); ?>
        </div>
    </div>
<?php endif; ?>

<div class="warning" style="display: none;">

</div>

<div class="row">
    <?php if (!$Quizz->isPassed()): ?>


        <div class="quizz quizz-display-<?php echo $Quizz->display; ?>">
            <form method='post' action='<?php echo url_for('@quizz_answer?username=' . $sf_user->getQuizzHost()->getUsername()); ?>' id="quizz_form">
                <input type='hidden' name='quizz_id' value='<?php echo $Quizz->id; ?>'>
                <?php foreach ($Quizz->getQuestions() as $Question): ?>
                    <div class="card">
                        <div class="quizz-question-list">
                            <div class="quizz-question quizz-question-<?php echo $Question->answer_mode; ?>">
                                <?php if ($Question->answer_mode == 'other'): ?>
                                    <div class='question question-other'>
                                        <label class="<?php echo get_text_class('quizz_text_color'); ?>">
                                            <?php echo $Question->name; ?>
                                            <input type='text' name='question[<?php echo $Question->id; ?>]' value=''
                                                   class='teal-text validate'>
                                        </label>
                                    </div>
                                <?php else: ?>
                                    <div class='question'>
                                        <label class="<?php echo get_text_class('quizz_text_color'); ?>">
                                            <?php echo $Question->name; ?>
                                        </label>
                                        <?php foreach ($Question->getAnswers() as $Answer): ?>
                                            <p>

                                                <input type="radio" name="question[<?php echo $Question->id; ?>]"
                                                       value="<?php echo $Answer->id; ?>"
                                                       id="answer_<?php echo $Answer->id; ?>" >
                                                <label for="answer_<?php echo $Answer->id; ?>" class="<?php echo get_text_class('quizz_text_color'); ?>"><?php echo $Answer; ?></label>

                                            </p>
                                        <?php endforeach; ?>

                                    </div>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <?php if ($Quizz->display == 'one'): ?>
                    <a href='#' class='btn btn-large waves-effect waves-light <?php echo dsg_button2(); ?>'
                       id="quizz_form_previous"><?php echo __('Previous'); ?></a>
                    <a href='#' class='btn btn-large waves-effect waves-light <?php echo dsg_button2(); ?>'
                       id="quizz_form_next"><?php echo __('Next'); ?></a>
                <?php endif; ?>
                <a href='#' class='btn btn-large waves-effect waves-light <?php echo dsg_button2(); ?>'
                   id="quizz_form_submit"><?php echo __('Submit'); ?></a>

            </form>
        </div>

        <script type="text/javascript">

            $('#quizz_form_submit').click(function () {
                $('#quizz_form').submit();
                return false;
            });
            window.QUIZZ_FORM_SUBMITTED = false;
            $('#quizz_form').submit(function () {
                if(window.QUIZZ_FORM_SUBMITTED){
                    return false;
                }
                var invalid = false;
                $(this).find('.validate').each(function () {
                    if (!$(this).val()) {
                        invalid = true;
                        $(this).addClass('invalid');
                    } else {
                        $(this).removeClass('invalid');
                    }
                });

                $('.question').each(function () {
                    if (!$(this).find('input[type=radio]:checked').size()) {
                        invalid = true;
                    }
                });
                if (invalid) {
                    showWarning('Please answer all the questions!')
                    return false;
                } else {
                    hideWarning();
                    showLoading($(this).find('.quizz-question-list'));
                    window.QUIZZ_FORM_SUBMITTED = true;
                }
            });

            if ($('.quizz-display-one').size()) {
                var currentquizz_num = 0;

                function show_quizz_one() {
                    $('.quizz-display-one .quizz-question').each(function (index) {
                        if (index != currentquizz_num) {
                            $(this).hide();
                        } else {
                            $(this).show();
                        }
                    });
                    $('#quizz_form_submit').hide();
                    $('#quizz_form_next').show();
                    $('#quizz_form_previous').show();
                    if (currentquizz_num == 0) {
                        $('#quizz_form_previous').hide();
                    }
                    if (currentquizz_num == $('.quizz-display-one .quizz-question').size() - 1) {
                        $('#quizz_form_submit').show();
                        $('#quizz_form_next').hide();
                    }

                }

                $('#quizz_form_next').click(function () {
                    currentquizz_num++;
                    show_quizz_one();
                    return false;
                });
                $('#quizz_form_previous').click(function () {
                    currentquizz_num--;
                    show_quizz_one();
                    return false;
                });
                show_quizz_one();

            }

            function showWarning(message) {
                $('.warning').html(message);
                $('.warning').slideDown();
            }

            function hideWarning(message) {
                $('.warning').slideUp();
            }

            function showLoading($element) {
                $element.find('*').css('visibility', 'hidden');
                $element.css('background-image', 'url(/images/system/system_loading.gif)');
                $element.css('background-position', 'center');
                $element.css('background-repeat', 'no-repeat');
            }

        </script>
    <?php else: ?>
        <div class="col s12 m6">
            <p>
                <?php echo __('This quizz has been taken! Please take another one'); ?>
            </p>

            <?php include_partial('quizz/results', array('Quizz' => $Quizz)); ?>
        </div>

        <?php if (!$sf_user->isAuthenticated()): ?>
        <div class="col s12 m6">
            <h4 class="<?php echo get_text_class('header2_color', 'yellow-text text-darken-4'); ?>"><?php echo __('Want to become a member?'); ?></h4>
            <?php include_component('auth', 'form'); ?>
        </div>

    <?php endif; ?>

    <?php endif; ?>
</div>