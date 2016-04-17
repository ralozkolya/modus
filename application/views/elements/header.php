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
	</div><!-- header-main -->

	<div class="slider">
		<ul>
			<li>
				<?php $url = static_url().'uploads/banners/1.png'; ?>
				<div class="slide" style="background-image: url('<?php echo $url; ?>');"></div>
			</li>
			<li>
				<?php $url = static_url().'uploads/banners/1.png'; ?>
				<div class="slide" style="background-image: url('<?php echo $url; ?>');"></div>
			</li>
			<li>
				<?php $url = static_url().'uploads/banners/1.png'; ?>
				<div class="slide" style="background-image: url('<?php echo $url; ?>');"></div>
			</li>
		</ul>
	</div><!-- slider -->
</div><!-- header -->