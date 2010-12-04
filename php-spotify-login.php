#!/usr/bin/php
<?php

	/**
	 * Script to login to Spotify, will allow
	 * non-uk people to use spotify without
	 * having to annoy people(me) to login.
	 *
	 * @author Iain Cambridge
	 * @license http://backie.org/copyright/bsd-license/ BSD License
	 * @version 1.0
	 */
	 
	/**
	  * Username for spotify
	  */
	define("SPOTIFY_USERNAME","");
	/**
	  * Password for spotify
	  */
	define("SPOTIFY_PASSWORD","");
	/**
	  * User agent to send, by forcing people 
	  * to define this themselves it will 
	  * stop spotify being able to ban enmass.
	  */
	define("USER_AGENT","");
	 
	 
	// Don't edit below here!
	 
	define("SPOTIFY_URL","https://www.spotify.com/uk/login/");
	
	$curlResource = curl_init ();
	curl_setopt($curlResource, CURLOPT_URL, SPOTIFY_URL);
	curl_setopt($curlResource, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
	curl_setopt($curlResource, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($curlResource, CURLOPT_SSL_VERIFYHOST, false); 	
	curl_setopt($curlResource, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curlResource, CURLOPT_POST, 1);
	curl_setopt($curlResource, CURLOPT_REFERER, SPOTIFY_URL); 
	curl_setopt($curlResource, CURLOPT_POSTFIELDS, "user_name=".SPOTIFY_USERNAME."&password=".SPOTIFY_PASSWORD."&forward_url=/&login=Login in&wp_uri=/uk/login/&token=");
	curl_setopt($curlResource, CURLOPT_HEADER, 1);
	curl_setopt($curlResource, CURLOPT_USERAGENT, USER_AGENT);
	curl_setopt($curlResource, CURLOPT_RETURNTRANSFER, 1); 
	$returnData = curl_exec($curlResource);
	
	if (preg_match("~sp_product\=~isU",$returnData)){
		print "Login Success!".PHP_EOL;
	} else {
		print "Login Fail!".PHP_EOL;
	}
