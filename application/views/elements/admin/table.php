<?php if(!empty($items)): ?>
	<table class="table table-striped">
		<?php foreach($items as $i): ?>
			<tr>
				<?php foreach($columns as $c): ?>
					<td>
						<?php echo $i->$c; ?>
					</td>
				<?php endforeach; ?>
				<td class="glyph-container">
					<a href="<?php echo base_url("admin/{$type}/{$i->id}"); ?>">
						<span class="glyphicon glyphicon-edit"></span>
					</a>
				</td>
				<td class="glyph-container">
					<a href="<?php echo base_url("admin/delete/{$type}/{$i->id}"); ?>"
						class="unstyled delete">
						<span class="glyphicon glyphicon-remove"></span>	
					</a>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>
<?php else: ?>
	<h4><?php echo lang('nothing_found'); ?></h4>	
<?php endif; ?>