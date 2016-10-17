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
					<h1><?php echo lang('news'); ?></h1>
				</div>
			</div>

			<div class="row">
				<div class="col-xs-12">
					<?php $this->load->view('elements/messages'); ?>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-6">
					<h3><?php echo lang('existing_news'); ?></h3>
					<?php echo admin_table('News', $items, [
						'title',
					], static_url('uploads/brands/')); ?>
				</div>
				<div class="col-sm-6">
					<h3><?php echo lang('add_news'); ?></h3>
					<form method="post" enctype="multipart/form-data">
						<?php
							$fields = [
								['name' => 'ka_title', 'value' => set_value('ka_title')],
								['name' => 'en_title', 'value' => set_value('en_title')],
								['name' => 'ru_title', 'value' => set_value('ru_title')],
								['name' => 'ka_body', 'type' => 'ckeditor', 'value' => set_value('ka_body')],
								['name' => 'en_body', 'type' => 'ckeditor', 'value' => set_value('en_body')],
								['name' => 'ru_body', 'type' => 'ckeditor', 'value' => set_value('ru_body')],
								['name' => 'image', 'type' => 'file'],
								['type' => 'submit', 'value' => lang('add')],
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