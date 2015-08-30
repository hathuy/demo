<?php

require_once '../Shared/Constants.php';
require_once Constants::$ConnectDB_url;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function insertQ_NQ($idnhomquyen, $iddm) {
    
        $str = "insert into quyen_nhomquyen_tbl(IDDM, IDNhomQuyen) values ('" . $iddm . "', '" . $idnhomquyen . "')";
        $query = mysql_query($str, connectdb()) or die(mysql_error());
        return $query;
    
}

function deleteQ_NQ($idnhomquyen) {
    $str = "delete from quyen_nhomquyen_tbl where IDNhomQuyen ='" . $idnhomquyen . "'";
    $query = mysql_query($str, connectdb()) or die(mysql_error());
    if ($query == 1) {
        $rs = true;
    } else {
        $rs = false;
    }
    return $rs;
}

function checkExistentQ_NQ($idnhomquyen, $iddm) {
    $str = "select * from quyen_nhomquyen_tbl where IDNhomQuyen='" . $idnhomquyen . "' and IDDM='" . $iddm . "'";
    $query = mysql_query($str, connectdb()) or die(mysql_error());
    if (mysql_num_rows($query) > 0) {
        $rs = true;
    } else {
        $rs = false;
    }

    return $rs;
}
