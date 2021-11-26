<!DOCTYPE html>
<html lang="fr">

<head>
	<title><?php echo isset($title) ? $title : config('blog.title') ?></title>

	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="<?php echo config('blog.description') ?>" />

	<link rel="alternate" type="application/rss+xml" title="<?php echo config('blog.title') ?>  Feed" href="<?php echo site_url() ?>rss" />

	<link href="<?php echo site_url() . 'assets/css/style.css' ?>" rel="stylesheet" />
	<link href="http://fonts.googleapis.com/css?family=Open+Sans+Condensed:700&subset=latin,cyrillic-ext" rel="stylesheet" />
	
	<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
	<link href="https://cdn.materialdesignicons.com/5.4.55/css/materialdesignicons.min.css" rel="stylesheet">
	
	<base href="<?php echo site_url(); ?>">
	<!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	

</head>

<body oncontextmenu="return false;">
	<div class="flex flex-col min-h-screen w-full h-full bg-gray-900 z-40">
		<?php include($_SERVER['DOCUMENT_ROOT'] . '/app/Components/Parts/appbar.html.php'); ?>
		<div id="content" class="flex-grow flex flex-col">
			<?php echo content() ?>
		</div>

	</div>

	<script src="<?php echo site_url() . 'assets/js/jquery-3.6.0.min.js' ?>"></script>
	<script src="<?php echo site_url() . 'assets/js/custom.js' ?>"></script>
	<script src="https://bennettfeely.com/ztext/js/ztext.min.js"></script>
</body>

</html>



<style>
	.z-layer:not(:first-child) {
		transition: transform 1s;
		text-shadow: 2px 0 0 #aaa, -2px 0 0 #aaa, 0 2px 0 #aaa, 0 -2px 0 #aaa, 1px 1px #aaa, -1px -1px 0 #aaa, 1px -1px 0 #aaa, -1px 1px 0 #aaa;
	}

	.z-layer:first-child,
	.z-layer:last-child {
		text-shadow: 2px 0 0 #fff, -2px 0 0 #fff, 0 2px 0 #fff, 0 -2px 0 #fff, 1px 1px #fff, -1px -1px 0 #fff, 1px -1px 0 #fff, -1px 1px 0 #fff;
	}
</style>