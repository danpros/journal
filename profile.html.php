<?php if (!defined('HTMLY')) die('HTMLy'); ?>
<section class="gh-pagehead">
	<header class="gh-pagehead-content">
		<h1 class="gh-author-name gh-pagehead-title"><?php echo $name;?></h1>
		<div class="gh-author-bio gh-pagehead-description"><?php echo $about;?></div>
		<div class="gh-author-meta">
			<span class="gh-author-location">📍 The Internet</span>
			<a class="gh-author-website" href="<?php echo site_url();?>" target="_blank" rel="noopener"><?php echo site_url();?></a>
			<div class="gh-author-social">
				<a class="gh-author-twitter" href="<?php echo config('social.twitter');?>" target="_blank" rel="noopener"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M15.9687 3.04665C15.3697 3.31039 14.7351 3.48448 14.0853 3.56332C14.7694 3.15215 15.2816 2.50735 15.5273 1.74799C14.8933 2.11799 14.1907 2.38732 13.4427 2.53732C12.9492 2.00961 12.2952 1.6596 11.5824 1.54165C10.8696 1.42371 10.1378 1.54442 9.50062 1.88505C8.86345 2.22567 8.35657 2.76715 8.0587 3.4254C7.76083 4.08365 7.68864 4.82183 7.85333 5.52532C5.12667 5.39665 2.71133 4.08665 1.09333 2.10799C0.799196 2.60786 0.645776 3.178 0.649333 3.75799C0.649333 4.89799 1.22933 5.89999 2.108 6.48865C1.58724 6.47208 1.07798 6.33128 0.622667 6.07799V6.11799C0.622371 6.87558 0.884179 7.60995 1.36367 8.19649C1.84316 8.78304 2.51081 9.18564 3.25333 9.33599C2.7722 9.46491 2.26828 9.48427 1.77867 9.39265C1.98941 10.0447 2.39844 10.6146 2.94868 11.023C3.49891 11.4314 4.1629 11.6578 4.848 11.6707C3.68769 12.5813 2.25498 13.0755 0.78 13.074C0.52 13.074 0.260667 13.0587 0 13.0293C1.50381 13.9922 3.25234 14.5033 5.038 14.502C11.0733 14.502 14.37 9.50465 14.37 5.17865C14.37 5.03865 14.37 4.89865 14.36 4.75865C15.004 4.29523 15.5595 3.71987 16 3.05999L15.9687 3.04665Z" fill="#888888"></path>
				</svg>
				</a>
				<a class="gh-author-facebook" href="<?php echo config('social.facebook');?>" target="_blank" rel="noopener"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M16 8.04865C16 3.63065 12.418 0.048645 8 0.048645C3.582 0.048645 0 3.63065 0 8.04865C0 12.042 2.92533 15.3513 6.75 15.9513V10.3613H4.71867V8.04798H6.75V6.28665C6.75 4.28198 7.94467 3.17398 9.772 3.17398C10.6467 3.17398 11.5627 3.33065 11.5627 3.33065V5.29931H10.5533C9.55933 5.29931 9.24933 5.91598 9.24933 6.54865V8.04865H11.468L11.1133 10.362H9.24933V15.952C13.0747 15.3513 16 12.0413 16 8.04865Z" fill="#888888"></path>
				</svg>
				</a>
			</div>
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
			
			<?php if (login()):?><span class="bull"> • </span> <a class="gh-card-date" href="<?php echo $p->url;?>/edit?destination=post">Edit</a><?php endif;?>
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