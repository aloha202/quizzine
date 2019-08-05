<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

        <?php include_partial('global/head'); ?>
    </head>
    <body>
        <header>
            <?php include_partial('global/header'); ?>

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


        <?php include_partial('global/footer'); ?>



        <?php include_partial('global/foot'); ?>

    </body>
</html>
