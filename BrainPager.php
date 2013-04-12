<?php

class BrainPager extends TablePager
{

	function getQueryInfo()
	{
		return array(
			'tables' => 'hmb_brain',
			'fields' => '*'
			);
	}

	function getIndexField(){return "keyword_name";}

	function isFieldSortable( $field )
	{ return true; }

	function formatValue( $name, $value )
	{
		$irccolours = array( 
			"3031" => "black",
			"31" => "black",
			"3032" => "navy",
			"32" => "navy",
			"3033" => "green",
			"33" => "green",
			"3034" => "red",
			"34" => "red",
			"3035" => "maroon",
			"35" => "maroon",
			"3036" => "purple",
			"36" => "purple",
			"3037" => "olive",
			"37" => "olive",
			"3038" => "yellow",
			"38" => "yellow",
			"3039" => "lime",
			"39" => "lime",
			"3130" => "teal",
			"3131" => "aqua",
			"3132" => "blue",
			"3133" => "fuchsia",
			"3134" => "gray",
			"3135" => "silver",
			"3136" => "white",
		);
	
		switch($name){
			case "keyword_name":
			
				return $value;
			case "keyword_response":
				$openstack = array();
				$newval = "";
								
				$midcolour = false;
				$backcolour = false;
				$hadcomma = false;
				foreach( str_split(($value)) as $char ) {
					$c = bin2hex($char);				
									
									
					if( $midcolour !== false ) {
						if( $c == "30" ||$c == "31" ||$c == "32" ||$c == "33" ||$c == "34" ||$c == "35" ||$c == "36" ||$c == "37" ||$c == "38" ||$c == "39" )
						{
							if(!$hadcomma)
								$midcolour .= $c;
							else
								$backcolour .= $c;
							
							continue;
						}
						elseif( strtolower($c) == "2c" && ! $hadcomma )
						{
							$hadcomma = true;
							continue;
						}
						else {
							if( ! $hadcomma ) {
								$newval .= "<span style=\"color:" . $irccolours[ $midcolour ] . ";\">";
								$openstack[] = "</span>";
								
							} else {
								// background
								$newval .= "<span style=\"color:" . $irccolours[ $midcolour ] . ";background-color:" . $irccolours[ $backcolour ] . ";\">";
								$openstack[] = "</span>";
							}
							
							// we now want to continue parsing the message.
							$hadcomma = false;
							$midcolour = false;
							$backcolour = false;
						}
					}
				
					switch(strtolower($c)) {
						case "1f":
							$newval .= "<span style=\"text-decoration:underline;\">";
							$openstack[] = "</span>";
							break;
						case "02":
							$newval .= "<span style=\"font-weight:bold;\">";
							$openstack[] = "</span>";
							break;
						case "03":
							$midcolour = "";
							break;
						case "0f":
							foreach( array_reverse($openstack) as $item )
								$newval .= $item;
							
							$openstack = array();
							break;
						default:
							$newval .= $char;
							break;
					}
				}
				return $newval;
			case "keyword_action":
				if($value === "0") return $this->msg("hmb-action-no");
				if($value === "1") return $this->msg("hmb-action-yes");
				return $value;
			default:
				wfWarn("Not used specific switch (for $name) on formatting");
				return $value;
		}
	}

	function getDefaultSort()
	{
		return "";
	}

	function getFieldNames()
	{
		return array(
		
			'keyword_name' => "Keyword",
			'keyword_response' => "Response",
			'keyword_action' => "Action?",
		);
	}

}
