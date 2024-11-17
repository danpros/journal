<?php if (!defined('HTMLY')) die('HTMLy'); ?>
<div class="gh-inner">

	<article class="gh-latest gh-card post">
		<header class="gh-card-header">
			<?php if (authorized($p)):?><div class="gh-article-meta">
			<span class="gh-card-date"><a class="gh-card-date" href="<?php echo $p->url;?>/edit?destination=post">Edit</a></span>
			</div>
			<?php endif;?>
			<h2 class="gh-article-title "><?php echo $p->title;?></h2>
		</header>

		<div class="gh-content"><?php echo $p->body;?></div>
	</article>
	
	<div class="gh-wrapper">
		<section class="gh-section">
			<h2 class="gh-section-title"><?php echo i18n("Recent_posts");?></h2>

			<div class="gh-feed">
				<?php $recent = recent_posts(true, config('recent.count'));?>
				<?php foreach ($recent as $r): ?>
				<article class="gh-card post">
				
					<header class="gh-card-header">
						<h2 class="gh-card-title "><a class="gh-card-link" href="<?php echo $r->url;?>"><?php echo $r->title;?></a></h2>
					</header>

					<div class="gh-card-excerpt"><?php echo $r->description;?></div>

					<footer class="gh-card-meta">
						<a href="<?php echo $r->url ?>"><time class="gh-card-date"><?php echo format_date($r->date) ?></time></a>
						—
						<span class="gh-card-meta-wrapper">
							<span class="gh-card-duration"><?php echo $r->readTime; ?> min read</span>
						</span>
						<?php if (disqus_count()) { ?>
						<span class="bull"> • </span> 
							<span class="comments-link"><a href="<?php echo $r->url ?>#disqus_thread"> <?php echo i18n('Comments');?></a></span>
						<?php } elseif (facebook()) { ?>
						<span class="bull"> • </span> 
							<span class="comments-link"><a href="<?php echo $p->url ?>#comments"><span><fb:comments-count href=<?php echo $r->url ?>></fb:comments-count> <?php echo i18n('Comments');?></span></a></span>
						<?php } ?>
						
						<?php if (login()):?><span class="bull"> • </span> <a class="gh-card-date" href="<?php echo $r->url;?>/edit?destination=post">Edit</a><?php endif;?>
					</footer>

				</article>
				<?php endforeach; ?>
			</div>

			<footer class="gh-article-footer gh-canvas">
				<nav class="gh-navigation">

					<div class="gh-navigation-previous">
					</div>

					<div class="gh-navigation-middle"> 
					<?php if (config('blog.enable') === 'true'):?>
						<a class="gh-navigation-link" href="<?php echo site_url() . blog_path();?>">
							<span class="gh-navigation-label"><?php echo i18n('All_blog_posts');?> →</span>
						</a>
					<?php endif; ?>
					</div>

					<div class="gh-navigation-next">
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

			<?php $featured = recent_tag('featured', config('recent.count'), true);?>
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