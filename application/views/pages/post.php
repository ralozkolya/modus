<!DOCTYPE html>
<html lang="<?php echo get_lang_code(get_lang()); ?>">
<head>
	<?php $this->load->view('elements/head'); ?>
	<link rel="stylesheet" href="<?php echo static_url('css/news.css?v='.V); ?>">
</head>
<body>

	<div class="wrapper">

		<?php $this->load->view('elements/header'); ?>

		<div class="content">
			<div class="container bpg-excelsior">
				<div class="row">
					<div class="col-xs-12">
						<h3 class="bpg-excelsior-caps"><?php echo $post->title; ?></h3>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<img alt="<?php echo $post->title; ?>" src="<?php echo static_url('uploads/news/'.$post->image); ?>">
					</div>
					<div class="col-sm-8">
						<?php echo $post->body; ?>
					</div>
				</div>
			</div>
		</div>

		<?php $this->load->view('elements/footer'); ?>

	</div>

</body>
</html>