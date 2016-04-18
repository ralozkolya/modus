<h3 class="bpg-excelsior-caps"><?php echo lang('new_products'); ?></h3>
<?php if(count($latest_products)): ?>
	<?php foreach($latest_products as $p): ?>
		<?php $image = static_url().'uploads/products/thumbs/'.$p->image; ?>
		<div class="col-sm-3 product">
			<div
				class="image-container"
				style="background-image: url('<?php echo $image; ?>');"></div>
			<div class="name bpg-excelsior-caps"><?php echo $p->name; ?></div>
		</div>
	<?php endforeach; ?>
<?php else: ?>
	<?php echo lang('no_products'); ?>
<?php endif; ?>