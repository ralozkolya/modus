<!DOCTYPE html>
<html lang="<?php echo get_lang_code(get_lang()); ?>">
<head>
	<?php $this->load->view('elements/head'); ?>

	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css">
	<link rel="stylesheet" href="<?php echo static_url('css/anythingzoomer.css'); ?>">
	<link rel="stylesheet" href="<?php echo static_url('css/product_list.css?v='.V); ?>">
	<link rel="stylesheet" href="<?php echo static_url('css/product.css?v='.V); ?>">

	<script>
		var lang = {
			add: '<?php echo lang('add_to_cart'); ?>',
			added: '<?php echo lang('added_to_cart'); ?>',
		};
	</script>
	
	<script src="http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script>
	<script src="<?php echo static_url('js/jquery.anythingzoomer.min.js'); ?>"></script>
</head>
<body>

	<div class="wrapper">

		<?php $this->load->view('elements/header'); ?>

		<div class="content">
			<div class="container bpg-excelsior">
				<div class="row">
					<?php if(!empty($gallery)): ?>
						<div class="col-sm-4 fotorama-container">
							<?php $this->load->view('elements/product_images'); ?>
						</div>
					<?php endif; ?>
					<div class="col-sm-8">
						<h3 class="bpg-excelsior-caps"><?php echo $product->name; ?></h3>
						<div class="price"><?php echo $product->price; ?> GEL</div>
						<div>
							<?php if(!empty($product->quantity) && $product->quantity > 0): ?>
								<?php if(empty($in_cart)): ?>
									<a class="btn btn-default add-to-cart"
										href="<?php echo locale_url("add_to_cart/{$product->id}"); ?>">
										<span class="fa fa-plus"></span>
										<span class="lbl"><?php echo lang('add_to_cart'); ?></span>		
									</a>
								<?php else: ?>
									<a class="btn btn-default added-to-cart"
										href="<?php echo locale_url("remove_from_cart/{$product->id}"); ?>">
										<span class="fa fa-check"></span>
										<span class="lbl"><?php echo lang('added_to_cart'); ?></span>		
									</a>
								<?php endif; ?>
							<?php else: ?>
								<br>
								<br>
								<div class="text-danger"><?php echo lang('out_of_stock'); ?></div>
							<?php endif; ?>
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