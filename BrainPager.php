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
		switch($name){
			case "keyword_name":
			
				return $value;
			case "keyword_value":
				
				return $value;
			case "keyword_action":
				if($value === "0") return $this->msg("hmb-action-no");
				if($value === "1") return $this->msg("hmb-action-yes");
				return $value;
			default:
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
