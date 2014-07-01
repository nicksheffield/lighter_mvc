<?php

# Empty the get and request superglobals
$_GET     = array();
$_REQUEST = array();

# Filter the post array and put it all into the Input class
foreach($_POST as $key => $val){
	Input::set($key, $val);
}