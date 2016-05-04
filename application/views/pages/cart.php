<!DOCTYPE html>
<html lang="<?php echo get_lang_code($this->config->item('language')); ?>">
<head>
	<?php $this->load->view('elements/head'); ?>

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

		<?php $this->load->view('elements/footer'); ?>

	</div>

</body>
</html>