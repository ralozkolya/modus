<ul class="sidebar-categories bpg-excelsior-caps">
	<?php foreach($categories as $c): ?>
		<li>
			<?php echo $c->name; ?>
			<span class="fa fa-chevron-down pull-right"></span>
		</li>
	<?php endforeach; ?>
</ul>