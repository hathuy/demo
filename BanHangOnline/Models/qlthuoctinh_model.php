<?php

require_once '../Shared/Constants.php';
require_once Constants::$ConnectDB_url;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
*/

function getTTbyLoaiTT($idloaitt) {
    switch ($idloaitt) {
        case 5:
            $tbl_name = "mausac_tbl";
            break;

        case 6:
            $tbl_name = "donvitinh_tbl";
            break;
    }

    $query_str = "select * from ".$tbl_name;

    $query_exc = mysql_query($query_str, connectdb()) or die(mysql_error());

    if (mysql_num_rows($query_exc) > 0) {
        while ($r = mysql_fetch_array($query_exc)) {
            $rs[] = $r;
        }
    } else {
        $rs = null;
    }

    return $rs;
}
