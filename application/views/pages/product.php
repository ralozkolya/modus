<!DOCTYPE html>
<html lang="<?php echo get_lang_code($this->config->item('language')); ?>">
<head>
	<?php $this->load->view('elements/head'); ?>
	<link rel="stylesheet" href="<?php echo static_url('css/product_list.css?v='.V); ?>">
	<link rel="stylesheet" href="<?php echo static_url('css/product.css?v='.V); ?>">
	<script src="<?php echo static_url('js/products.js?v='.V); ?>"></script>
</head>
<body>

	<div class="wrapper">

		<?php $this->load->view('elements/header'); ?>

		<div class="content">
			<div class="container bpg-excelsior">
				<div class="row">
					<div class="col-sm-3">
						<div>
							<img
								alt="<?php echo $product->name; ?>"
								src="<?php echo static_url('uploads/products/thumbs/'.$product->image); ?>">
						</div>
						<br>
						<div>
							<img class="thumb"
								alt="<?php echo $product->name; ?>"
								src="<?php echo static_url('uploads/products/thumbs/'.$product->image); ?>">
						</div>
						<div>
							<img class="thumb"
								alt="<?php echo $product->name; ?>"
								src="<?php echo static_url('uploads/products/thumbs/'.$product->image); ?>">
						</div>
						<div>
							<img class="thumb"
								alt="<?php echo $product->name; ?>"
								src="<?php echo static_url('uploads/products/thumbs/'.$product->image); ?>">
						</div>
					</div>
					<div class="col-sm-9">
						<div class="col-xs-12">
							<h3 class="bpg-excelsior-caps"><?php echo $product->name; ?></h3>
							<div class="price"><?php echo $product->price; ?> GEL</div>
							<div>
								<button class="add-to-cart btn btn-default">
									<span class="fa fa-plus"></span>
									<?php echo lang('add_to_cart'); ?>
								</button>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12">
						<h4 class="description-header"><?php echo lang('description'); ?></h4>
						<div><?php echo $product->description; ?></div>
					</div>
				</div>
			</div>
		</div>

		<?php $this->load->view('elements/footer'); ?>

	</div>

</body>
</html>