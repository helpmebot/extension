<?php

#ini_set('display_errors',1);

if(!defined('MEDIAWIKI')) {
	echo("This file is an extension to the mediawiki software and cannot be used standalone\n");
	die( 1 );
}

define('NS_COMMAND', 204);
define('NS_COMMAND_TALK', 205);
define('NS_MESSAGE', 206);
define('NS_MESSAGE_TALK', 207);
define('NS_CMDAUTOGEN', 208);
define('NS_CMDAUTOGEN_TALK', 209);

$wgExtensionCredits['specialpage'][] = array(
'path' => __FILE__,
'name' => 'Helpmebot Viewer',
'description' => 'Allows viewing of Helpmebot\'s configuration etc.',
'author' => 'Simon Walker'
);

$wgAvailableRights[] = 'helpmebot-editmessages';
$wgAvailableRights[] = 'helpmebot-editautogen';

$wgExtraNamespaces[NS_COMMAND] = "Command";
$wgExtraNamespaces[NS_COMMAND_TALK] = "Command_talk:";
$wgExtraNamespaces[NS_MESSAGE] = "Message";
$wgExtraNamespaces[NS_MESSAGE_TALK] = "Message_talk:";
$wgExtraNamespaces[NS_CMDAUTOGEN] = "CmdAutogen";
$wgExtraNamespaces[NS_CMDAUTOGEN_TALK] = "CmdAutogen_talk:";

$wgNamespaceProtection[NS_MESSAGE]      = array( 'helpmebot-editmessages' );
$wgNamespaceProtection[NS_CMDAUTOGEN]      = array( 'helpmebot-editautogen' );

$wgAutoloadClasses['SpecialAccessList'] = $IP . '/extensions/Helpmebot/SpecialAccessList.php';
$wgAutoloadClasses['AccessListPager'] = $IP . '/extensions/Helpmebot/AccessListPager.php';

$wgAutoloadClasses['SpecialBrain'] = $IP.'/extensions/Helpmebot/SpecialBrain.php';
$wgAutoloadClasses['BrainPager'] = $IP.'/extensions/Helpmebot/BrainPager.php';

$wgSpecialPages['AccessList'] = 'SpecialAccessList';
$wgSpecialPages['Brain'] = 'SpecialBrain';

$wgExtensionMessagesFiles['Helpmebot'] = $IP . '/extensions/Helpmebot/Helpmebot.i18n.php';

$wgResourceModules['ext.Helpmebot'] = array(
	'styles' => 'modules/hmb.css',
	'position' => 'top',
	'localBasePath' => __DIR__,
	'remoteExtPath' => 'Helpmebot'
);

$wgHelpmebotStyleVersion=6;
