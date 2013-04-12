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
			"01" => "black",
			"1" => "black",
			"02" => "navy",
			"2" => "navy",
			"03" => "green",
			"3" => "green",
			"04" => "red",
			"4" => "red",
			"05" => "maroon",
			"5" => "maroon",
			"06" => "purple",
			"6" => "purple",
			"07" => "olive",
			"7" => "olive",
			"08" => "yellow",
			"8" => "yellow",
			"09" => "lime",
			"9" => "lime",
			"10" => "teal",
			"11" => "aqua",
			"12" => "blue",
			"13" => "fuchsia",
			"14" => "gray",
			"15" => "silver",
			"16" => "white",
		);
	
		switch($name){
			case "keyword_name":
			
				return $value;
			case "keyword_response":
				$openstack = array();
				$newval = "";
								
				$midcolour = false;
				$hadcomma = false;
				foreach( str_split(($value)) as $char ) {
					$c = bin2hex($char);				
									
									
					if( $midcolour !== false ) {
						if( $char == "0" ||$char == "1" ||$char == "2" ||$char == "3" ||$char == "4" ||$char == "5" ||$char == "6" ||$char == "7" ||$char == "8" ||$char == "9" )
						{
							$midcolour .= $char;
							continue;
						}
						elseif( $char == "," && ! $hadcomma )
						{
							$midcolour .= $char;
							$hadcomma = true;
							continue;
						}
						else {
							if( strpos( $midcolour, "," ) === false ) {
								$newval .= "<span style=\"color:" . $irccolours[ $midcolour ] . ";\">";
								$openstack[] = "</span>";
								
							} else {
								// background
								list($fore, $back) = explode(",", $midcolour);
								$newval .= "<span style=\"color:" . $irccolours[ $fore ] . ";background-color:" . $irccolours[ $back ] . ";\">";
								$openstack[] = "</span>";
							}
							
							// we now want to continue parsing the message.
							$hadcomma = false;
							$midcolour = false;
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
