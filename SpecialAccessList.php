<?php

class SpecialAccessList extends SpecialPage {
	function __construct() {
		parent::__construct( 'AccessList' );
	}

	function execute( $par ) {
		global $wgRequest, $wgOut, $wgUser, $wgScriptPath;
		$wgOut->addModules( 'ext.Helpmebot' );
		$this->setHeaders();

		$wgOut->addWikiMsg('hmb-accesslist-headertext');

		$pager = new AccessListPager();
		$pager->setLimit(1000);
		$wgOut->addHTML( '<table>' . $pager->getBody() . '</table>'  );
	}

    function getGroupName() {
        return 'helpmebot';
    }
}
