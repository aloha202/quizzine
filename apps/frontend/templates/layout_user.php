<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

    <?php include_partial('global/head'); ?>

    <style type="text/css">
        <?php if(u_design('quizz_text_color')): ?>
        [type="radio"]:checked + label:before {
            border-radius: 50%;
            border: 2px solid <?php echo u_design('quizz_text_color'); ?>; }

        [type="radio"]:checked + label:after {
            border-radius: 50%;
            border: 2px solid <?php echo u_design('quizz_text_color'); ?>;
            background-color: <?php echo u_design('quizz_text_color'); ?>;
            z-index: 0;
            -webkit-transform: scale(.5);
            -moz-transform: scale(.5);
            -ms-transform: scale(.5);
            -o-transform: scale(.5);
            transform: scale(.5); }
        <?php endif; ?>

        <?php if(u_design('text_color')): ?>
            .content-group{
                color: <?php echo u_design('text_color'); ?>
            }
        <?php endif; ?>
        <?php if(u_design('link_color')): ?>
        .content-group a{
            color: <?php echo u_design('link_color'); ?>
        }
        <?php endif; ?>
    </style>

    <script type="text/javascript">

        $(function(){

        });
    </script>
</head>
<body>
<header>
    <?php include_partial('global/header_user'); ?>

</header>


<main>
    <div class="container">
        <div class="section">

            <!--   Icon Section   -->
            <div class="row">

                <?php include_partial('global/flashes'); ?>

                <?php echo $sf_content; ?>
            </div>

        </div>
        <br><br>

        <div class="section">

        </div>
    </div>
</main>


    <?php include_partial('global/footer_user'); ?>



<?php include_partial('global/foot'); ?>

</body>
</html>
