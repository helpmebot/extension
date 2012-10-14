<?php

class ConfigurationPager extends TablePager
{

	function getQueryInfo()
	{
		return array(
			'tables' => 'hmb_globalconfig',
			'fields' => array('configuration_id', 'configuration_name','configuration_description', 'configuration_value')
			);
	}

	function getIndexField(){return "configuration_name";}

	//function getRowClass($row){return "accesslistentry-" . $row->user_accesslevel; }

	function isFieldSortable( $field )
	{ return false; }

	function formatValue( $name, $value )
	{
		return $value;
	}

	function getDefaultSort()
	{
		return ""; //user_accesslevel";
	}

	function getFieldNames()
	{
		return array(
			'configuration_id' => "id", 
			'configuration_name' => "name",
			'configuration_description' => "desc", 
			'configuration_value' => "val"
			);
	}

}
