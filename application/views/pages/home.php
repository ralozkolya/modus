<!DOCTYPE html>
<html lang="<?php echo get_lang_code($this->config->item('language')); ?>">
<head>
	<?php $this->load->view('elements/head'); ?>
	<link rel="stylesheet" href="<?php echo static_url().'css/unslider.css'; ?>">
	<link rel="stylesheet" href="<?php echo static_url().'css/unslider-dots.css'; ?>">
	<link rel="stylesheet" href="<?php echo static_url().'css/home.css'; ?>">
	<script src="//stephband.info/jquery.event.move/js/jquery.event.move.js"></script>
	<script src="//stephband.info/jquery.event.swipe/js/jquery.event.swipe.js"></script>
	<script src="//cdn.jsdelivr.net/velocity/1.2.3/velocity.min.js"></script>
	<script src="<?php echo static_url().'js/unslider-min.js'; ?>"></script>
</head>
<body>

	<?php $this->load->view('elements/header'); ?>

	<div class="content">Content</div>

	<?php $this->load->view('elements/footer'); ?>

</body>
</html>