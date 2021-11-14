<?php

#ini_set('display_errors',1);

if(!defined('MEDIAWIKI')) {
	echo("This file is an extension to the mediawiki software and cannot be used standalone\n");
	die( 1 );
}

define('NS_MESSAGE', 206);
define('NS_MESSAGE_TALK', 207);

$wgExtensionCredits['specialpage'][] = array(
'path' => __FILE__,
'name' => 'Helpmebot Viewer',
'description' => 'Allows viewing of Helpmebot\'s configuration etc.',
'author' => 'Simon Walker'
);

$wgAvailableRights[] = 'helpmebot-editmessages';

$wgExtraNamespaces[NS_MESSAGE] = "Message";
$wgExtraNamespaces[NS_MESSAGE_TALK] = "Message_talk:";

$wgNamespaceProtection[NS_MESSAGE]      = array( 'helpmebot-editmessages' );

$wgAutoloadClasses['SpecialAccessList'] = $IP . '/extensions/Helpmebot/SpecialAccessList.php';
$wgAutoloadClasses['AccessListPager'] = $IP . '/extensions/Helpmebot/AccessListPager.php';

$wgSpecialPages['AccessList'] = 'SpecialAccessList';

$wgExtensionMessagesFiles['Helpmebot'] = $IP . '/extensions/Helpmebot/Helpmebot.i18n.php';

$wgResourceModules['ext.Helpmebot'] = array(
	'styles' => 'modules/hmb.css',
	'position' => 'top',
	'localBasePath' => __DIR__,
	'remoteExtPath' => 'Helpmebot'
);

$wgHelpmebotStyleVersion=6;
