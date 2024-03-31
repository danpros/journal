<?php if (!defined('HTMLY')) die('HTMLy'); ?>
<article class="gh-article post no-image page">
	<header class="gh-article-header gh-canvas">
		<?php if (authorized($p)):?>
		<div class="gh-article-meta"><span class="gh-card-date"><a class="gh-card-date" href="<?php echo $p->url;?>/edit?destination=post">Edit</a></span></div>
		<?php endif;?>
		<h1 class="gh-article-title"><?php echo $p->title;?></h1>
	</header>

	<div class="gh-content gh-canvas">
	<?php echo $p->body;?>
	</div>
</article>
