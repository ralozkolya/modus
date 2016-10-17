<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('elements/admin/head'); ?>
	<link rel="stylesheet" href="<?php echo static_url('css/admin/banners.css?v='.V); ?>">
</head>
<body>
	<?php $this->load->view('elements/admin/sidebar'); ?>
	<div class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<h1><?php echo lang('banners'); ?></h1>
				</div>
			</div>

			<div class="row">
				<div class="col-xs-12">
					<?php $this->load->view('elements/messages'); ?>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-6">
					<h3><?php echo lang('existing_banners'); ?></h3>
					<?php echo admin_table('Banner', $items, [
						'image',
					], static_url('uploads/banners/')); ?>
				</div>
				<div class="col-sm-6">
					<h3><?php echo lang('add_banner'); ?></h3>
					<form method="post" enctype="multipart/form-data">
						<?php
							$fields = [
								[
									'name' => 'link',
									'value' => set_value('link'),
								],
								[
									'name' => 'priority',
									'value' => set_value('priority'),
								],
								[
									'name' => 'image',
									'type' => 'file',
								],
								[
									'value' => lang('add'),
									'type' => 'submit',
								],
							];

							$form = form_fields($fields);

							foreach($form as $f) {
								echo $f;
							}
						?>
					</form>
				</div>
			</div>	
		</div>
	</div>
</body>
</html>