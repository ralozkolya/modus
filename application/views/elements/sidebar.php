<form id="filter-form" action="<?php echo locale_url('products'); ?>">
	<input class="sidebar-category" type="hidden" name="category" value="0">

	<ul class="sidebar-categories bpg-excelsior-caps">
		<?php $category = $this->input->get('category'); ?>
		<?php foreach($categories as $c): ?>
			<?php
				$category = $this->input->get('category');
				$link_class = "unstyled category-link";
				$fa_class = "fa fa-chevron-down pull-right";

				if($c->id === $category) {
					$link_class .= " active";
					$fa_class .= " active";
				}
			?>
			<li class="sidebar-category">
				<a class="<?php echo $link_class; ?>" href="#" data-category="<?php echo $c->id; ?>">
					<?php echo $c->name; ?>
				</a>
				<?php if(!empty($c->sub)): ?>
					<span class="<?php echo $fa_class; ?>"></span>
					<ul class="subs">
						<?php foreach($c->sub as $s): ?>
							<li>
								<?php
									$sub_class = "unstyled category-link";
									if($s->id === $category) {
										$sub_class .= ' active';
									}
								?>
								<a class="<?php echo $sub_class; ?>" href="#"
									data-category="<?php echo $s->id; ?>">
									<?php echo $s->name; ?>
								</a>
							</li>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>
			</li>
		<?php endforeach; ?>
	</ul>

	<?php if($slug === 'products'): ?>
		<?php if(!empty($brands)): ?>
			<?php $get = $this->input->get('brand'); ?>
			<h4 class="bpg-excelsior-caps"><?php echo lang('brand'); ?></h4>
			<?php foreach($brands as $b): ?>
				<div>
					<?php if(!empty($get)): ?>
						<input
							class="brand-check"
							id="<?php echo 'brand'.$b->id; ?>"
							type="checkbox" name="brand[]"
							value="<?php echo $b->id; ?>"
							<?php foreach($get as $g) {
								if($g == $b->id) {
									echo 'checked';
									break;
								}
							} ?>>
					<?php else: ?>
						<input
							class="brand-check"
							id="<?php echo 'brand'.$b->id; ?>"
							type="checkbox" name="brand[]"
							value="<?php echo $b->id; ?>">
					<?php endif; ?>
					<label class="bpg-excelsior brand-label" for="<?php echo 'brand'.$b->id; ?>"><?php echo $b->name; ?></label>
				</div>
			<?php endforeach; ?>
		<?php endif; ?>
	<?php endif; ?>

	<?php if($slug === 'products'): ?>
		<h4 class="bpg-excelsior-caps"><?php echo lang('price'); ?></h4>
		<div class="clearfix">
			<div class="price-container">
				<?php $from = $this->input->get('from'); ?>
				<?php if(empty($from)): ?>
					<input class="price-input" type="text" name="from" placeholder="<?php echo lang('from'); ?>">
				<?php else: ?>
					<input class="price-input" type="text" name="from" placeholder="<?php echo lang('from'); ?>" value="<?php echo $from; ?>">
				<?php endif; ?>
			</div>
			<div class="price-container">
				<?php $to = $this->input->get('to'); ?>
				<?php if(empty($to)): ?>
					<input class="price-input" type="text" name="to" placeholder="<?php echo lang('to'); ?>">
				<?php else: ?>
					<input class="price-input" type="text" name="to" placeholder="<?php echo lang('to'); ?>" value="<?php echo $to; ?>">
				<?php endif; ?>
			</div>
		</div>
	<?php endif; ?>

</form>