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
				<?php echo lang('login'); ?>
				<span class="fa fa-shopping-cart"></span>
				<?php echo lang('cart'); ?>
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
		</div>
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