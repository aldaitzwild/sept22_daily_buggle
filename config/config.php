<?php

/**
 * This file define config constants .
 *
 * PHP version 7
 *
 * @author   WCS <contact@wildcodeschool.fr>
 *
 * @link     https://github.com/WildCodeSchool/simple-mvc
 */

// environnement ('dev' or 'prod')
define('ENV', getenv('ENV') ? getenv('ENV') : 'dev');

//VIew
define('APP_VIEW_PATH', __DIR__ . '/../src/View/');

define('HOME_PAGE', 'home/index');
