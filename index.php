<?php

namespace SuperMetrics;

require("config/Config.php");
require("src/Token.php");
require("src/Posts.php");
/**
 * @var Config holds the main config instance to be used in the project
 */
$config = new Config();
/**
 * @var Token holds the token class object, returns the token string to be used to get and process posts
 */
$token = new Token($config);
/**
 * @var Posts holds the object of the posts class
 */
$posts = new Posts($token->get_token(), $config);
$output = $posts->get_posts();
header("Content-Type: application/json");
echo json_encode($output);
