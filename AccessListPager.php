<?php

class AccessListPager extends TablePager
{

    function getQueryInfo()
    {
        $queryInfo = array();


        $queryInfo['tables'] = 'hmb_user';
        $queryInfo['fields'] = array('user_id', 'mask','account', 'flaggroups');

        return $queryInfo;
    }

    function getIndexField(){return "user_id";}

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
        'user_id'   => "Access ID",
        'mask' => "Mask",
        'account' => "NickServ account name",
        'flaggroups' => "Flag group membership"
        );
    }

}
