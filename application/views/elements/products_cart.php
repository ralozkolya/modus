<div class="row bpg-excelsior-caps">
	<div class="col-xs-12">
		<?php if(!empty($products)): ?>
			<table class="table">
				<?php foreach($products as $p): ?>
					<tr>
						<td class="text-center thumb-container"><img class="thumb" alt="<?php echo $p->name; ?>" src="<?php echo static_url('uploads/products/thumbs/'.$p->image); ?>"></td>
						<td><?php echo $p->name; ?></td>
						<td><?php echo $p->price; ?></td>
						<td><input class="input form-control" type="text" name="amount"></td>
					</tr>
				<?php endforeach; ?>
			</table>
		<?php else: ?>
			<h4><?php echo lang('empty_cart'); ?></h4>
		<?php endif; ?>
	</div>
</div>