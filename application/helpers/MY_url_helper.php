<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Sets HTTP Location header, BUT DOES NOT call "exit". This is necessary when you 
 * want to set a redirect but need the script to finish so the database transaction
 * can be committed.
 * 
 * @param string $uri
 * @param string $method (not used)
 * @param integer $http_response_code
 */
function redirect($uri = '', $method = 'location', $http_response_code = 302)
{ 
	if ( ! preg_match('#^https?://#i', $uri))
	{
		$uri = site_url($uri);
	}

	header("Location: ".$uri, TRUE, $http_response_code);
}

