<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//require '../Shared/Constants.php';
//require Constants::$ConnectDB_url;

function insertLoaiHH ($tenLoaiHH, $motaLoaiHH)
{
    $query_str = "Insert into loaihanghoa_tbl(TenLoaiHH, MoTa) values ('".$tenLoaiHH."','".$motaLoaiHH."')";
    $query_ext = mysql_query($query_str, connectdb()) or die(mysql_error());
    return $query_ext;
}
function getAllLoaiHH ()
{
    $query_str = "select * from loaihanghoa_tbl";
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

function delLoaijHH ($idloaihh)
{
    $query_str = "Delete from loaihanghoa_tbl where IDLoaiHH='".$idloaihh."'";
    $query_ext = mysql_query($query_str, connectdb()) or die(mysql_error());
    return $query_ext;
    
}

function updateLoaiHH($id, $ten, $mota)
{
    $query_str = "Update loaihanghoa_tbl set TenLoaiHH='".$ten."', MoTa='".$mota."' Where IDLoaiHH='".$id."'";
    $query_ext = mysql_query($query_str, connectdb()) or die(mysql_error());
    return $query_ext;
    
}

function searchLoaiHH ($value, $type)
{
    $typesearch = "";
    switch($type)
    {
        case "ID":
            $typesearch = "IDLoaiHH";
            break;
        
        case "Ten":
            $typesearch = "TenLoaiHH";
            break;
        
        case "MoTa":
            $typesearch = "MoTa";
            break;
        
    }
    
    $query_str = "select * from loaihanghoa_tbl where ".$typesearch."='".$value."'";
    //return $query_str;
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

