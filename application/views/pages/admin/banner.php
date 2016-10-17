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
					<form method="post" enctype="multipart/form-data">
						<?php
							$fields = [
								[
									'name' => 'id',
									'value' => $item->id,
									'type' => 'hidden',
								],
								[
									'name' => 'link',
									'value' => $item->link,
								],
								[
									'name' => 'priority',
									'value' => $item->priority,
								],
								[
									'name' => 'image',
									'type' => 'file',
								],
								[
									'value' => lang('change'),
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
				<div class="col-sm-6">
					<img alt="<?php echo $item->image; ?>"
						src="<?php echo static_url("uploads/banners/{$item->image}"); ?>">
				</div>
			</div>	
		</div>
	</div>
</body>
</html>