<!DOCTYPE html>
<html lang="<?php echo get_lang_code($this->config->item('language')); ?>">
<head>
	<?php $this->load->view('elements/head'); ?>
	<link rel="stylesheet" href="<?php echo static_url().'css/product_list.css?v='.V; ?>">
	<link rel="stylesheet" href="<?php echo static_url().'css/products.css?v='.V; ?>">
	<script src="<?php echo static_url().'js/products.js?v='.V; ?>"></script>
</head>
<body>

	<div class="wrapper">

		<?php $this->load->view('elements/header'); ?>

		<div class="content">
			<div class="container">
				<div class="row">
					<div class="col-md-3 sidebar">
						<?php $this->load->view('elements/sidebar'); ?>
					</div>
					<div class="col-md-9">
						<div class="container-fluid">
							<div class="row">
								<?php $this->load->view('elements/product_list'); ?>
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