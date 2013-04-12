<?php

class SpecialHelpmebotConfiguration extends SpecialPage {
	function __construct() {
		parent::__construct( 'HelpmebotConfiguration' );
	}
 
	function execute( $par ) {
		global $wgRequest, $wgOut, $wgScriptPath;
		$wgOut->addModules( 'ext.Helpmebot' );
		$this->setHeaders();

		$channel = $wgRequest->getIntOrNull('ircchannel');
		if($channel == null) {
			$wgOut->addWikiMsg('hmb-configuration-headertext');
					
			$pager = new ConfigChannelListPager();
			$wgOut->addHTML( '<table>' . $pager->getBody() . '</table>' );
		}
		else {
			if( $channel == -1 ) {
				$wgOut->addWikiMsg('hmb-configuration-globaltext');
				$pager = new ConfigurationPager();
				$wgOut->addHTML( $pager->getNavigationBar() . '<table>' . $pager->getBody() . '</table>' . $pager->getNavigationBar() );

			} else {
				$wgOut->addWikiMsg('hmb-configuration-channeltext');
			}
		}
	}
}
