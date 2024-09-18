<?php
namespace Deployer;

require './vendor/azzarip/utilities/deploy.php';

after('artisan:optimize', 'artisan:sitemap:generate');