<!DOCTYPE html>
<html lang="<?php echo get_lang_code(get_lang()); ?>">
<head>
	<?php $this->load->view('elements/head'); ?>
	<link rel="stylesheet" href="<?php echo static_url('css/profile.css?v='.V); ?>">
</head>
<body>

	<div class="wrapper">

		<?php $this->load->view('elements/header'); ?>

		<div class="content">
			<div class="container bpg-excelsior">
				<div class="row">
					<div class="col-md-3">
						<?php $this->load->view('elements/profile_sidebar'); ?>
					</div>
					<div class="col-md-9">
						<div class="container-fluid">
							<div class="row">
								<div class="col-xs-12">
									<h2 class="bpg-excelsior-caps"><?php echo lang('profile'); ?></h2>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<h3 class="bpg-excelsior-caps"><?php echo lang('profile'); ?></h3>
									<form method="post">
										<?php
											$fields = [
												['name' => 'first_name', 'value' => $user->first_name],
												['name' => 'last_name', 'value' => $user->last_name],
												['type' => 'submit', 'value' => lang('change')],
											];

											$form = form_fields($fields);

											foreach($form as $f) {
												echo $f;
											}
										?>
									</form>
								</div>
								<div class="col-sm-6">
									<h3 class="bpg-excelsior-caps"><?php echo lang('password'); ?></h3>
									<form method="post"
										action="<?php echo locale_url('profile/change_password'); ?>">
										<?php
											$fields = [
												['name' => 'password', 'type' => 'password'],
												['name' => 'password_repeat', 'type' => 'password'],
												['type' => 'submit', 'value' => lang('change')],
											];

											$form = form_fields($fields);

											foreach($form as $f) {
												echo $f;
											}
										?>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php $this->load->view('elements/footer'); ?>

	</div>

</body>
</html>