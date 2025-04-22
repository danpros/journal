<?php if (!defined('HTMLY')) die('HTMLy'); ?>
<!DOCTYPE html>
<html lang="<?php echo blog_language();?>">
<head>
    <?php echo head_contents();?>
    <?php echo $metatags;?>
    <link rel="stylesheet" href="<?php echo theme_path() ?>css/fonts.css">
    <link rel="stylesheet" href="<?php echo theme_path() ?>css/cards.css">
    <link rel="stylesheet" href="<?php echo theme_path() ?>css/screen.css">
</head>
<body class="home-template is-head-b--a_n <?php echo $bodyclass;?>">
<?php if (login()) { toolbar(); echo '<style>.gh-head-menu:before{top:110px;} .gh-head-menu:after{top:166px;}</style>';} ?>
    <div class="gh-site">
        <header id="gh-head" class="gh-head gh-outer">
            <div class="gh-head-inner gh-inner">
                <div class="gh-head-brand">
                    <div class="gh-head-brand-wrapper"><a class="gh-head-logo" href="<?php echo site_url() ?>"><?php echo blog_title() ?></a></div>
                    <button class="gh-burger"></button>
                </div>
                <nav class="gh-head-menu">
					<?php echo menu() ?>
                </nav>
            </div>
        </header>

		<main id="gh-main" class="gh-main <?php if (isset($is_front) || isset($is_blog)){?>gh-outer<?php } elseif (isset($is_page) || isset($is_subpage) || isset($is_post)) { ?>gh-page<?php } else {?>gh-canvas<?php } ?>">
			<?php echo content() ?>
		</main>

        <footer class="gh-foot gh-outer">
            <div class="gh-foot-inner gh-inner">
                <div class="gh-copyright">
				
					<div class="social" style="margin-bottom:10px;">
						<?php echo social();?>
					</div>				
				
                    <?php echo copyright();?>
                </div>

            </div>
        </footer>
    </div>
    <script src="<?php echo theme_path() ?>js/main.js"></script>
	<?php if (analytics()): ?><?php echo analytics() ?><?php endif; ?>
</body>
</html>
