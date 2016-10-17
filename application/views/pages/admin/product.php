<!DOCTYPE html>
<html>
<head>
	<script>
		var config = window.config || {};
		config.type = 'products';
	</script>
	<?php $this->load->view('elements/admin/head'); ?>
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
					<form method="post">
						<?php
							$fields = [
								[
									'name' => 'id',
									'value' => $item->id,
									'type' => 'hidden',
								],
								[
									'name' => 'ka_name',
									'value' => $item->ka_name,
								],
								[
									'name' => 'en_name',
									'value' => $item->en_name,
								],
								[
									'name' => 'ru_name',
									'value' => $item->ru_name,
								],
								[
									'name' => 'ka_description',
									'value' => $item->ka_description,
									'type' => 'ckeditor',
								],
								[
									'name' => 'en_description',
									'value' => $item->en_description,
									'type' => 'ckeditor',
								],
								[
									'name' => 'ru_description',
									'value' => $item->ru_description,
									'type' => 'ckeditor',
								],
								[
									'name' => 'category',
									'value' => $categories,
									'type' => 'select',
								],
								[
									'name' => 'brand',
									'value' => $brands,
									'type' => 'select',
								],
								[
									'name' => 'stock',
									'value' => $stock,
									'type' => 'chosen',
								],
								[
									'name' => 'price',
									'value' => $item->price,
									'type' => 'text',
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
					<h3><?php echo lang('gallery'); ?></h3>
					<form action="<?php echo base_url('admin/add_images/Product_images'); ?>"
						method="post"
						enctype="multipart/form-data">
						<?php
							$fields = [
								[
									'name' => 'item',
									'value' => $item->id,
									'type' => 'hidden',
								],
								[
									'name' => 'images',
									'type' => 'files',
								],
								[
									'value' => lang('upload'),
									'type' => 'submit',
								],
							];

							$form = form_fields($fields);

							foreach($form as $f) {
								echo $f;
							}
						?>
					</form>
					<br>
					<?php foreach($gallery as $g): ?>
						<div class="thumb">
							<img alt="<?php echo $g->image; ?>" src="<?php echo static_url('uploads/products/thumbs/'.$g->image); ?>">
							<a href="<?php echo base_url('admin/delete/Product_images/'.$g->id); ?>" class="unstyled delete">
								<span class="glyphicon glyphicon-remove"></span>
							</a>
						</div>
					<?php endforeach; ?>
				</div>
			</div>	
		</div>
	</div>
</body>
</html>