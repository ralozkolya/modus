<h3 class="bpg-excelsior-caps"><?php echo lang('news'); ?></h3>
<?php if(!empty($news)): ?>
	<?php foreach($news as $n): ?>
		<?php $image = static_url('uploads/news/thumbs/'.$n->image); ?>
		<div class="col-sm-3">
			<a class="unstyled" href="#">
				<div class="news">
					<div
						class="image-container"
						style="background-image: url('<?php echo $image; ?>');"></div>
					<div class="title bpg-excelsior-caps">
						<?php if(mb_strlen($n->title) <= 17): ?>
							<div><?php echo $n->title; ?></div>
						<?php else: ?>
							<?php $title = mb_substr($n->title, 0, 16).'...'; ?>
							<div><?php echo $title; ?></div>
						<?php endif; ?>
					</div>
					<div class="description bpg-excelsior white"><?php echo $n->description; ?></div>
				</div>
			</a>
		</div>
	<?php endforeach; ?>
<?php else: ?>
	<?php echo lang('no_news'); ?>
<?php endif; ?>