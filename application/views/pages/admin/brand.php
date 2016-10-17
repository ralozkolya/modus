<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('elements/admin/head'); ?>
	<link rel="stylesheet" href="<?php echo static_url('css/admin/brands.css?v='.V); ?>">
</head>
<body>
	<?php $this->load->view('elements/admin/sidebar'); ?>
	<div class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<h1><?php echo $item->ka_name; ?></h1>
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
								['name' => 'id', 'value' => $item->id, 'type' => 'hidden'],
								['name' => 'ka_name', 'value' => $item->ka_name],
								['name' => 'en_name', 'value' => $item->en_name],
								['name' => 'ru_name', 'value' => $item->ru_name],
								['name' => 'image', 'type' => 'file'],
								['name'=> 'pinned', 'value' => $item->pinned, 'type' => 'checkbox'],
								['value' => lang('change'), 'type' => 'submit'],
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
						src="<?php echo static_url("uploads/brands/{$item->image}"); ?>">
				</div>
			</div>	
		</div>
	</div>
</body>
</html>