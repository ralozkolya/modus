<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('elements/admin/head'); ?>
</head>
<body>
	<?php $this->load->view('elements/admin/sidebar'); ?>
	<div class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<h1><?php echo lang('products'); ?></h1>
				</div>
			</div>

			<div class="row">
				<div class="col-xs-12">
					<?php $this->load->view('elements/messages'); ?>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-6">
					<h3><?php echo lang('existing_products'); ?></h3>
					<?php echo admin_table('Product', $items, [
						'name', 'category', 'brand',
					]); ?>
				</div>
				<div class="col-sm-6">
					<h3><?php echo lang('add_product'); ?></h3>
					<form method="post">
						<?php
							$fields = [
								[
									'name' => 'ka_name',
									'value' => set_value('ka_name'),
								],
								[
									'name' => 'en_name',
									'value' => set_value('en_name'),
								],
								[
									'name' => 'ru_name',
									'value' => set_value('ru_name'),
								],
								[
									'name' => 'ka_description',
									'value' => set_value('ka_description'),
									'type' => 'ckeditor',
								],
								[
									'name' => 'en_description',
									'value' => set_value('en_description'),
									'type' => 'ckeditor',
								],
								[
									'name' => 'ru_description',
									'value' => set_value('ru_description'),
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
									'value' => set_value('price'),
									'type' => 'text',
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