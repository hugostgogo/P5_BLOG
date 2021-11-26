<?php

use App\Routing\Router;

// CONTROLLERS
use App\Controllers\UsersController;
use App\Controllers\PostsController;
use App\Controllers\CommentsController;


// MODELS
use App\Models\User;
use App\Models\Article;
use App\Models\Comment;

//DB
use App\controllers\DB;

use App\Mails\ResetPassword;
use App\Mails\Contact;

// autoload
require 'vendor/autoload.php';

// utils functions
require 'app/functions.php';

config('source','app/config.ini');

if (config('app.DEBUG')) {
	//errors logging
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
}

session_start();

function isAdmin () { return User::isAdmin(); }

$router = new Router($_GET['url']);


$router->get('/arbo', function () {
	render('arbo');
});


// main page
$router->get('/', function () {
	render('main');
});

// handles contact form from main page
$router->post('/contact/email', function () {
	$email = new Contact($_POST);

	if (!$email) return $_POST;

	$result = array(
		"success" => $email->send(),
		"type" => 'email'
	);

	redirect('/?' . http_build_query($result));
});

// AUTH ------------------------------------------------------------------------
$router->get('/login', function () {
	render('auth/login');
});

$router->post('/login', function () {
	$request = $_POST;

	$attempt = User::login($request['name'], $request['password']);

	if (!is_array($attempt)) redirect('/');
	else render('auth/login', array(
		"errors" => $attempt['errors'],
		"form" => $attempt['form'],
	));
});

$router->get('/register', function () {
	render('auth/register');
});

$router->post('/register', function () {
	$errors = [];
	$request = $_POST;
	$registered = User::register($request);
	$hasErrors = boolval($registered !== TRUE);
	if ($hasErrors) $errors = $registered['errors'];

	render('auth/register',[
		"hasErros" => $hasErrors,
		"errors" => $errors
	]);
});

$router->get('/logout', function () {
	User::logout();
	render('auth/logout');
});
// END AUTH ------------------------------------------------------------------------


// USER
$router->get('/profile', function () {
	$user = User::getLogged();

	if (!$user) {
		not_found();
	}

	render('users/single', array(
		'user' => $user,
	));
});

$router->post('/confirm/delete/:id', function ($id) {
	$deleted = UsersController::delete($id);
	if ($deleted) redirect('/logout');
	else redirect();
});

$router->get('/delete/user', function () {
	$user = User::getLogged();

	render('users/delete', array(
		"user" => $user,
	));
});

$router->post('/update/user/:id', function ($id) {

	$user = UsersController::getSingle($id);
	$updated = UsersController::update($id, $_POST);

	if ($updated) {
		unset($_POST);
		$user = $updated;
		redirect('/profile', array("user" => $user));
	}

	render('users/single', array(
		"post" => isset($_POST) ? $_POST : false,
		"user" => $user,
		"updated" => $updated,
	));
});

$router->post('/update/user/password/:id', function ($id) {
	$url = UsersController::resetPassword($id);
	// redirect("/update/password/code/$url");
});

$router->post('/update/:url', function ($url) {
	$errors = [];

	$user = ResetPassword::retrieve($url);
	if (!$user) $errors += ["user" => "Utilisateur inconnu."];

	$passwordValidation = (isset($_POST['password']) && isset($_POST['password2'])) && (trim($_POST['password']) === trim($_POST['password2']));

	if ($passwordValidation) {
		DB::update('users', $user->id, ["password" => password_hash(trim($_POST['password']), PASSWORD_DEFAULT)]);
		$query = http_build_query([
			"success" => true,
			"type" => "password"
		]);
	}

	if (count($errors) > 0) return ["errors" => $errors];
	else redirect('/?' . $query);
});

$router->get("/update/password/code/:id", function ($id) {
	$errors = array();

	$user = ResetPassword::retrieve($id);
	if (!$user) $errors += array("code" => "Ce code n'a jamais été envoyé !");
	else $result = array("user" => $user);

	if (!empty($errors)) $result = $errors;

	render('users/updatePassword', array(
		"result" => $result,
	));
});

