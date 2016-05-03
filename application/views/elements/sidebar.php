<form id="filter-form" action="<?php echo locale_url().'products'; ?>">
	<input type="hidden" name="category" value="0">

	<ul class="sidebar-categories bpg-excelsior-caps">
		<?php $category = $this->input->get('category'); ?>
		<?php foreach($categories as $c): ?>
			<li class="sidebar-category">
				<a class="unstyled category-link" href="#" data-category="<?php echo $c->id; ?>">
					<?php echo $c->name; ?>
				</a>
				<?php if(!empty($c->sub)): ?>
					<?php
						$fa_class = "fa fa-chevron-down pull-right";
						$category = $this->input->get('category');
						if($c->id == $category) {
							$fa_class .= ' expanded';
						}
					?>
					<span class="<?php echo $fa_class; ?>"></span>
					<ul class="subs">
						<?php foreach($c->sub as $s): ?>
							<li>
								<?php
									$sub_class = "unstyled category-link";
									if($s->id == $category) {
										$sub_class .= ' expanded';
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
							id="<?php echo 'brand'.$b->id; ?>"
							type="checkbox" name="brand[]"
							value="<?php echo $b->id; ?>">
					<?php endif; ?>
					<label for="<?php echo 'brand'.$b->id; ?>"><?php echo $b->name; ?></label>
				</div>
			<?php endforeach; ?>
		<?php endif; ?>
	<?php endif; ?>

</form>