<!DOCTYPE html>
<html lang="<?php echo get_lang_code(get_lang()); ?>">
<head>
	<?php $this->load->view('elements/head'); ?>
</head>
<body>

	<div class="wrapper">

		<?php $this->load->view('elements/header'); ?>

		<div class="content">
			<div class="container bpg-excelsior">
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<h2 class="bpg-excelsior-caps">
							<?php echo lang('password_recovery'); ?>
						</h2>
						<br>
						<form method="post">
							<?php
								$fields = [
									['name' => 'email', 'type' => 'email'],
									['type' => 'submit', 'value' => lang('send')],
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

		<?php $this->load->view('elements/footer'); ?>

	</div>

</body>
</html>