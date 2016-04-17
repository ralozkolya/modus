<!DOCTYPE html>
<html lang="<?php echo get_lang_code($this->config->item('language')); ?>">
<head>
	<?php $this->load->view('elements/head'); ?>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/unslider/2.0.3/css/unslider.css">
	<link rel="stylesheet" href="<?php echo static_url().'css/unslider-dots.css'; ?>">
	<link rel="stylesheet" href="<?php echo static_url().'css/home.css'; ?>">
	<script src="//stephband.info/jquery.event.move/js/jquery.event.move.js"></script>
	<script src="//stephband.info/jquery.event.swipe/js/jquery.event.swipe.js"></script>
	<script src="https://cdn.jsdelivr.net/isotope/2.2.2/isotope.pkgd.min.js"></script>
	<script src="https://cdn.jsdelivr.net/isotope.packery/1.3.2/packery-mode.pkgd.min.js"></script>
	<script src="//cdn.jsdelivr.net/velocity/1.2.3/velocity.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/unslider/2.0.3/js/unslider-min.js"></script>
	<script src="<?php echo static_url().'js/home.js'; ?>"></script>
</head>
<body>

	<div class="wrapper">

		<?php $this->load->view('elements/header'); ?>

		<div class="content">
			<div class="container">
				<div class="row">
					<div class="col-md-2 sidebar">Coming soon</div>
					<div class="col-md-10">
						<div class="container-fluid">
							<div class="row">
								<div class="grid">
									<div class="grid-item narrow">asd</div>
									<div class="grid-item wide">asd</div>
									<div class="grid-item double-height">asd</div>
									<div class="grid-item">asd</div>
									<div class="grid-item wide">asd</div>
									<div class="grid-item narrow">asd</div>
									<div class="grid-item">asd</div>
								</div>
							</div>
							<div class="row">
								<h3><?php echo lang('new_products'); ?></h3>
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