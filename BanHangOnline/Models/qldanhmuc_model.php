<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//require '../Shared/Constants.php';
//require Constants::$ConnectDB_url;

function insertDM ($tenDM,$idDMCha, $mota)
{
    $query_str = "Insert into danhmuc_tbl(TenDM, IDDMCha, MoTa) values ('".$tenDM."','".$idDMCha."','" .$mota."')";
    $query_ext = mysql_query($query_str, connectdb()) or die(mysql_error());
    return $query_ext;
}
function getAllDM ()
{
    $query_str = "select * from danhmuc_tbl";
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

function getDMbyIDCha ($iddmCha)
{
    $query_str = "select * from danhmuc_tbl where IDDMCha='".$iddmCha."'";
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

function delDM ($id)
{
    $query_str = "Delete from danhmuc_tbl where IDDM='".$id."'";
    $query_ext = mysql_query($query_str, connectdb()) or die(mysql_error());
    return $query_ext;
    
}

function updateDM($id, $ten,$iddmCha, $mota)
{
    $query_str = "Update danhmuc_tbl set TenDM='".$ten."', IDDMCha='".$iddmCha."', MoTa='".$mota."' Where IDDM='".$id."'";
    $query_ext = mysql_query($query_str, connectdb()) or die(mysql_error());
    return $query_ext;
    
}

function searchDM ($value, $type)
{
    $typesearch = "";
    switch($type)
    {
        case "ID":
            $typesearch = "IDDM";
            break;
        
        case "Ten":
            $typesearch = "TenDM";
            break;
        
        case "iddmcha":
            $typesearch = "IDDMCha";
            break;
        
        case "MoTa":
            $typesearch = "MoTa";
            break;
        
    }
    
    $query_str = "select * from danhmuc_tbl where ".$typesearch."='".$value."'";
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

function getDMCon($iddmcha)
{
    $query_str = "select * from danhmuc_tbl where IDDMCha='".$iddmcha."'";
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

