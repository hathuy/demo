<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function getAllLoaiTT ()
{
    $query_str = "select * from loaithuoctinh_tbl";
    $query_ext = mysql_query($query_str, connectdb()) or die(mysql_error());
    if(mysql_num_rows($query_ext)>0)
    {
        while($r = mysql_fetch_array($query_ext))
        {
            $rs[] = $r;
        }
    }
    else
    {
        $rs = NULL;
    }
    return $rs;
    
}