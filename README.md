# PROJET 5 BLOG

Simple blog en PHP dans le cadre du projet 5 du parcours développeur d'application Symfony de OpenCLassrooms.

## Installation

##### Dépendances composer
Pour installer le projet, vous aurez besoin de composer(https://getcomposer.org/).

Installer les dépendances : `composer i`

##### Base de donées

Importer la base de donées avec le fichier SQL

Fichiers d'import : `/database/blog.sql`

## Configuration

##### Configuration par défaut
```php
[app]
DEBUG=0  // ACTIVER DEBUG MODE = 1


[site]
url = 'http://127.0.0.1' // URL DU SITE

[blog]
title = "BLOG DE HUGO"
description = "DESCRIPTION DE BLOG"
author = "Hugo Le Moal"
authorbio = "Je m'appelle Maurice et ceci est ma description dsvhj dvhy_sd vhyudsgyuv gdsyug yvdsgtvyg dsgtgdsyv ds ghvy sdghyvh dsyu dshvyu sdgyv gysdg vy gdsyvgsydg vyds gyvd gdysg vysdg yv gydsgb vy dgsyv gdsy gvdysgvysd gyv."

[posts]
perpage = '9' // NOMBRE DE POSTS PAR PAGE

[views]
root = 'app/views'
layout = 'layout'

[db] // CONFIGURATION BASE DE DONEES
name='blog'
host='127.0.0.1'
username=''
password=''

[SMTP]
host=""
port=2525
auth=true
username=""
password=""

[links] // LIENS RESEAUX SOCIAUX
github='http://github.com/hugostgogo'
cv='/assets/images/CV_Hugo_Le_Moal.pdf'
linkedin='https://www.linkedin.com/in/lemoal-hugo/'
```