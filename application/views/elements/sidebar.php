<ul class="sidebar-categories bpg-excelsior-caps">
	<?php foreach($categories as $c): ?>
		<li class="sidebar-category">
			<?php echo $c->name; ?>
			<?php if(!empty($c->sub)): ?>
				<span class="fa fa-chevron-down pull-right"></span>
				<ul class="subs">
					<?php foreach($c->sub as $s): ?>
						<li><a class="unstyled" href="#"><?php echo $s->name; ?></a></li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
		</li>
	<?php endforeach; ?>
</ul>