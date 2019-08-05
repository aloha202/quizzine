  <nav class="<?php echo get_bg_class('top_background_color'); ?>" role="navigation" >
    <div class="nav-wrapper container">

        <a id="logo-container" href="<?php echo u_url('@user_home'); ?>" class="brand-logo <?php echo get_text_class('top_text_color'); ?>"><?php echo u_settings('logo_text'); ?>
            <?php if(u_avatar('tiny')): ?>
                <img src="<?php echo u_avatar('tiny'); ?>" class="user-avatar" >
            <?php endif; ?>
        </a>
        <?php include_partial('global/menu_user'); ?>
    </div>
  </nav>