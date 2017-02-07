<div class="footer text-center">
	Copyright © <?php echo date('Y'); ?> All Right Reserved
</div>
<div class="login-overlay page-overlay">
	<form id="login-form" class="white text-center" method="post"
		action="<?php echo locale_url('login'); ?>">
		<div>
			<span class="fa fa-user"></span>
			<input class="input bpg-excelsior" type="text" name="email" id="email"
				placeholder="<?php echo lang('email'); ?>">
		</div>
		<div>
			<span class="fa fa-unlock-alt"></span>
			<input class="input bpg-excelsior" type="password" name="password" id="password"
				placeholder="<?php echo lang('password'); ?>">
		</div>
		<div>
			<input class="submit-button bpg-excelsior" type="submit" value="<?php echo lang('login'); ?>">
		</div>
		<div>
			<a class="bpg-excelsior orange"
				href="<?php echo locale_url('recover_password'); ?>">
				<?php echo lang('password_recovery'); ?>
			</a>
		</div>
		<div>
			<a class="bpg-excelsior orange"
				href="<?php echo locale_url('register'); ?>">
				<?php echo lang('register'); ?>
			</a>
		</div>
	</form>
	<div class="white close-button">
		<span class="fa fa-times"></span>
	</div>
</div>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-46276983-7', 'auto');
  ga('send', 'pageview');

</script>