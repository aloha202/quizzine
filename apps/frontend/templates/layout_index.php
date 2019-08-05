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
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <h1 class="header center orange-text"><?php echo __('Добро пожаловать'); ?></h1>
      <div class="row center">
        <h5 class="header col s12 light"><?php echo __('Вилькомна на обновленную версию нашего сайта!'); ?></h5>
      </div>
      <div class="row center">
        <a href="<?php echo url_for('auth/signin'); ?>" id="download-button" class="btn-large waves-effect waves-light orange"><?php echo __('Поехали!'); ?></a>
      </div>
      <br><br>

    </div>
  </div>
    </main>



      <?php include_partial('global/footer'); ?>



    <?php include_partial('global/foot'); ?>

  </body>
</html>
