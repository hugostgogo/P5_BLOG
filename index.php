<?php
namespace App;

use App\Models\Article;
use App\Models\Comment;

require 'vendor/autoload.php';


// Load the configuration file
config('source', 'app/config.ini');

// The front page of the blog.
// This will match the root url
get('/blog/index', function () {

	$page = from($_GET, 'page');
	$page = $page ? (int)$page : 1;
	
	$posts = Article::getAll();
	
    render('main',array(
    	'page' => $page,
		'posts' => $posts,
		'has_pagination' => false,
		'showDrawer' => true
	));
});

get('/register', function () {
    render('register',array(
    	'showDrawer' => false
	));
});

get('/login', function () {
    render('login',array(
    	'showDrawer' => false
	));
});

// The post page
get('/article/:id', function ($id) {

	$post = Article::get($id);
	$comments = $post->getComments();

	if(!$post){
		not_found();
	}

	render('post',array(
		'title' => $post->title .' ⋅ ' . config('blog.title'),
		'p' => $post,
		'comments' => $comments,
		'showDrawer' => true
	));
});

get('/admin', function () {

	$posts = Article::getAllWithComments();

	if(!$posts){
		not_found();
	}

	render('admin/home',array(
		'posts' => $posts,
		'showDrawer' => false
	));
});

post('/articles', function ($req) {
	
});

get('/api/json',function(){

	header('Content-type: application/json');
	echo generate_json(get_posts(1, 10));
});

get('/rss',function(){

	header('Content-Type: application/rss+xml');
	echo generate_rss(get_posts(1, 30));
});

get('.*',function(){
	not_found();
});

dispatch();
