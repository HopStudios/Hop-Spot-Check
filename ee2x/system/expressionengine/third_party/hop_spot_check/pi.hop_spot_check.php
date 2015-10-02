<?php
/*
==========================================================
	This software package is intended for use with 
	ExpressionEngine.	ExpressionEngine is Copyright © 
	2002-2011 EllisLab, Inc. 
	http://ellislab.com/
==========================================================
	THIS IS COPYRIGHTED SOFTWARE, All RIGHTS RESERVED.
	Written by: Louis Dekeister
	Copyright (c) 2015 Hop Studios
	http://www.hopstudios.com/software/
--------------------------------------------------------
	Please do not distribute this software without written
	consent from the author.
==========================================================
*/

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once PATH_THIRD."hop_spot_check/config.php";

$plugin_info = array(
	'pi_name'			=> 'Hop Spot Check',
	'pi_version'		=> HOP_SPOT_CHECK_VERSION,
	'pi_author' 		=> 'Louis Dekeister (Hop Studios)',
	'pi_author_url' 	=> 'http://www.hopstudios.com/software/',
	'pi_description' 	=> 'Check if your content is displayed only where it should be.',
	'pi_usage'			=> Hop_spot_check::usage()
);

class Hop_spot_check
{
	public $return_data = "";
	
	/**
	 * Contruct plugin
	 * Also used by {exp:hop_spot_check} tag
	 */
	public function __construct()
	{
		//When using {exp:hop_spot_check} tag, we needs to set return_data

		//old versions of EE
		if (!function_exists('ee'))
		{
			function ee()
			{
				return get_instance();
			}
		}
		
		$the_spot = ee()->TMPL->fetch_param('spot');
		$redirect = ee()->TMPL->fetch_param('redirect');

		if ($the_spot == "")
		{
			return;
		}
		
		//Cleaning the first '/' in case the_spot is like /the/relative/url
		$re = "/^\\/([a-zA-Z0-9\\~\\%]+)/";
		preg_match($re, $the_spot, $matches);
		// print_r($matches);
		if (!empty($matches))
		{
			$the_spot = substr($the_spot, 1);
		}
		
		
		//Default case: compare form path to the end ( path/with?a=query#andAnchor )
		$current_spot = ee()->uri->uri_string();
		
		
		// TODO: Handle more complicated tests/cases
		if (substr($the_spot,0, 4) == "http")
		{
			//We need to compare the whole URL
			$current_spot = $the_whole_url;
		}
		else if (substr($the_spot,0, 2) == "//")
		{
			//We need to compare only host and after without taking care of protocol
			
		}
		
		if ($current_spot == $the_spot)
		{
			return;
		}
		else
		{
			if ($redirect == "404")
			{
				ee()->TMPL->show_404();
				exit;
			}
			elseif ($redirect != "")
			{
				ee()->functions->redirect(ee()->functions->create_url(ee()->functions->extract_path('='.$redirect)));
				exit;
			}
			else
			{
				// Default case : redirection to $the_spot
				ee()->functions->redirect(ee()->functions->create_url(ee()->functions->extract_path('='.$the_spot)));
				exit;
			}
		}
		
		
	}
	
	public static function usage()
	{
	ob_start(); 
	?>
		--- Hop Spot Check ---
		
		{exp:hop_spot_check spot="" redirect=""}
		In Spot, you put what you expect the page to be, and it compares that to what the current URL is.
		By default, if there's no match, you get forwarded to the URL of the spot you specified.
		
		redirect="404"
		will redirect the user to the default 404 page

		redirect="template_group/template/whatever"
		will redirect the user to the redirect URL
		
		/!\ NEVER leave a trailing slash (like '/the/path/') on the spot parameter, otherwise you might fall into a redirection loop (and your visitors might not appreciate that ;) )
		
		
		Examples
		
		URL is http://ee.dev/index.php/test/hop_spot_check
		Tag is {exp:hop_spot_check spot="/test/hop_spot_check" }
		
		Result : doing nothing
		
		
		URL is http://ee.dev/index.php/test/hop_spot_check/
		Tag is {exp:hop_spot_check spot="test/hop_spot_check"}
		
		Result : doing nothing
		
		
		URL is http://ee.dev/index.php/test/hop_spot_check/foo/bar
		Tag is {exp:hop_spot_check spot="test/hop_spot_check"}
		
		Result : redirection to http://ee.dev/index.php/test/hop_spot_check
		
		
		URL is http://ee.dev/index.php/test/hop_spot_check
		Tag is {exp:hop_spot_check spot="test/hop_spot_check/foo"}
		
		Result : redirection to http://ee.dev/index.php/test/hop_spot_check/foo

	<?php
		$buffer = ob_get_contents();
	
		ob_end_clean(); 

		return $buffer;
	}
}
