<?php

class SpecialAccessList extends SpecialPage {
	function __construct() {
		parent::__construct( 'AccessList' );
	}
 
	function execute( $par ) {
		global $wgRequest, $wgOut, $wgUser, $wgScriptPath;
		$wgOut->addModules( 'ext.Helpmebot' );
		$this->setHeaders();

		if(! $wgUser->isAllowed('helpmebot-view-ignorelist'))
		{
			$wgOut->addWikiMsg('hmb-accesslist-headertext');
		}
		else 
		{
			$wgOut->addWikiMsg('hmb-ignorelist-headertext');
		}
		
		$out = "";
		
		$out.= '<p><span class="accesslistentry-Developer;">'.wfMessage('hmb-developer')->text().'</span><br />';
		$out.= '<span class="accesslistentry-Superuser;">'.wfMessage('hmb-superuser')->text().'</span><br /> ';
		$out.= '<span class="accesslistentry-Advanced;">'.wfMessage('hmb-advanced')->text().'</span><br /> ';
		$out.= '<span class="accesslistentry-Normal;">'.wfMessage('hmb-normal')->text().'</span><br /> ';
		$out.= '<span class="accesslistentry-Semiignored;">'.wfMessage('hmb-semi-ignored')->text().'</span><br /> ';
		
		
		if(! $wgUser->isAllowed('helpmebot-view-ignorelist'))
		{
			$out.= '<span class="accesslistentry-Ignored;">'.wfMessage('hmb-ignored-hidden')->text().'</span></p> ';
		}
		else 
		{
			$out.= '<span class="accesslistentry-Ignored;">'.wfMessage('hmb-ignored')->text().'</span></p> ';
		}
		
		$pager = new AccessListPager();
		$pager->setLimit(1000);
		$wgOut->addHTML( $out );
		$wgOut->addHTML( '<table>' . $pager->getBody() . '</table>'  );
	}

    function getGroupName() {
        return 'helpmebot';
    }
}
