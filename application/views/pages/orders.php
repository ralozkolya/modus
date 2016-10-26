<!DOCTYPE html>
<html lang="<?php echo get_lang_code(get_lang()); ?>">
<head>
	<?php $this->load->view('elements/head'); ?>
	<link rel="stylesheet" href="<?php echo static_url('css/profile.css?v='.V); ?>">
</head>
<body>

	<div class="wrapper">

		<?php $this->load->view('elements/header'); ?>

		<div class="content">
			<div class="container bpg-excelsior">
				<div class="row">
					<div class="col-md-3">
						<?php $this->load->view('elements/profile_sidebar'); ?>
					</div>
					<div class="col-md-9">
						<div class="container-fluid">
							<div class="row">
								<div class="col-xs-12">
									<h2 class="bpg-excelsior-caps"><?php echo lang('orders'); ?></h2>
								</div>
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