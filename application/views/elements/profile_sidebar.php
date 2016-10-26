<ul class="profile-navigation bpg-excelsior-caps">
	<?php if($highlighted === 'profile'): ?>
		<li class="active">
	<?php else: ?>
		<li>
	<?php endif; ?>
		<a class="unstyled" href="<?php echo locale_url('profile'); ?>">
			<?php echo lang('parameters'); ?>
		</a>
	</li>
	<?php if($highlighted === 'orders'): ?>
		<li class="active">
	<?php else: ?>
		<li>
	<?php endif; ?>
		<a class="unstyled" href="<?php echo locale_url('orders'); ?>">
			<?php echo lang('orders'); ?>
		</a>
	</li>
</ul>