<?php

require_once 'Twitter.class.php';

// リスト攻撃ファイル
define('TWEET_LIST', 'dic/tweet_list');

// Target User
$target = '@'.$argv[1].' ';
$args = array_slice($argv, 2);

// リスト攻撃
if ($args[0] == 'list') 
    $args = file(TWEET_LIST);

$OAuth = new Twist(
    $consumerKey,
    $consumerKeySecret,
    $accessToken,
    $accessTokenSecret
);

echo "[\033[0;34m Reply to $target\033[0m ]\n\n";
foreach ($args as $key=>$val) {
    $responce = $OAuth->Post($target.$val);
    if ($responce->id_str)
        echo $key + 1 . ".\033[0;32m Success\033[0m \n";
    else
        echo $key + 1 . ".\033[0;31m Error\033[0m \n";
}

echo "\n\033[0;31mComplete!\033[0m";

