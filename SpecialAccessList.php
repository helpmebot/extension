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
		
		$out.= '<p><span class="accesslistentry-Developer;">'.wfMsg('hmb-developer').'</span><br />';
		$out.= '<span class="accesslistentry-Superuser;">'.wfMsg('hmb-superuser').'</span><br /> ';
		$out.= '<span class="accesslistentry-Advanced;">'.wfMsg('hmb-advanced').'</span><br /> ';
		$out.= '<span class="accesslistentry-Normal;">'.wfMsg('hmb-normal').'</span><br /> ';
		$out.= '<span class="accesslistentry-Semiignored;">'.wfMsg('hmb-semi-ignored').'</span><br /> ';
		
		
		if(! $wgUser->isAllowed('helpmebot-view-ignorelist'))
		{
			$out.= '<span class="accesslistentry-Ignored;">'.wfMsg('hmb-ignored-hidden').'</span></p> ';
		}
		else 
		{
			$out.= '<span class="accesslistentry-Ignored;">'.wfMsg('hmb-ignored').'</span></p> ';
		}
		
		$pager = new AccessListPager();
		$pager->setLimit(1000);
		$wgOut->addHTML( $out );
		$wgOut->addHTML( '<table>' . $pager->getBody() . '</table>'  );
	}
}
