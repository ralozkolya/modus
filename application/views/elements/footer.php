<div class="footer text-center">
	Copyright © <?php echo date('Y'); ?> All Right Reserved
</div>
<div class="login-overlay container">
	<div class="row">
		<div class="col-sm-4 col-sm-offset-4">
			<form id="login-form" class="white text-center" method="post">
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
					<a class="bpg-excelsior password-recovery" href="#"><?php echo lang('password_recovery'); ?></a>
				</div>
			</form>
		</div>
	</div>
	<div class="white close-button">
		<span class="fa fa-times"></span>
	</div>
</div>