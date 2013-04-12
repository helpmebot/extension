<?php

class SpecialBrain extends SpecialPage {
	function __construct() {
		parent::__construct( 'Brain' );
	}
 
	function execute( $par ) {
		global $wgRequest, $wgOut, $wgScriptPath;
		$wgOut->addModules( 'ext.Helpmebot' );
		$this->setHeaders();
 
		$wgOut->addWikiMsg('hmb-brain-headertext');

		$pager = new BrainPager();
		$wgOut->addHTML( $pager->getNavigationBar() . '<table>' . $pager->getBody() . '</table>' . $pager->getNavigationBar() );
	}
}
