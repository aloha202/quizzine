<ul class="right hide-on-med-and-down">
    <li <?php if ($sf_context->getModuleName() == 'quizz' && $sf_context->getActionName() == 'home'): ?>class='active'<?php endif; ?>><a href='<?php echo u_url('@user_home'); ?>' class="<?php echo get_text_class('top_text_color'); ?>"><?= __('My home') ?></a></li>
    <li <?php if ($sf_context->getModuleName() == 'quizz' && $sf_context->getActionName() != 'home'): ?>class='active'<?php endif; ?>><a href='<?php echo u_url('@user_quizzes'); ?>' class="<?php echo get_text_class('top_text_color'); ?>"><?= __('Take a quizz') ?></a></li>
    <?php if (!$sf_user->isAuthenticated()): ?>
        <li <?php if ($sf_context->getModuleName() == 'auth'): ?>class='active'<?php endif; ?>><a href='<?php echo u_url('@signin'); ?>'  class="<?php echo get_text_class('top_text_color'); ?>"><?= __('Вход') ?></a></li>
    <?php else: ?>
        <li class='<?php if ($sf_context->getModuleName() == 'profile'): ?>active<?php endif; ?>'><a href='#' class="dropdown-button <?php echo get_text_class('top_text_color'); ?>" data-activates="dropdown1"><?php echo $sf_user->getGuardUser(); ?><i class="material-icons right">arrow_drop_down</i></a>

            <ul class='dropdown-content' id="dropdown1">
                <li><a href='<?php echo u_url('@profile'); ?>' class="<?php echo get_text_class('top_text2_color'); ?>"><?= __('Профиль') ?></a></li>
                <li><a href='<?php echo u_url('@profile_quizzes'); ?>' class="<?php echo get_text_class('top_text2_color'); ?>"><?= __('My Quizzes') ?></a></li>
                <li><a href='<?php echo u_url('@signout'); ?>' class="<?php echo get_text_class('top_text2_color'); ?>"><?= __('Выход') ?></a></li>
                <?php if ($sf_user->getGuardUser()->getIsSuperAdmin()): ?>
                    <li class='divider'></li>
                    <li><a href='/cms.php' target='_blank' class="<?php echo get_text_class('top_text2_color'); ?>"><?= __('Админка') ?></a></li>
                <?php endif; ?>
            </ul>
        </li>
    <?php endif; ?>

</ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
<ul class="side-nav" id="nav-mobile">
    <li <?php if ($sf_context->getModuleName() == 'quizz' && $sf_context->getActionName() == 'home'): ?>class='active'<?php endif; ?>><a href='<?php echo u_url('@user_home'); ?>' class="<?php echo get_text_class('top_text_color'); ?>"><?= __('My home') ?></a></li>
    <li <?php if ($sf_context->getModuleName() == 'quizz' && $sf_context->getActionName() != 'home'): ?>class='active'<?php endif; ?>><a href='<?php echo u_url('@user_quizzes'); ?>' class="<?php echo get_text_class('top_text_color'); ?>"><?= __('Take a quizz') ?></a></li>
    <?php if (!$sf_user->isAuthenticated()): ?>
        <li <?php if ($sf_context->getModuleName() == 'auth'): ?>class='active'<?php endif; ?>><a href='<?php echo u_url('@signin'); ?>' class="<?php echo get_text_class('top_text_color'); ?>"><?= __('Вход') ?></a></li>
    <?php else: ?>
        <li class='<?php if ($sf_context->getModuleName() == 'profile'): ?>active<?php endif; ?>'><a href='#' class="dropdown-button <?php echo get_text_class('top_text_color'); ?>" data-activates="dropdown2"><?php echo $sf_user->getGuardUser(); ?><i class="material-icons right">arrow_drop_down</i></a>

            <ul class='dropdown-content' id="dropdown2">
                <li><a href='<?php echo u_url('@profile'); ?>' class="<?php echo get_text_class('top_text2_color'); ?>"><?= __('Профиль') ?></a></li>
                <li><a href='<?php echo u_url('@signout'); ?>' class="<?php echo get_text_class('top_text2_color'); ?>"><?= __('Выход') ?></a></li>
                <?php if ($sf_user->getGuardUser()->getIsSuperAdmin()): ?>
                    <li class='divider'></li>
                    <li><a href='/cms.php' target='_blank' class="<?php echo get_text_class('top_text2_color'); ?>"><?= __('Админка') ?></a></li>
                <?php endif; ?>
            </ul>
        </li>
    <?php endif; ?>
</ul>




