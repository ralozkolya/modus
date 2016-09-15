<div class="row bpg-excelsior-caps">
	<?php if(!empty($products)): ?>
		<div class="col-xs-12">
			<table class="table table-">
				<?php foreach($products as $p): ?>
					<tr>
						<td class="text-center thumb-container"><img class="thumb" alt="<?php echo $p->name; ?>" src="<?php echo static_url('uploads/products/thumbs/'.$p->image); ?>"></td>
						<td><?php echo $p->name; ?></td>
						<td><?php echo $p->price; ?> GEL</td>
						<td><input class="input form-control text-right" type="text" name="amount" value="1"></td>
						<td><a data-id="<?php echo $p->id; ?>"
							class="btn btn-danger glyphicon glyphicon-remove"></a></td>
					</tr>
				<?php endforeach; ?>
			</table>
		</div>
		<div class="col-xs-12">
			<div class="pull-right btn btn-success disabled"><?php echo lang('continue'); ?></div>
		</div>
	<?php else: ?>
		<div class="col-xs-12">
			<h4><?php echo lang('empty_cart'); ?></h4>
		</div>
	<?php endif; ?>
</div>