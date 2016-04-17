<!DOCTYPE html>
<html lang="<?php echo get_lang_code($this->config->item('language')); ?>">
<head>
	<?php $this->load->view('elements/head'); ?>
</head>
<body>

	<?php $this->load->view('elements/header'); ?>

	<div class="content">Content</div>

	<?php $this->load->view('elements/footer'); ?>

</body>
</html>