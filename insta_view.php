<?php
header("Access-Control-Allow-Origin: *");

$client_id = '222a0d2563f8074f4ea520c4bef90281a4';
$secret = '9b75056398b247228c25c95a1de137eabb';
$redirect_uri = 'http://www.roydondsouza.com/insta_view.php';  //Must Match IG setup Redirect URI
$scope = 'comments';

require_once('Instagram.php');

$insta = new Instagram(array(
	'client_id' => $client_id,
	'client_secret' => $secret,
	'redirect_uri' => $redirect_uri,
));

/*if(!$insta->isAuthenticated()){
	// User needs to login or authenticate
	$login_url = $insta->getLoginUrl(array(
		'scope' => $scope,
	));
	header('Location: '.$login_url);
} */

// Show the token
//echo "<br />Token: ";
//print_r($insta->getToken());

// Show the user data
//echo "<br />User Data: ";
print_r($insta->getUserData());

// Get the media tag to pull
//$tag = (isset($_GET['tag'])) ? urldecode($_GET['tag']) : 'circles';

// Make API call
//$circles = $insta->api('tags/'.$tag.'/media/recent'); 
//api.instagram.com/v1/users/271695357/media/recent?client_id= 2a0d2563f80ihttps://api.instagram.com/v1/users/271695357/media/recent?client_id= 2a0d2563f8074f4ea520c4bef90281a474f4ea520c4bef90281a4
$circles = $insta->api('users/271695357/media/recent');
//echo "<br />Circle Tags: ";
//echo "<pre>";
//print_r($circles);
foreach($circles->data as $circle){

	$tags = $circle->tags; 						// Array of tags
	$location = $circle->location; 				// Location Data if available
	$comments = $circle->comments->data; 		// Array of comment objects
	$comments_count = $circle->comments->count; // Comments count
	$created =  date('m/d/Y H:i', $circle->created_time); // Created Date/time
	$link =  $circle->link; 					// Created Date/time
	$likes = $circle->likes->data; 				// Array of likes objects
	$likes_count = $circle->likes->count; 		// Likes count
	$low_res = $circle->images->low_resolution->url; 		// Low res image
	$low_res_w = $circle->images->low_resolution->width; 	// Low res image width
	$low_res_h = $circle->images->low_resolution->height; 	// Low res image height
	$std_res = $circle->images->standard_resolution->url; 		// Standard res image
	$std_res_w = $circle->images->standard_resolution->width; 	// Standard res image width
	$std_res_h = $circle->images->standard_resolution->height; // Standard res image height
	$id = $circle->id; 							// Media ID 
	$user = $circle->user; 							// Media ID 
	

	//print_r($tags);
	//echo "<br />";
	echo "<a href='$link' target='_blank'><img style='border-radius:20px;margin-right:16px;margin-bottom:20px;height:160px;width:160px;float:left' src='$std_res' /></a>";
	//echo "<br />";
	//print_r($comments);
	//echo '<hr />';
	
	
}