$router->post("/update/password/code/:url", function ($url) {
	$user = ResetPassword::retrieve($url);
	$result = ["user" => $user, "url" => $url];
	if (!isset($_POST['code']) or trim($_POST['code']) == "") {
		render('users/updatePassword', array(
			"result" => ["errors" => ["code" => "Veuillez entrer un code."], "user" => $user],
		));
	} else { // code exists
		$validCode = ResetPassword::verifyCode($url, $_POST['code']);
		if (!isset($validCode['errors'])) {

			render('users/updatePasswordForm', array(
				"result" => $result,
			));
			return;
		} else {
			$result += $validCode;
			render('users/updatePassword', array(
				"result" => $result,
			));
		}
	}
});

// END USER ---------------------------------------------------------------------

// ARTICLES ---------------------------------------------------------------------



$router->get('/articles', function () {

	$posts = isset($_GET['liked']) && $_GET['liked'] ? PostsController::getLiked() : PostsController::getAll() ;
	
	$pages = paginate(9, $posts);
	$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

	$pagesCount = count($pages);
	$currentPage = $page;

	$pageIndex = $page - 1;
	$postsOfPage = ($pagesCount > 0 and isset($pages[$pageIndex])) ? $pages[$pageIndex] : [];

	render('articles/all', array(
		'isAdmin' => isAdmin(),
		'model' => Article::class,
		'posts' => $postsOfPage,
		'pages' => $pagesCount,
		'currentPage' => $currentPage,
	));
});

$router->get('/article/:id', function ($id) {

	$post = PostsController::getSingle($id);

	if (!$post) {
		not_found();
	}

	render('articles/single', array(
		'title' => $post->title . ' ⋅ ' . config('blog.title'),
		'post' => $post,
	));
});

$router->post('/articles/like', function () {
	$post_id = $_POST['post_id'];
	$post = PostsController::getSingle($post_id);
	$post->like(User::getLogged()->id);

	redirect("/article/$post_id");
});

$router->post('/article/delete', function () {
	$id = $_POST['id'];
	if (isset($id)) PostsController::delete($_POST['id']);
	redirect('/articles');
});

$router->post('/article/update', function () {
	$id = $_POST['id'];

	$updatedPost = $_POST;

	if (isset($id)) PostsController::update($id, $updatedPost);
	redirect('/articles');
});

$router->post('/articles', function () {
	header('Access-Control-Allow-Origin: *');

	$currentUser = User::getLogged();

	$args = $_POST;

	$args += ["author_id" => $currentUser->id];

	$success = PostsController::create($args);

	redirect("/articles");
});

// COMMENTS PART --------------------------------------------------------------------------

$router->post('/comments', function () {
	$result = CommentsController::create($_POST);
	var_dump($result);
});


// ADMIN PART --------------------------------------------------------------------------

function noRights() { render('norights', []); }

$router->get('/norights', function () {noRights();});

$router->get('/admin', function () {
	if (!isAdmin()) noRights()();

	$comments = CommentsController::getUnconfirmed();

	render('admin/home', [
		"commentsCount" => count($comments)
	]);
});


$router->get('/admin/comments/validation', function () {
	if (!isAdmin()) noRights()();

	$comments = CommentsController::getUnconfirmed();

	render('admin/comments/validation', array(
		'comments' => $comments,
	));
});

$router->post('/admin/comments/validation/:id', function ($commentId) {
	if (!isAdmin()) noRights()();

	$comment = CommentsController::getSingle($commentId);
	$comment->activate($_POST['state']);

	$comments = CommentsController::getUnconfirmed();

	render('admin/comments/validation', array(
		'comments' => $comments,
	));
});

$router->get('/admin/users', function () {
	if (!isAdmin()) noRights()();

	$users = User::getAll();

	if (!$users) {
		not_found();
	}

	render('admin/users/all', array(
		'model' => User::class,
		'pages' => 1,
		'users' => $users,
	));
});

$router->post('/admin/users', function () {
	if (!isAdmin()) noRights()();

	User::register($_POST);
	$users = User::getAll();

	render('admin/users/all', array(
		'model' => User::class,
		'pages' => 1,
		'users' => $users,
	));
});

$router->get('/admin/user/:id', function ($id) {
	if (!isAdmin()) noRights()();

	$user = User::get($id);

	if (!$user) {
		not_found();
	}

	render('admin/users/single', array(
		'user' => $user,
	));
});



$router->run();
