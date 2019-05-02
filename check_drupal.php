<?php
/**
 * Get Drupal 7 current version
 */

$version = NULL;
$version_file = 'includes/bootstrap.inc';

// Path to installation

if(isset($argv[1]))
	$install_path = $argv[1];
else
	die('NO PARAM');


$file = realpath($install_path . '/' . $version_file);
include_once $file;

$version = defined('VERSION') ? VERSION : FALSE;

//echo $version;
//return VERSION;


/**
 * Get Drupal latest version
 */

$latest = NULL;
$url = 'http://updates.drupal.org/release-history/drupal/7.x';

$context = stream_context_create(array(
	'http' => array(
		'method'  => 'GET',
		'timeout' => 10,
	),
));

$data = file_get_contents($url, FALSE, $context);

if($data)
	$feed = simplexml_load_string($data);

if($feed && $feed instanceof SimpleXMLElement) {

	// Check the property exists and assign
	if( isset($feed->releases->release[0]->version) ) {
	
		$latest = $feed->releases->release[0]->version;
		
		//echo $latest;
		// return $latest;
	}
}

if($latest!=$version) die('OUT OF DATE');
echo 'OK';


?>