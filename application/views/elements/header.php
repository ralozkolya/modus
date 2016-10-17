<div class="header">
	<div class="header-top clearfix hidden-xs white">
		<a href="#" class="unstyled pull-left">
			<span class="fa fa-facebook"></span>
		</a>
		<span class="pull-right">
			<span class="fa fa-map-marker"></span>
			<span class="bpg-excelsior-caps"><?php echo lang('address_1'); ?></span>
			<span class="fa fa-map-marker"></span>
			<span class="bpg-excelsior-caps"><?php echo lang('address_2'); ?></span>
		</span>
	</div><!-- header-top -->

	<?php
		$header_main_class = 'header-main clearfix';

		if($highlighted !== 'home') {
			$header_main_class .= ' with-background';
		}
	?>
	<div class="<?php echo $header_main_class; ?>">
		<a href="<?php echo locale_url(); ?>">
			<img class="logo" alt="Logo" src="<?php echo static_url('img/logo.png'); ?>">
		</a>
		<div class="first-row bpg-excelsior">
			<?php if($user): ?>
				<?php echo htmlspecialchars($user['username']); ?>&nbsp;&nbsp;&nbsp;
				<a class="unstyled" href="<?php echo locale_url('logout'); ?>"><?php echo lang('logout'); ?>
			<?php else: ?>
				<a class="unstyled" href="#" id="login-link">
					<span class="fa fa-user"></span>
					<?php echo lang('login'); ?>
				</a>
			<?php endif; ?>

			<a class="unstyled cart" href="<?php echo locale_url('cart'); ?>">
				<span class="fa fa-shopping-cart"></span>
				<?php
					if($cart_size) {
						echo lang('cart')." ({$cart_size})";
					}

					else {
						echo lang('cart');
					}
				?>
			</a>

			<div class="langs">
				<a
					class="unstyled <?php if(get_lang() === GE) echo 'active'; ?>"
					href="<?php echo lang_link(GE); ?>">GE</a>
				<a
					class="unstyled <?php if(get_lang() === EN) echo 'active'; ?>"
					href="<?php echo lang_link(EN); ?>">EN</a>
				<a
					class="unstyled <?php if(get_lang() === RU) echo 'active'; ?>"
					href="<?php echo lang_link(RU); ?>">RU</a>
			</div>
		</div><!-- first-row -->
		<ul class="second-row navigation bpg-excelsior-caps">
			<?php foreach($navigation as $n): ?>
				<li>
					<a href="<?php echo locale_url($n->slug); ?>"
						<?php if($n->slug === $highlighted) echo 'class="active"'; ?>>
						<?php echo $n->title; ?>
					</a>
				</li>
			<?php endforeach; ?>
		</ul><!-- second-row -->
		<form class="third-row bpg-excelsior-caps hidden-xs"
			action="<?php echo locale_url('products'); ?>">
			<input class="header-category" type="hidden" name="category" value="">
			<div class="input-group">
				<div class="input-group-btn">
					<button type="button"
						class="btn btn-default dropdown-toggle bpg-excelsior-caps"
						data-toggle="dropdown">
						<span class="search-toggle"><?php echo lang('category'); ?></span>
						<span class="caret"></span>
					</button>
					<ul class="dropdown-menu">
						<li>
							<a href="#"
								class="category-dropdown"
								data-id="0">
								<?php echo lang('category'); ?>
							</a>
						</li>
						<li role="separator" class="divider"></li>
						<?php foreach($top_categories as $t): ?>
							<li>
								<a href="#"
									class="category-dropdown"
									data-id="<?php echo $t->id; ?>">
									<?php echo $t->name; ?>
								</a>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
				
				<?php if(!empty($this->input->get('search'))): ?>
					<input class="form-control" type="text" name="search" value="<?php echo htmlspecialchars($this->input->get('search')); ?>">
				<?php else: ?>
					<input class="form-control" type="text" name="search">
				<?php endif; ?>

				<span class="input-group-btn">
					<button class="btn btn-warning search-button" type="submit">
						<span class="fa fa-search"></span>
					</button>
				</span>
			</div>
		</form><!-- third-row -->
	</div><!-- header-main -->
	<?php if($highlighted === 'home'): ?>
		<div class="slider hidden-xs">
			<ul>
				<?php if(!empty($banners)): ?>
					<?php foreach($banners as $b): ?>
						<li>
							<?php $url = static_url("uploads/banners/{$b->image}"); ?>
							<div class="slide" style="background-image: url('<?php echo $url; ?>');"></div>
						</li>
					<?php endforeach; ?>
				<?php else: ?>
						<li>
							<?php $url = static_url("img/banner.png?v=".V); ?>
							<div class="slide" style="background-image: url('<?php echo $url; ?>');"></div>
						</li>
				<?php endif; ?>
			</ul>
		</div><!-- slider -->
	<?php endif; ?>
</div><!-- header -->

<?php $this->load->view('elements/messages'); ?>