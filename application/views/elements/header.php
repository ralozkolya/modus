<div class="header">
	<div class="header-top clearfix hidden-xs">
		<a href="#" class="unstyled">
			<span class="fa fa-facebook"></span>
		</a>
		<span class="pull-right">
			<span class="fa fa-map-marker"></span>
			<span class="bpg-excelsior-caps"><?php echo $address_1; ?></span>
			<span class="fa fa-map-marker"></span>
			<span class="bpg-excelsior-caps"><?php echo $address_2; ?></span>
		</span>
	</div><!-- header-top -->

	<div class="header-main clearfix">
		<a href="<?php echo locale_url(); ?>">
			<img class="logo" alt="Logo" src="<?php echo static_url().'img/logo.png'; ?>">
		</a>
		<div class="first-row bpg-excelsior">
			<?php if($user): ?>
				<?php var_dump($user); ?>
			<?php else: ?>
				<span class="fa fa-user"></span>
				<a class="unstyled" href="#">
					<?php echo lang('login'); ?>
				</a>
				<span class="fa fa-shopping-cart"></span>
				<a class="unstyled" href="#">
					<?php echo lang('cart'); ?>
				</a>
			<?php endif; ?>
			<span class="langs">
				<a
					class="unstyled <?php if(get_lang() === GE) echo 'active'; ?>"
					href="<?php echo lang_link(GE); ?>">GE</a>
				<a
					class="unstyled <?php if(get_lang() === EN) echo 'active'; ?>"
					href="<?php echo lang_link(EN); ?>">EN</a>
				<a
					class="unstyled <?php if(get_lang() === RU) echo 'active'; ?>"
					href="<?php echo lang_link(RU); ?>">RU</a>
			</span>
		</div><!-- first-row -->
		<ul class="second-row navigation bpg-excelsior-caps">
			<?php foreach($navigation as $n): ?>
				<li>
					<a href="#" <?php if($n->slug = $slug) echo 'class="active"'; ?>>
						<?php echo $n->title; ?>
					</a>
				</li>
			<?php endforeach; ?>
		</ul><!-- second-row -->
		<form class="third-row bpg-excelsior-caps" action="#">
			<div class="input-group">
				<span class="input-group-btn">
					<button type="button"
						class="btn btn-default dropdown-toggle bpg-excelsior-caps"
						data-toggle="dropdown">
						<span class="search-toggle"><?php echo lang('category'); ?></span>
						<span class="caret"></span>
					</button>
					<ul class="dropdown-menu">
						<li><a href="#">Lorem Ipsum</a></li>
						<li><a href="#">Lorem Ipsum</a></li>
						<li><a href="#">Lorem Ipsum</a></li>
					</ul>
				</span>

				<input class="form-control" type="text">

				<span class="input-group-btn">
					<button class="btn btn-warning search-button" type="submit">
						<span class="fa fa-search"></span>
					</button>
				</span>
			</div>
		</form><!-- third-row -->
	</div><!-- header-main -->

	<div class="slider">
		<ul>
			<li>
				<?php $url = static_url().'uploads/banners/2.png'; ?>
				<div class="slide" style="background-image: url('<?php echo $url; ?>');"></div>
			</li>
			<li>
				<?php $url = static_url().'uploads/banners/1.png'; ?>
				<div class="slide" style="background-image: url('<?php echo $url; ?>');"></div>
			</li>
		</ul>
	</div><!-- slider -->
</div><!-- header -->