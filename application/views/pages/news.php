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
				<?php foreach($news as $n): ?>
					<div class="row news">
						<?php
							$url = locale_url('post/'.$n->id.'/'.$n->slug);
						?>
						<a class="unstyled" href="<?php echo $url; ?>">
							<div class="col-sm-4">
								<img class="thumb"
									alt="<?php echo $n->title; ?>"
									src="<?php echo static_url('uploads/news/thumbs/'.$n->image); ?>">
							</div>
							<div class="col-sm-8">
								<h3 class="bpg-excelsior-caps"><?php echo $n->title; ?></h3>
								<div><?php echo $n->description; ?></div>
							</div>
						</a>
					</div>
				<?php endforeach; ?>
				<div class="row">
					<div class="col-xs-12 text-center">
						<?php echo $this->pagination->create_links(); ?>
					</div>
				</div>
			</div>
		</div>

		<?php $this->load->view('elements/footer'); ?>

	</div>

</body>
</html>