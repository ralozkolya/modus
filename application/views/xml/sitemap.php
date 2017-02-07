<?php echo '<?xml version="1.0" encoding="UTF-8" ?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
	<url>
		<loc><?php echo base_url(); ?></loc> 
		<priority>1.0</priority>
	</url>
	<url>
		<loc><?php echo base_url('ka-GE'); ?></loc> 
		<priority>0.5</priority>
	</url>
	<url>
		<loc><?php echo base_url('en-US'); ?></loc> 
		<priority>0.5</priority>
	</url>
	<url>
		<loc><?php echo base_url('ru-RU'); ?></loc> 
		<priority>0.5</priority>
	</url>

	<?php foreach($navigation as $n): ?>
		<url>
			<loc><?php echo base_url("ka-GE/{$n->slug}"); ?></loc>
			<priority>0.5</priority>
		</url>
		<url>
			<loc><?php echo base_url("en-US/{$n->slug}"); ?></loc>
			<priority>0.5</priority>
		</url>
		<url>
			<loc><?php echo base_url("ru-RU/{$n->slug}"); ?></loc>
			<priority>0.5</priority>
		</url>
	<?php endforeach; ?>

	<?php foreach($products as $p): ?>
		<url>
			<loc><?php echo base_url('ka-GE/product/'.$p->id.'/'.$p->slug); ?></loc>
			<priority>0.5</priority>
		</url>
		<url>
			<loc><?php echo base_url('en-US/product/'.$p->id.'/'.$p->slug); ?></loc>
			<priority>0.5</priority>
		</url>
		<url>
			<loc><?php echo base_url('ru-RU/product/'.$p->id.'/'.$p->slug); ?></loc>
			<priority>0.5</priority>
		</url>
	<?php endforeach; ?>

	<?php foreach($news as $n): ?>
		<url>
			<loc><?php echo base_url('ka-GE/post/'.$n->id.'/'.$n->slug); ?></loc>
			<priority>0.5</priority>
		</url>
		<url>
			<loc><?php echo base_url('en-US/post/'.$n->id.'/'.$n->slug); ?></loc>
			<priority>0.5</priority>
		</url>
		<url>
			<loc><?php echo base_url('ru-RU/post/'.$n->id.'/'.$n->slug); ?></loc>
			<priority>0.5</priority>
		</url>
	<?php endforeach; ?>

</urlset>