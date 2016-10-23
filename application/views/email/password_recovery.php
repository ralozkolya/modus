<h2><?php echo lang('password_recovery'); ?></h2>
<p><?php echo lang('to_recover_password'); ?></p>
<p>
	<?php $url = locale_url("check_token/{$recovery_token}"); ?>
	<a href="<?php echo $url; ?>"><?php echo $url; ?></a>
</p>