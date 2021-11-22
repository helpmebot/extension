<?php

#ini_set('display_errors',1);

if(!defined('MEDIAWIKI')) {
	echo("This file is an extension to the mediawiki software and cannot be used standalone\n");
	die( 1 );
}

$wgExtensionCredits['specialpage'][] = array(
'path' => __FILE__,
'name' => 'Helpmebot Viewer',
'description' => 'Deprecated and no longer required for Helpmebot deployments',
'author' => 'Simon Walker'
);
