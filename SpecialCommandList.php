<?php

class SpecialCommandList extends SpecialPage {
	function __construct() {
		parent::__construct( 'CommandList' );
	}
 
	function execute( $par ) {
		global $wgRequest, $wgOut, $wgScriptPath;
		$wgOut->addModules( 'ext.Helpmebot' );
		$this->setHeaders();
		
		$wgOut->addWikiMsg('hmb-commandlist-headertext');
		
		$out = '<p><span class="accesslistentry-Developer;">Developer</span><br />';
		$out.= '<span class="accesslistentry-Superuser;">Superuser</span><br /> ';
		$out.= '<span class="accesslistentry-Advanced;">Advanced</span><br /> ';
		$out.= '<span class="accesslistentry-Normal;">Normal</span><br /> ';
		$out.= '<span class="accesslistentry-Semiignored;">Semi-ignored</span><br /> ';
		$out.= '<span class="accesslistentry-Ignored;">Ignored</span></p> ';
		
		$pager = new CommandListPager();
		$wgOut->addHTML( $out );
		$wgOut->addHTML( $pager->getNavigationBar() . '<table>' . $pager->getBody() . '</table>' . $pager->getNavigationBar() );
	}
}
