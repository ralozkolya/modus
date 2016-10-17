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
					<h1><?php echo $item->ka_title; ?></h1>
				</div>
			</div>

			<div class="row">
				<div class="col-xs-12">
					<?php $this->load->view('elements/messages'); ?>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-6">
					<h3><?php echo lang('add_news'); ?></h3>
					<form method="post" enctype="multipart/form-data">
						<?php
							$fields = [
								['name' => 'id', 'type' => 'hidden', 'value' => $item->id],
								['name' => 'ka_title', 'value' => $item->ka_title],
								['name' => 'en_title', 'value' => $item->en_title],
								['name' => 'ru_title', 'value' => $item->ru_title],
								['name' => 'ka_body', 'type' => 'ckeditor', 'value' => $item->ka_body],
								['name' => 'en_body', 'type' => 'ckeditor', 'value' => $item->en_body],
								['name' => 'ru_body', 'type' => 'ckeditor', 'value' => $item->ru_body],
								['name' => 'image', 'type' => 'file'],
								['type' => 'submit', 'value' => lang('change')],
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
						src="<?php echo static_url("uploads/news/{$item->image}"); ?>">
				</div>
			</div>	
		</div>
	</div>
</body>
</html>