<!DOCTYPE html>
<html lang="<?php echo get_lang_code(get_lang()); ?>">
<head>
	<?php $this->load->view('elements/head'); ?>
	
	<script>
		var isLoggedIn = <?php echo $user ? 'true' : 'false'; ?>;
	</script>

	<link rel="stylesheet" href="<?php echo static_url('css/cart.css?v='.V); ?>">
	<script src="<?php echo static_url('js/cart.js?v='.V); ?>"></script>
</head>
<body>

	<div class="wrapper">

		<?php $this->load->view('elements/header'); ?>

		<div class="content">
			<div class="container bpg-excelsior">
				<div class="row">
					<div class="col-xs-12">
						<h3 class="bpg-excelsior-caps"><?php echo lang('cart'); ?></h3>
					</div>
				</div>
				<?php $this->load->view('elements/products_cart'); ?>
			</div>
		</div>

		<div class="cart-overlay overlay">
			<div class="white close-button">
				<span class="fa fa-times"></span>
			</div>
			<form id="invoice-form" class="white bpg-excelsior-caps" method="post">
				<table class="table invoice-table">
					<tr>
						<td><?php echo lang('name'); ?></td>
						<td>
							<input name="name"
								value="<?php echo $user->first_name.' '.$user->last_name; ?>">
						</td>
					</tr>
					<tr>
						<td><?php echo lang('email'); ?></td>
						<td>
							<input name="email"
								value="<?php echo $user->email; ?>">
						</td>
					</tr>
					<tr>
						<td><?php echo lang('company'); ?></td>
						<td>
							<input name="company"
								value="<?php echo $user->company; ?>">
						</td>
					</tr>
					<tr>
						<td><?php echo lang('id_number'); ?></td>
						<td>
							<input name="id_number"
								value="<?php echo $user->id_number; ?>">
						</td>
					</tr>
					<tr>
						<td><?php echo lang('billing_address'); ?></td>
						<td>
							<input name="billing_address"
								value="<?php echo $user->billing_address; ?>">
						</td>
					</tr>
					<tr>
						<td><?php echo lang('shipping_address'); ?></td>
						<td>
							<input name="shipping_address"
								value="<?php echo $user->shipping_address; ?>">
						</td>
					</tr>
					<tr>
						<td><?php echo lang('agent'); ?></td>
						<td>
							<select name="agent">
								<?php foreach($agents as $a): ?>
									<option value="<?php echo $a->id; ?>"><?php echo $a->name; ?></option>
								<?php endforeach; ?>
							</select>
						</td>
					</tr>
				</table>
				<div class="text-center">
					<input class="send-button" type="submit" value="<?php echo lang('send'); ?>">
				</div>
			</form>
		</div>

		<?php $this->load->view('elements/footer'); ?>

	</div>
</body>
</html>