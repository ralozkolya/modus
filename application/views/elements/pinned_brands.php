<h3 class="bpg-excelsior-caps"><?php echo lang('brands'); ?></h3>
<?php if(!empty($brands)): ?>
	<?php foreach($brands as $b): ?>
		<?php $image = static_url().'uploads/brands/thumbs/'.$b->image; ?>
		<div class="col-sm-3">
			<div class="brand" style="background-image: url('<?php echo $image; ?>');"></div>
		</div>
	<?php endforeach; ?>
<?php else: ?>
	<?php echo lang('no_brands'); ?>
<?php endif; ?>