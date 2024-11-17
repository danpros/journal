<?php if (!defined('HTMLY')) die('HTMLy'); ?>
<div class="gh-inner">

	<?php $featured = recent_tag('featured', config('recent.count'), true);?>
	<?php if (!empty($featured)):?>
		<?php foreach ($featured as $f):?>
		<article class="gh-latest gh-card post">
			
				<header class="gh-card-header">
					<div class="gh-article-meta">
						<span class="gh-card-date">Featured — <time><?php echo format_date($f->date);?></time> </span>
					</div>

					<h2 class="gh-article-title "><a class="gh-card-link" href="<?php echo $f->url;?>"><?php echo $f->title;?></a></h2>
				</header>

				<div class="gh-article-excerpt"><?php echo $f->description;?></div>

				<footer class="gh-card-meta">
					<a href="<?php echo $f->url ?>"><time class="gh-card-date"><?php echo format_date($f->date) ?></time></a>
					—
					<span class="gh-card-meta-wrapper">
						<span class="gh-card-duration"><?php echo $f->readTime; ?> min read</span>
					</span> 			
					<?php if (disqus_count()) { ?>
					<span class="bull"> • </span> 
						<span class="comments-link"><a href="<?php echo $f->url ?>#disqus_thread"> <?php echo i18n('Comments');?></a></span>
					<?php } elseif (facebook()) { ?>
					<span class="bull"> • </span> 
						<span class="comments-link"><a href="<?php echo $f->url ?>#comments"><span><fb:comments-count href=<?php echo $f->url ?>></fb:comments-count> <?php echo i18n('Comments');?></span></a></span>
					<?php } ?>
					
					<?php if (authorized($f)):?><span class="bull"> • </span> <a class="gh-card-date" href="<?php echo $f->url;?>/edit?destination=post">Edit</a><?php endif;?>
				</footer>
			
		</article>
		<?php break;?>
		<?php endforeach;?>
	<?php endif;?>				
					
	<div class="gh-wrapper">
		<section class="gh-section">
		<h2 class="gh-section-title"><?php echo i18n("All_blog_posts");?></h2>

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
					
		</section>

		<aside class="gh-sidebar">
			<section class="gh-section">
				<h2 class="gh-section-title"><?php echo i18n("About");?></h2>

				<div class="gh-about">
					<img class="gh-about-icon" src="<?php echo site_url() ?>themes/journal/img/avatar.png" alt="<?php echo blog_title() ?>">
					<section class="gh-about-wrapper">
						<h3 class="gh-about-title"><?php echo blog_title() ?></h3>
						<div class="gh-about-description"><?php echo blog_description() ?></div>
					</section>
				</div>
			</section>

			<?php if (!empty($featured)):?>
			<section class="gh-section">
				<h3 class="gh-section-title">Featured</h3>
				<div class="gh-featured gh-feed">
					<?php foreach ($featured as $f):?>
					<article class="gh-card post featured">
						<a class="gh-card-link" href="<?php echo $f->url;?>">
							<header class="gh-card-header">
								<h2 class="gh-card-title"><?php echo $f->title;?></h2>
							</header>
							<div class="gh-card-excerpt"><?php echo $f->description;?></div>
							<footer class="gh-card-meta">
								<time class="gh-card-date"><?php echo format_date($f->date) ?></time> —
								<span class="gh-card-meta-wrapper">
								<span class="gh-card-duration"><?php echo $f->readTime; ?> min read</span></span>
							</footer>
						</a>
					</article>
					<?php endforeach;?>
				</div>
			</section>
			<?php endif;?>

			<?php if (config('views.counter') === 'true') :?>
			<section class="gh-section">
			<h3 class="gh-section-title"><?php echo i18n("Popular_posts");?></h3>
			<div class="gh-featured gh-feed">
				<?php $pops = popular_posts(true);?>
				<?php foreach ($pops as $pop):?>
				<article class="gh-card post featured">
					<a class="gh-card-link" href="<?php echo $pop->url;?>">
					<header class="gh-card-header"><h2 class="gh-card-title"><?php echo $pop->title;?></h2></header>
					<div class="gh-card-excerpt"><?php echo $pop->description;?></div>
					<footer class="gh-card-meta">
						<time class="gh-card-date"><?php echo format_date($pop->date) ?></time> —
						<span class="gh-card-meta-wrapper"><span class="gh-card-duration"><?php echo $pop->readTime; ?> min read</span></span>
					</footer>
					</a>
				</article>
				<?php endforeach;?>
			</div>
			</section>
			<?php endif;?>

			<section class="gh-section">
			<h3 class="gh-section-title"><?php echo i18n('Category');?></h3>
			<div class="gh-topic">
				<?php $taxonomies = category_list(true);?>
				<?php foreach ($taxonomies as $tax => $tx):?>
				<?php if (get_categorycount($tx['0']) !== 0): ?>
				<a class="gh-topic-item" href="<?php echo site_url() . 'category/' . $tx[0]; ?>">
					<h3 class="gh-topic-name"><?php echo $tx['1'];?></h3>
					<span class="gh-topic-count">
					<?php echo $tx['2'] . ' ' . i18n('Posts') ;?>
					</span>
				</a>
				<?php endif; ?>
				<?php endforeach;?>
			</div>
			</section>

			<section class="gh-section">
				<h3 class="gh-section-title"><?php echo i18n('Archives');?></h3>
				<div class="gh-topic">
					<select class="archives-list" onchange="if (this.value) window.location.href=this.value">
					<option value="">Monthly</option>;
					<?php $data = archive_list(true);
					foreach ($data as $year => $months) {
						$by_month = array_count_values($months);
						# Sort the months
						krsort($by_month);
						foreach ($by_month as $month => $count) {
							$name = format_date(mktime(0, 0, 0, $month, 1, 2010), 'F');
							echo '<option value="' . site_url() . 'archive/' . $year . '-' . $month . '">' . $name . ' ' . $year . ' ('.$count.')</option>';
						}
					}?>
					</select>
				</div>
			</section>	

			<section class="gh-section">
				<h3 class="gh-section-title"><?php echo i18n('Tags');?></h3>
				<div class="gh-topic">
					<?php echo tag_cloud();?>
				</div>
			</section>						

		</aside>
	</div>
		
</div>
<?php if (disqus_count()): ?>
    <?php echo disqus_count() ?>
<?php endif; ?>