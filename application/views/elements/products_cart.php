<div class="row bpg-excelsior-caps">
	<?php if(!empty($products)): ?>
		<div class="col-xs-12">
			<table class="table table-">
				<?php $total = 0; foreach($products as $p): ?>
					<tr>
						<td class="text-center thumb-container"><img class="thumb" alt="<?php echo $p->name; ?>" src="<?php echo static_url('uploads/products/thumbs/'.$p->image); ?>"></td>
						<td><?php echo $p->name; ?></td>
						<td><?php echo $p->price; $total += $p->price; ?> GEL</td>
						<td><input class="input form-control text-right" type="text" name="amount" value="1"></td>
						<td><a data-id="<?php echo $p->id; ?>"
							class="glyphicon glyphicon-remove remove"></a></td>
					</tr>
				<?php endforeach; ?>
			</table>
		</div>
		<div class="col-xs-12">
			<div class="pull-right">
				<a href="#" class="order-button">
					<?php echo lang('order'); ?>
				</a>
				<span class="total">
					<?php echo lang('total').': '.number_format($total, 2); ?> GEL
				</span>
			</div>
		</div>
	<?php else: ?>
		<div class="col-xs-12">
			<h4><?php echo lang('empty_cart'); ?></h4>
		</div>
	<?php endif; ?>
</div>