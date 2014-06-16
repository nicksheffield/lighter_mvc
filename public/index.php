<?php

# Load the config file that contains all the settings for this application
require_once('../app/config/config.php');

# Load the routes file that handles unique routes
require_once('../app/config/routes.php');

# set the base url constant, which we will use in html
define('BASE_URL', $config['base_url']);

# Load the Registry
require_once('../sys/core/registry.php');
$registry = new Registry();
$registry->config = $config;

# Load the base Controller class
require_once('../sys/libraries/controller.php');
# Load the base Model class
require_once('../sys/libraries/model.php');


# Autoload all the classes needed
require_once('../sys/core/autoload.php');

# Deal with the url to see exactly what controller we are using
require_once('../sys/core/routing.php');