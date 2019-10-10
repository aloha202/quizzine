
    <?php if($user): ?>
        <div class="card user-card">
            <div class="card-content">
            Hello, <?php echo $user->getName(); ?>
            </div>
        </div>
    <?php else: ?>
        <h4>Want to become a member?</h4>
        <div class="card">
            <form action="<?php echo u_url('@create_user'); ?>" method="post" class="p-3 signin-form member-form<?php echo $position; ?>">
                <input type="hidden" name="signin[quizz_take_id]" value="<?php echo $QuizzTake->id; ?>" >
                <input class='member-input' type="text" name="signin[name]" id="signin_username" placeholder="Your name" required="true">
                <input class='member-input' type="text" name="signin[email]" id="signin_email" placeholder="Your email" required="true">
                <button class="btn btn-login form-button">Submit</button>
            </form>
        </div>
        <div class="mt-3 p-3 card-facebook d-flex justify-content-center align-items-center">
            <i class="fab fa-facebook-f"></i>
            <a href="" class="login">Log in with Facebook</a>
        </div>


        <?php slot('auth_js'); ?>
        <script type="text/javascript">


            $(function () {

                $('.signin-form').submit(function () {

                    $.post(this.action, $(this).serialize(), function(resp){

//                        alert(resp);

                        if(resp == "1"){
                            document.location.href = document.location.href;
                        }

                    });

                    return false;

                });

            })



        </script>

        <?php end_slot(); ?>



    <?php endif; ?>

