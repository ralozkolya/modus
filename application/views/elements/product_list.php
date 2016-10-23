<h3 class="bpg-excelsior-caps"><?php echo lang('production'); ?></h3>
<?php if(!empty($products)): ?>
	<?php foreach($products as $p): ?>
		<div class="col-sm-4">
			<div class="product">
				<?php
					$image = $p->image;

					if(!$image) {
						$image = static_url('img/no_image.png');
					}

					else {
						$image = static_url('uploads/products/thumbs/'.$image);
					}
				?>
				<div
					class="image-container"
					style="background-image: url('<?php echo $image; ?>');"></div>
				<div class="name bpg-excelsior-caps">
					<div class="price white text-center"><?php echo $p->price; ?>₾</div>
					<?php if(mb_strlen($p->name) <= 17): ?>
						<div class="text-right"><?php echo $p->name; ?></div>
					<?php else: ?>
						<?php $name = mb_substr($p->name, 0, 16).'...'; ?>
						<div class="text-right"><?php echo $name; ?></div>
					<?php endif; ?>
				</div>
				<div class="overlay text-center white">
					<?php
						$url = locale_url('product/'.$p->id.'/'.$p->slug);
					?>
					<a class="unstyled" href="<?php echo $url; ?>">
						<span class="fa fa-search"></span>
					</a>
					<a class="unstyled add-to-cart"
						href="<?php echo locale_url("add_to_cart/{$p->id}"); ?>"
						data-id="<?php echo $p->id; ?>">
						<span class="fa fa-cart-plus"></span>
					</a>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
<?php else: ?>
	<?php echo lang('no_products'); ?>
<?php endif; ?>