<footer class="page-footer <?php echo get_bg_class('bottom_background_color'); ?>">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
            <h5 <?php echo dsg_bottom_text(); ?>><?php echo u_settings('logo_text'); ?></h5>
          <p <?php echo dsg_bottom_text(2); ?>><?php echo u_settings('footer_info'); ?></p>


        </div>
        <div class="col l3 s12">
          <h5 <?php echo dsg_bottom_text(); ?>><?php echo __('My news'); ?></h5>
          <ul>
              <li <?php echo dsg_bottom_text(); ?>><?php echo __('Coming soon'); ?></li>
          </ul>
        </div>
        <div class="col l3 s12">
          <h5 <?php echo dsg_bottom_text(); ?>><?php echo __('Contact me'); ?></h5>
          <ul>
              <?php if(u_settings('email')): ?>
            <li>
                <a <?php echo dsg_bottom_text(); ?> href="mailto: <?php echo u_settings('email'); ?>">
                    <i class="fa fa-envelope"></i>
                    <?php echo u_settings('email'); ?>
                </a></li>
              <?php endif; ?>
              <?php if(u_settings('phone')): ?>
            <li>
                <a <?php echo dsg_bottom_text(); ?> href="#">
                    <i class="fa fa-phone"></i>
                    <?php echo u_settings('phone'); ?>
                </a></li>
              <?php endif; ?>

            <li>
                <?php if(u_settings('skype')): ?>
                <a <?php echo dsg_bottom_text(); ?> href="skype: <?php echo u_settings('skype'); ?>">
                    <img class="my-icon my-icon-skype" src="/images/icon/skype.png" >
                </a>
                <?php endif; ?>
                <?php if(u_settings('facebook')): ?>
                    <a <?php echo dsg_bottom_text(); ?> href="<?php echo u_settings('facebook'); ?>">
                        <img class="my-icon my-icon-facebook" src="/images/icon/facebook.png" >
                    </a>
                <?php endif; ?>
                <?php if(u_settings('youtube')): ?>
                    <a <?php echo dsg_bottom_text(); ?> href="<?php echo u_settings('youtube'); ?>">
                        <img class="my-icon my-icon-youtube" src="/images/icon/youtube.png" >
                    </a>
                <?php endif; ?>
            </li>

          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      <?php echo __('Powered by'); ?> <a <?php echo dsg_bottom_text(3); ?> href="<?php echo url_for('@homepage'); ?>">Quizzine</a>
      </div>
    </div>
</footer>