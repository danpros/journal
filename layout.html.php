<?php if (!defined('HTMLY')) die('HTMLy'); ?>
<!DOCTYPE html>
<html lang="<?php echo blog_language();?>">
<head>
	<?php echo head_contents();?>
	<title><?php echo $title;?></title>
	<meta name="description" content="<?php echo $description; ?>"/>
	<link rel="canonical" href="<?php echo $canonical; ?>" />
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
                    <a class="gh-head-logo" href="<?php echo site_url() ?>"><?php echo blog_title() ?></a>
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

					<?php if(!empty(config('social.facebook'))):?>
					<a class="footer-link" target="_blank" href="<?php echo config('social.facebook');?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
					<path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
					</svg></a>
					<?php endif;?>
					
					<?php if(!empty(config('social.twitter'))):?>
					<a class="footer-link" target="_blank" href="<?php echo config('social.twitter');?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
					<path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
					</svg></a>
					<?php endif;?>

					<a class="footer-link" target="_blank" href="<?php echo site_url();?>feed/rss"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-rss" viewBox="0 0 16 16">
					<path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
					<path d="M5.5 12a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm-3-8.5a1 1 0 0 1 1-1c5.523 0 10 4.477 10 10a1 1 0 1 1-2 0 8 8 0 0 0-8-8 1 1 0 0 1-1-1zm0 4a1 1 0 0 1 1-1 6 6 0 0 1 6 6 1 1 0 1 1-2 0 4 4 0 0 0-4-4 1 1 0 0 1-1-1z"/>
					</svg></a>						


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