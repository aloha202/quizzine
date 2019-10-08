<?php if(!$Quizz->isPassed()): ?>

    <section class="quizz d-flex justify-content-center
        align-items-center my-1">
        <div class="container d-flex justify-content-start flex-column quizz-display-one">
            <h3 id="quizz_header"><?php echo $Quizz->name; ?></h3>
            <form method="post" action="<?php echo url_for('@quizz_answer?username=' . $sf_user->getQuizzHost()->getUsername()); ?>" id="quizz_form" class="mt-3">
                <input type='hidden' name='quizz_id' value='<?php echo $Quizz->id; ?>'>

                <?php foreach ($Quizz->getQuestions() as $Question): ?>
                <div class="card p-3 quizz-question">
                    <label for=""><h4><?php echo $Question->name; ?></h4></label>
                    <?php foreach ($Question->getAnswers() as $Answer): ?>
                        <p><input type="radio" name="question[<?php echo $Question->id; ?>]" value="<?php echo $Answer->id; ?>" class="mr-3"><?php echo $Answer; ?></p>
                    <?php endforeach; ?>

                </div>

                <?php endforeach; ?>

                <button class="btn btn-previous mt-4 form-button" id="quizz_form_previous">Previous</button>
                <button class="btn btn-next mt-4 form-button" id="quizz_form_next">Next</button>
                <button class="btn btn-submit mt-4 form-button" id="quizz_form_submit">Submit</button>
            </form>
        </div>
    </section>


    <script type="text/javascript">

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
            if (currentquizz_num == $('.quizz-display-one .quizz-question').length - 1) {
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

    </script>

<?php else: ?>

    <section class="main-section pt-5">
        <div class="container">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 my-column">
                        <h4><?php echo $Quizz->name; ?></h4>
                        <div class="summary">
                            <p>You have scrored</p>
                            <p class="percentage"><?php echo $Quizz->QuizzTake->percentage; ?>%</p>
                            <p class="percentage_2">(<?php echo $Quizz->QuizzTake->correct_answers_count; ?> out of <?php echo $Quizz->QuizzTake->questions_count; ?>)</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 member-form">
                        <h4>Want to become a member?</h4>
                        <div class="card">
                            <form action="/marinaraduk/auth/signin" method="post" class="p-3 member-form">
                                <input class='member-input' type="text" name="signin[username]" id="signin_username" placeholder="Your name">
                                <input class='member-input' type="password" name="signin[password]" id="signin_password" placeholder="Your password">
                                <button class="btn btn-login form-button">Log in</button>
                            </form>
                        </div>
                        <div class="mt-3 p-3 card-facebook d-flex justify-content-center align-items-center">
                            <i class="fab fa-facebook-f"></i>
                            <a href="" class="login">Log in with Facebook</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="answers my-5">
        <div class="container d-flex justify-content-center flex-column align-items-center">
            <h2>Your answers</h2>
    <?php foreach ($Quizz->getResults() as $Answer): ?>
            <div class="card-result d-flex justify-content-start w-100 p-3 my-3">
                <div class="quizz-result">
                    <h5><?php echo $Answer['question']; ?></h5>
                        <?php if ($Answer['correct_answer'] == $Answer['answer']): ?>
                        <p class="true"><?php echo $Answer['answer']; ?></p>
                    <?php else: ?>
                        <div class="your-answer d-flex">
                            <span>Your answer: &nbsp;</span>
                            <p class="false"><?php echo $Answer['answer']; ?></p>
                        </div>
                        <div class="correct-answer d-flex">
                            <span>Correct answer: &nbsp;</span>
                            <p class="true"><?php echo $Answer['correct_answer']; ?></p>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        <?php endforeach; ?>
            <?php /*
            <div class="card-result d-flex justify-content-start w-100 p-3 my-3">
                <div class="quizz-result">
                    <h5>What is the flag of UK called?</h5>
                    <p class="true">Union Jack</p>
                </div>
            </div>
            <div class="card-result d-flex justify-content-start w-100 p-3 my-3">
                <div class="quizz-result">
                    <h5>When do the Irish celebrate St. Patrick's Day?</h5>
                    <div class="your-answer d-flex">
                        <span>Your answer: &nbsp;</span>
                        <p class="false">5 November</p>
                    </div>
                    <div class="correct-answer d-flex">
                        <span>Your answer: &nbsp;</span>
                        <p class="true">17 March</p>
                    </div>
                </div>
            </div>
 */ ?>
        </div>
        <section class="section member-section mt-5">
            <div class="container">
                <div class="col-12 member-form-down">
                    <h4>Want to become a member?</h4>
                    <div class="card">
                        <form action="/marinaraduk/auth/signin" method="post" class="p-3 member-form-down">
                            <input class='member-input' type="text" name="signin[username]" id="signin_username" placeholder="Your name">
                            <input class='member-input' type="password" name="signin[password]" id="signin_password" placeholder="Your password">
                            <button class="btn btn-login form-button">Log in</button>
                        </form>
                    </div>
                    <div class="mt-3 p-3 card-facebook d-flex justify-content-center align-items-center">
                        <i class="fab fa-facebook-f"></i>
                        <a href="" class="login">Log in with Facebook</a>
                    </div>
                </div>
            </div>
        </section>






    </section>
<?php endif; ?>