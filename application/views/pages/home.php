<!DOCTYPE html>
<html lang="<?php echo get_lang_code($this->config->item('language')); ?>">
<head>
	<?php $this->load->view('elements/head'); ?>

	<!-- LINK -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/unslider/2.0.3/css/unslider.css">
	<link rel="stylesheet" href="<?php echo static_url('css/unslider-dots.css'); ?>">
	<link rel="stylesheet" href="<?php echo static_url('css/product_list.css?v='.V); ?>">
	<link rel="stylesheet" href="<?php echo static_url('css/home.css?v='.V); ?>">

	<!-- SCRIPT -->
	<script src="//stephband.info/jquery.event.move/js/jquery.event.move.js"></script>
	<script src="//stephband.info/jquery.event.swipe/js/jquery.event.swipe.js"></script>
	<script src="https://cdn.jsdelivr.net/isotope/2.2.2/isotope.pkgd.min.js"></script>
	<script src="https://cdn.jsdelivr.net/isotope.packery/1.3.2/packery-mode.pkgd.min.js"></script>
	<script src="//cdn.jsdelivr.net/velocity/1.2.3/velocity.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/unslider/2.0.3/js/unslider-min.js"></script>
	<script src="<?php echo static_url('js/home.js?v='.V); ?>"></script>
	<script src="<?php echo static_url('js/products.js?v='.V); ?>"></script>
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
								<?php $this->load->view('elements/category_grid'); ?>
							</div>
							<div class="row">
								<?php $this->load->view('elements/latest_products'); ?>
							</div>
							<div class="row">
								<?php $this->load->view('elements/pinned_brands'); ?>
							</div>
							<div class="row">
								<?php $this->load->view('elements/news'); ?>
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