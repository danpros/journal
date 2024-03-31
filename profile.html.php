<?php if (!defined('HTMLY')) die('HTMLy'); ?>
<section class="gh-pagehead">
	<header class="gh-pagehead-content">
		<h1 class="gh-author-name gh-pagehead-title"><?php echo $name;?></h1>
		<div class="gh-author-bio gh-pagehead-description"><?php echo $about;?></div>
		<div class="gh-author-meta">
			<span class="gh-author-location">📍 The Internet</span>
			<a class="gh-author-website" href="<?php echo site_url();?>" target="_blank" rel="noopener"><?php echo site_url();?></a>
		</div>
	</header>
</section>

<div class="gh-feed">
	<?php foreach ($posts as $p): ?>
	<article class="gh-card post">
    
		<?php if (!empty($p->link)) { ?>
		<header class="gh-card-header">
		<a class="gh-card-link" href="<?php echo $p->link; ?>" target="_blank"><h2 class="gh-card-title"><?php echo $p->title; ?> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
		<line x1="5" y1="12" x2="19" y2="12"></line>
		<polyline points="12 5 19 12 12 19"></polyline>
		</svg></h2> </a>
		</header>
		<?php } else { ?>
		<header class="gh-card-header">
		<a class="gh-card-link" href="<?php echo $p->url; ?>"><h2 class="gh-card-title"><?php echo $p->title; ?></h2></a>
		</header>
		<?php } ?>

		<?php if (!empty($p->image)):?>
		<div class="gh-article-image">
			<img style="width:100%;" title="<?php echo $p->title; ?>" alt="<?php echo $p->title; ?>" class="attachment-post-thumbnail wp-post-image" src="<?php echo $p->image; ?>">
		</div>
		<?php endif; ?>
		<?php if (!empty($p->audio)):?>
		<div class="gh-article-image">
			<iframe width="100%" height="200px" class="embed-responsive-item" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=<?php echo $p->audio;?>&amp;auto_play=false&amp;visual=true"></iframe>
		</div>
		<?php endif; ?>
		<?php if (!empty($p->video)):?>
		<div class="gh-article-image">
			<iframe width="100%" height="315px" class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo get_video_id($p->video); ?>" frameborder="0" allowfullscreen></iframe>
		</div>
		<?php endif; ?>
		<?php if (!empty($p->quote)):?>
		<div class="gh-article-image">
			<blockquote class="kg-blockquote-alt"><?php echo $p->quote ?></blockquote>
		</div>
		<?php endif; ?>
					
        <div class="<?php if (config('teaser.type') === 'full') {?>gh-content<?php } else {?>gh-card-excerpt<?php }?>"><?php echo get_teaser($p->body, $p->url); ?><?php if (config('teaser.type') === 'trimmed'):?>... <a class="more-link" href="<?php echo $p->url; ?>"><?php echo config('read.more'); ?></a><?php endif;?></div>

		<footer class="gh-card-meta">
			<a href="<?php echo $p->url ?>"><time class="gh-card-date"><?php echo format_date($p->date) ?></time></a>
			—
			<span class="gh-card-meta-wrapper">
				<span class="gh-card-duration"><?php echo $p->readTime; ?> min read</span>
			</span> 			
			<?php if (disqus_count()) { ?>
				<span class="bull"> • </span> 
				<span class="comments-link"><a href="<?php echo $p->url ?>#disqus_thread"> <?php echo i18n('Comments');?></a></span>
			<?php } elseif (facebook()) { ?>
				<span class="bull"> • </span> 
				<span class="comments-link"><a href="<?php echo $p->url ?>#comments"><span><fb:comments-count href=<?php echo $p->url ?>></fb:comments-count> <?php echo i18n('Comments');?></span></a></span>
			<?php } ?>
			
			<?php if (authorized($p)):?><span class="bull"> • </span> <a class="gh-card-date" href="<?php echo $p->url;?>/edit?destination=post">Edit</a><?php endif;?>
		</footer>

	</article>
	<?php endforeach; ?>
</div>

    
<footer class="gh-article-footer gh-canvas">
	<nav class="gh-navigation">

	<div class="gh-navigation-previous">
		<?php if (!empty($pagination['prev'])): ?>
		<a class="gh-navigation-link" href="?page=<?php echo $page - 1 ?>">
		<span class="gh-navigation-label"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
		<line x1="19" y1="12" x2="5" y2="12"></line>
		<polyline points="12 19 5 12 12 5"></polyline>
		</svg> <?php echo i18n('Newer');?></span>
		</a>
		<?php endif; ?>
	</div>

	<div class="gh-navigation-middle"><?php echo $pagination['pagenum'];?></div>


	<div class="gh-navigation-next">
		<?php if (!empty($pagination['next'])): ?>
		<a class="gh-navigation-link" href="?page=<?php echo $page + 1 ?>">
		<span class="gh-navigation-label"><?php echo i18n('Older');?> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
		<line x1="5" y1="12" x2="19" y2="12"></line>
		<polyline points="12 5 19 12 12 19"></polyline>
		</svg></span>
		</a><?php endif; ?>
	</div>

	</nav>
</footer>
<?php if (disqus_count()): ?>
    <?php echo disqus_count() ?>
<?php endif; ?>