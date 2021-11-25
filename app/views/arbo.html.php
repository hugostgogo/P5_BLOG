

<pre class="p-5 m-5 bg-gray-800 rounded">
[BLOG <a href="http://<?= $_SERVER['HTTP_HOST'] ?>"><?= $_SERVER['HTTP_HOST'] ?></a>]
│   .htaccess
│   android-chrome-192x192.png
│   android-chrome-512x512.png
│   apple-touch-icon.png
│   composer.json
│   composer.lock
│   composer.phar
│   favicon-16x16.png
│   favicon-32x32.png
│   favicon.ico
│   index.php
│   README.md
│   site.webmanifest
│
├───app
│   │   .htaccess
│   │   config.ini
│   │   functions.php
│   │
│   ├───Components
│   │   │   Comments.php
│   │   │
│   │   ├───AdminControls
│   │   │       cardMenu.html.php
│   │   │       createButton.html.php
│   │   │
│   │   ├───Cards
│   │   │       articleCard.html.php
│   │   │       commentCard.html.php
│   │   │       userCard.html.php
│   │   │
│   │   ├───CRUD
│   │   │       table.html.php
│   │   │
│   │   ├───Forms
│   │   │       articleForm.html.php
│   │   │       userForm.html.php
│   │   │
│   │   ├───Parts
│   │   │       appbar.html.php
│   │   │       likesComments.html.php
│   │   │
│   │   └───Profile
│   │           barProfile.html.php
│   │
│   ├───Controllers
│   │       BaseController.php
│   │       CommentsController.php
│   │       DB.php
│   │       PostsController.php
│   │       UsersController.php
│   │
│   ├───Mails
│   │       Contact.php
│   │       ResetPassword.php
│   │
│   ├───Models
│   │       Article.php
│   │       Base.php
│   │       Comment.php
│   │       Email.php
│   │       Like.php
│   │       User.php
│   │
│   ├───Routing
│   │       Route.php
│   │       Router.php
│   │
│   ├───Traits
│   │       LikeableTrait.php
│   │
│   └───views
│       │   404.html.php
│       │   layout.html.php
│       │   main.html.php
│       │   norights.html.php
│       │
│       ├───admin
│       │   │   home.html.php
│       │   │
│       │   ├───comments
│       │   │       comment.html.php
│       │   │       validation.html.php
│       │   │
│       │   └───users
│       │           all.html.php
│       │           single.html.php
│       │
│       ├───articles
│       │       all.html.php
│       │       single.html.php
│       │
│       ├───auth
│       │       login.html.php
│       │       logout.html.php
│       │       register.html.php
│       │
│       └───users
│               delete.html.php
│               single.html.php
│               updatePassword.html.php
│               updatePasswordForm.html.php
│
├───assets
│   ├───css
│   │       style.css
│   │
│   ├───images
│   │       close.svg
│   │       CV_Hugo_Le_Moal.pdf
│   │       me.jpg
│   │
│   └───js
│           custom.js
│           jquery-3.6.0.min.js
│           ztext.min.js
│
├───database
│       blog.sql
│
└───vendor
    │   autoload.php
    │
    ├───bin
    ├───composer
    │       autoload_classmap.php
    │       autoload_namespaces.php
    │       autoload_psr4.php
    │       autoload_real.php
    │       autoload_static.php
    │       ClassLoader.php
    │       installed.json
    │       installed.php
    │       InstalledVersions.php
    │       LICENSE
    │       platform_check.php
    │
    └───phpmailer
        └───phpmailer
            │   COMMITMENT
            │   composer.json
            │   get_oauth_token.php
            │   LICENSE
            │   README.md
            │   SECURITY.md
            │   VERSION
            │
            ├───language
            │       phpmailer.lang-af.php
            │       phpmailer.lang-ar.php
            │       phpmailer.lang-az.php
            │       phpmailer.lang-ba.php
            │       phpmailer.lang-be.php
            │       phpmailer.lang-bg.php
            │       phpmailer.lang-ca.php
            │       phpmailer.lang-ch.php
            │       phpmailer.lang-cs.php
            │       phpmailer.lang-da.php
            │       phpmailer.lang-de.php
            │       phpmailer.lang-el.php
            │       phpmailer.lang-eo.php
            │       phpmailer.lang-es.php
            │       phpmailer.lang-et.php
            │       phpmailer.lang-fa.php
            │       phpmailer.lang-fi.php
            │       phpmailer.lang-fo.php
            │       phpmailer.lang-fr.php
            │       phpmailer.lang-gl.php
            │       phpmailer.lang-he.php
            │       phpmailer.lang-hi.php
            │       phpmailer.lang-hr.php
            │       phpmailer.lang-hu.php
            │       phpmailer.lang-hy.php
            │       phpmailer.lang-id.php
            │       phpmailer.lang-it.php
            │       phpmailer.lang-ja.php
            │       phpmailer.lang-ka.php
            │       phpmailer.lang-ko.php
            │       phpmailer.lang-lt.php
            │       phpmailer.lang-lv.php
            │       phpmailer.lang-mg.php
            │       phpmailer.lang-ms.php
            │       phpmailer.lang-nb.php
            │       phpmailer.lang-nl.php
            │       phpmailer.lang-pl.php
            │       phpmailer.lang-pt.php
            │       phpmailer.lang-pt_br.php
            │       phpmailer.lang-ro.php
            │       phpmailer.lang-ru.php
            │       phpmailer.lang-sk.php
            │       phpmailer.lang-sl.php
            │       phpmailer.lang-sr.php
            │       phpmailer.lang-sr_latn.php
            │       phpmailer.lang-sv.php
            │       phpmailer.lang-tl.php
            │       phpmailer.lang-tr.php
            │       phpmailer.lang-uk.php
            │       phpmailer.lang-vi.php
            │       phpmailer.lang-zh.php
            │       phpmailer.lang-zh_cn.php
            │
            └───src
                    Exception.php
                    OAuth.php
                    PHPMailer.php
                    POP3.php
                    SMTP.php
</pre>
<style>
.test-wrap {
    white-space: pre-wrap;
}
</style>