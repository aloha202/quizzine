

<div class="content-group">
		<div class="card">

			<div class="card-content">
				<span class="cart-title">
					<?= __('Войти с помощью:') ?>					
				</span>

                <a href='<?php echo url_for('@oauth?type=facebook'); ?>' target='_blank'><img src='/images/oauth_facebook.png' alt='' /></a>
				<a href='<?php echo url_for('@oauth?type=twitter'); ?>' target='_blank'><img src='/images/oauth_twitter.png' alt='' /></a>
				<?php /*
				  <a href='<?php echo url_for('@oauth?type=vkontakte'); ?>' target='_blank'><img src='/images/oauth_vkontakte.png' alt='' /></a>
				  <a href='<?php echo url_for('@oauth?type=google'); ?>' target='_blank'><img src='/images/oauth_google.png' alt='' /></a>
				  <a href='<?php echo url_for('@oauth?type=yandex'); ?>' target='_blank'><img src='/images/oauth_yandex.png' alt='' /></a>
				  <a href='<?php echo url_for('@oauth?type=twitter'); ?>' target='_blank'><img src='/images/oauth_twitter.png' alt='' /></a>
				  <a href='<?php echo url_for('@oauth?type=mailru'); ?>' target='_blank'><img src='/images/oauth_mailru.png' alt='' /></a>
				 * */ ?>					
			</div>

		</div>

		<div class="card grey lighten-4">
			<div style="padding: 20px;">
				<form  action='<?php echo u_url('@signin'); ?>' method="POST">
					<?php echo $form; ?>





					<div class="control-group">
						<!-- Button -->
						<div class="controls">
							<button class="btn btn-success <?php echo dsg_button2(); ?>"><?= __('Войти') ?></button>
							<a href='<?php echo url_for('auth/forgotPassword'); ?>'><?= __('Забыли пароль?') ?></a>
							<a href='<?php echo u_url('@register'); ?>'><?= __('Регистрация') ?></a>
						</div>
					</div>
				</form>
			</div>
		</div>
</div>