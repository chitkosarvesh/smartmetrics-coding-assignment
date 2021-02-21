<?php

namespace SmartMetrics;

require("config/Config.php");
require("src/Token.php");
require("src/Posts.php");
$config = new Config();
$token = new Token($config);
$posts = new Posts($token->get_token(), $config);
$output = $posts->get_posts();
header("Content-Type: application/json");
echo json_encode($output);
