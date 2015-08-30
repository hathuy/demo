<?php

require_once "../Shared/Constants.php";
require_once Constants::$ConnectDB_url;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function insert ($idhh, $idloaitt, $idtt, $dongia)
{
    $query_str = "insert into hanghoa_thuoctinh_tbl (IDLoaiTT, IDTT, IDHH, DonGia) values ('".$idloaitt."', '".$idtt."', '".$idhh."', '".$dongia."')";
    $query_exc = mysql_query($query_str, connectdb()) or die(mysql_error());
    
    return $query_exc;
}