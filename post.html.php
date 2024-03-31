<?php if (!defined('HTMLY')) die('HTMLy'); ?>
    <article class="gh-article post no-image page">
        <header class="gh-article-header gh-canvas">
			<span class="gh-article-meta">
				<time><?php echo format_date($p->date) ?></time> 
				—			
				<?php echo i18n('Posted_in');?>
				<a class="gh-article-tag" href="<?php echo $p->categoryUrl;?>"><?php echo $p->categoryTitle;?></a> <?php echo i18n('by');?> <a href="<?php echo $p->authorUrl;?>"><?php echo $p->authorName;?></a>
				<span class="bull"> • </span>
				<span class="gh-card-duration"><?php echo $p->readTime; ?> min read</span>
				<?php if (authorized($p)):?><span class="bull"> • </span> <a class="gh-card-date" href="<?php echo $p->url;?>/edit?destination=post">Edit</a><?php endif;?>
			</span>
			
			<?php if (!empty($p->link)) { ?>
			<a class="gh-card-link" href="<?php echo $p->link; ?>" target="_blank"><h1 class="gh-card-title"><?php echo $p->title; ?> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
			<line x1="5" y1="12" x2="19" y2="12"></line>
			<polyline points="12 5 19 12 12 19"></polyline>
			</svg></h1> </a>
			<?php } else { ?>
			 <h1 class="gh-article-title"><?php echo $p->title;?></h1>
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

        </header>

        <div class="gh-content gh-canvas">
			<?php echo $p->body;?>
			<div class="tags"><span class="tags-label"><?php echo i18n('Tags');?>:</span> <?php echo $p->tag; ?></div>
			
			<?php if (disqus()): ?>
				<?php echo disqus($p->title, $p->url) ?>
			<?php endif; ?>
			<?php if (disqus_count()): ?>
				<?php echo disqus_count() ?>
			<?php endif; ?>			
			
			<?php if (facebook() || disqus()): ?>
			<div class="comments-area" id="comments">
				<?php if (facebook()): ?>
					<div class="fb-comments" data-href="<?php echo $p->url ?>" data-numposts="<?php echo config('fb.num') ?>" data-colorscheme="<?php echo config('fb.color') ?>"></div>
				<?php endif; ?>
				<?php if (disqus()): ?>
					<div id="disqus_thread"></div>
				<?php endif; ?>
			</div>
			<?php endif; ?>
			<div class="related-posts" style="padding-top:4rem"><strong class="gh-section-title"><?php echo i18n('Related_posts');?></strong>
			<?php echo get_related($p->related);?></div>
        </div>

		<footer class="gh-article-footer gh-canvas">
			<nav class="gh-navigation">
			
				<div class="gh-navigation-previous">
					<?php if (!empty($next)): ?>
					<a class="gh-navigation-link" href="<?php echo($next['url']); ?>">
						<span class="gh-navigation-label"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
<line x1="19" y1="12" x2="5" y2="12"></line>
<polyline points="12 19 5 12 12 5"></polyline>
</svg> <?php echo i18n('Next_post');?></span>
						<h4 class="gh-navigation-title"><?php echo($next['title']); ?></h4>
					</a>
					<?php endif; ?>
				</div>

				<div class="gh-navigation-middle"></div>

				<div class="gh-navigation-next">
				<?php if (!empty($prev)): ?>
					<a class="gh-navigation-link" href="<?php echo($prev['url']); ?>">
						<span class="gh-navigation-label"><?php echo i18n('Prev_post');?> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
<line x1="5" y1="12" x2="19" y2="12"></line>
<polyline points="12 5 19 12 12 19"></polyline>
</svg></span>
						<h4 class="gh-navigation-title"><?php echo($prev['title']); ?></h4>
					</a>
			
				<?php endif; ?>
				</div>
				
			</nav>
		</footer>
	</article>
