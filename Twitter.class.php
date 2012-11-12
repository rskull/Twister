<?php

require_once 'config.php';
require_once 'library/twitteroauth/twitteroauth.php';

class Twist {

    public $OAuth;

    public function __construct ($consumerKey, $consumerKeySecret, $accessToken, $accessTokenSecret) {
        $this->OAuth = new TwitterOAuth(
            $consumerKey,
            $consumerKeySecret,
            $accessToken,
            $accessTokenSecret
        );
    }

    public function Request ($url, $method = 'POST', $opt = array()){
        $request = $this->OAuth->OAuthRequest('http://api.twitter.com/1/'.$url, $method, $opt);
        return $request ? $request : null;
    }

    public function Post ($status, $reply = null) {
        $opt = array();
        $opt['status'] = $status;
        $opt['in_reply_to_status_id'] = $reply;
        $request = $this->Request('statuses/update.json', 'POST', $opt);
        return json_decode($request);
    }

}
