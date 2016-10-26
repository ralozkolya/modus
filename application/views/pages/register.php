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
						<h2 class="bpg-excelsior-caps"><?php echo lang('register'); ?></h2>
						<br>
						<form method="post">
							<?php
								$fields = [
									['name' => 'first_name', 'value' => set_value('first_name')],
									['name' => 'last_name', 'value' => set_value('last_name')],
									['name' => 'email', 'value' => set_value('email'),
										'type' => 'email'],
									['name' => 'company', 'value' => set_value('company')],
									['name' => 'id_number', 'value' => set_value('id_number')],
									['name' => 'billing_address', 'value' => set_value('billing_address')],
									['name' => 'shipping_address', 'value' => set_value('shipping_address')],
									['name' => 'password', 'type' => 'password'],
									['name' => 'password_repeat', 'type' => 'password'],
									['type' => 'submit', 'value' => lang('register')],
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