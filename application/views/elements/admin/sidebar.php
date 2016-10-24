<div class="sidebar">
	<div class="text-center">
		<img src="<?php echo static_url('img/logo_admin.png'); ?>">
	</div>
	<ul class="navigation">
		<li>
			<?php
				$class = 'unstyled';
				if($highlighted === 'products') {
					$class .= ' active';
				}
			?>
			<a class="<?php echo $class; ?>" href="<?php echo base_url('admin/products'); ?>">
				<?php echo lang('products'); ?>
			</a>
		</li>
		<li>
			<?php
				$class = 'unstyled';
				if($highlighted === 'categories') {
					$class .= ' active';
				}
			?>
			<a class="<?php echo $class; ?>" href="<?php echo base_url('admin/categories'); ?>">
				<?php echo lang('categories'); ?>
			</a>
		</li>
		<li>
			<?php
				$class = 'unstyled';
				if($highlighted === 'brands') {
					$class .= ' active';
				}
			?>
			<a class="<?php echo $class; ?>" href="<?php echo base_url('admin/brands'); ?>">
				<?php echo lang('brands'); ?>
			</a>
		</li>
		<li>
			<?php
				$class = 'unstyled';
				if($highlighted === 'pages') {
					$class .= ' active';
				}
			?>
			<a class="<?php echo $class; ?>" href="<?php echo base_url('admin/pages'); ?>">
				<?php echo lang('pages'); ?>
			</a>
		</li>
		<li>
			<?php
				$class = 'unstyled';
				if($highlighted === 'banners') {
					$class .= ' active';
				}
			?>
			<a class="<?php echo $class; ?>" href="<?php echo base_url('admin/banners'); ?>">
				<?php echo lang('banners'); ?>
			</a>
		</li>
		<li>
			<?php
				$class = 'unstyled';
				if($highlighted === 'news') {
					$class .= ' active';
				}
			?>
			<a class="<?php echo $class; ?>" href="<?php echo base_url('admin/news_list'); ?>">
				<?php echo lang('news'); ?>
			</a>
		</li>
			<?php
				$class = 'unstyled';
				if($highlighted === 'agents') {
					$class .= ' active';
				}
			?>
			<a class="<?php echo $class; ?>" href="<?php echo base_url('admin/agents'); ?>">
				<?php echo lang('agents'); ?>
			</a>
		</li>
		<li>
			<?php
				$class = 'unstyled';
				if($highlighted === 'user') {
					$class .= ' active';
				}
			?>
			<a class="<?php echo $class; ?>" href="<?php echo base_url('admin/user'); ?>">
				<?php echo lang('user'); ?>
			</a>
		</li>
		<li>
			<a class="unstyled" href="<?php echo base_url('login/logout'); ?>">
				<?php echo lang('logout'); ?>
			</a>
		</li>
	</ul>
</div>