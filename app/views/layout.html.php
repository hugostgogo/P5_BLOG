<!DOCTYPE html>
<html>
<head>
	<title><?php echo isset($title) ? _h($title) : config('blog.title') ?></title>

	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="<?php echo config('blog.description')?>" />

	<link rel="alternate" type="application/rss+xml" title="<?php echo config('blog.title')?>  Feed" href="<?php echo site_url()?>rss" />

	<link href="<?php echo site_url() ?>assets/css/style.css" rel="stylesheet" />
	<link href="http://fonts.googleapis.com/css?family=Open+Sans+Condensed:700&subset=latin,cyrillic-ext" rel="stylesheet" />

	<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
	<link href="https://cdn.materialdesignicons.com/5.4.55/css/materialdesignicons.min.css" rel="stylesheet">
	

	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
</head>
<body>
	<div class="flex w-100 h-screen">
		<?php if ($showDrawer):?>
		<div id="drawer" class="transform fixed h-full w-60 shadow-xl bg-gray-900 text-white font-bold transition-transform duration-500 p-3 -translate-x-full">
			
			<div class="flex items-center -mt-3">
				<div id="toggleDrawer" class="rounded-full w-10 h-10 text-white bg-transparent mt-2">
					<i class="mdi mdi-menu text-2xl" aria-hidden="true"></i>
				</div>	
				
				<div onclick="changeRoute('<?php echo site_url(); ?>')">
					<?php echo config('blog.title') ?>
				</div>
			</div>

			<hr class="mb-2"/>

			<div class="flex flex-col">
				<button class="rounded p-2 mb-2 focus:bg-red-500 focus:bg-opacity-25 focus:text-white focus:transition-colors focus:transition-opacity focus:duration-100 ease-in-out font-bold menuItem <?php echo(isRoute('/') ? 'text-red-500 bg-white' : 'text-gray-500 bg-opacity-0') ?>" onclick="changeRoute('/')">
					<span>Accueil</span>
				</button>

				<button class="rounded p-2 mb-2 focus:bg-red-500 focus:bg-opacity-25 focus:text-white focus:transition-colors focus:transition-opacity focus:duration-100 ease-in-out font-bold menuItem <?php echo(isRoute('article') ? 'text-red-500 bg-white' : 'text-gray-500 bg-opacity-0') ?>" onclick="changeRoute('<?php echo(site_url()) ?>')">
					<span>Articles</span>
				</button>
			</div>

			<div class="absolute bottom-0 left-0 w-full p-3 flex items-center justify-space-around bg-red-500">
				<img class="profilePicture pr-3" src="https://lh3.googleusercontent.com/proxy/Ytdi0H10CQe1JSPahSlrm2Bs1xGJ55ZzxqI8RnGXHEo0GPFnpDmWX3lWUiCx3TcIomDfJcJ1RbjQgehI8R2dfNORloRuP_himX4">
				<div>
					Maurice
				</div>
			</div>
		</div>
		<?php endif; ?>
		
		<div class="flex flex-col w-full h-full bg-gray-900">
			<?php if ($showDrawer):?>
			<div class="bg-gray-800 py-3 px-5">
				<div id="toggleDrawer" class=" top-2 left-2 rounded-full w-10 h-10 text-white">
					<i class="mdi mdi-menu text-2xl" aria-hidden="true"></i>
				</div>
			</div>
			<?php endif; ?>
			
			<div>
				<section id="content">
					<?php echo content()?>
				</section>
			</div>
			
		</div>
	</div>
	
</body>
</html>

<script>
	document.querySelectorAll("#toggleDrawer").forEach( (button) => {
		button.addEventListener('click', (e) => {
			const drawer = Drawer()
			drawer.toggle()
		})
	})

	const setDrawer = (state = true) => {
		let drawer = Drawer();
		let str = drawer.classes
		let offset = str.split(" ")

		if (state) drawer.$el.className = str.substring(0, str.length - offset[ offset.indexOf('-translate-x-full') ].length - 1) + ' translate-x-0'
		else drawer.$el.className = str.substring(0, str.length - offset[ offset.indexOf('translate-x-0') ].length - 1) + ' -translate-x-full'
	}

	let Drawer = () => ({
		$el: document.querySelector('#drawer'),
		classes: drawer.className,
		isOpen: drawer.className.split(' ').indexOf('translate-x-0') == -1,
		set: (state) => {
			return setDrawer(state)
		},
		toggle: () => {
			return setDrawer(drawer.className.split(' ').indexOf('translate-x-0') == -1)
		},
	})

	function changeRoute(route, $event) {
		window.location.href = route
	}
</script>
