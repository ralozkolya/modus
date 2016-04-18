<div class="grid">
	<?php foreach($pinned_categories as $i => $c): ?>
		<?php
			$class = 'grid-item';
			if($i % 5 == 0) $class .= ' wide';
			elseif($i % 3 == 1) $class .= ' narrow';
			elseif($i == 2) $class .= ' double-height';

			$bg = static_url().'uploads/categories/thumbs/'.$c->image;
		?>
		<div class="<?php echo $class; ?>" style="background-image: url('<?php echo $bg; ?>');">
			<div class="overlay text-center bpg-excelsior-caps white">
				<div class="fa fa-cart-plus"></div>
				<div><?php echo $c->name; ?></div>
			</div>
		</div>
	<?php endforeach; ?>
</div>