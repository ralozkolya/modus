<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('elements/admin/head'); ?>
	<link rel="stylesheet" href="<?php echo static_url('css/admin/categories.css?v='.V); ?>">
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
								['name' => 'id', 'type' => 'hidden', 'value' => $item->id],
								['name' => 'ka_name', 'value' => $item->ka_name],
								['name' => 'en_name', 'value' => $item->en_name],
								['name' => 'ru_name', 'value' => $item->ru_name],
								['name' => 'parent', 'type' => 'select', 'value' => $parents],
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
						src="<?php echo static_url("uploads/categories/{$item->image}"); ?>">
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<h3><?php echo lang('existing_products'); ?></h3>
					<?php echo admin_table('Product', $products, [
						'name', 'category', 'brand',
					]); ?>
				</div>
				<?php if(!$item->parent) { ?>
					<div class="col-sm-6">
						<h3><?php echo lang('existing_subcategories'); ?></h3>
						<?php echo admin_table('Category', $subcategories, [
							'name', 
						], static_url('uploads/categories/')); ?>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</body>
</html>