<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once '../Shared/Constants.php';
require_once Constants::$ConnectDB_url;

function getAllNhomQuyen() {
    $str = "select * from nhomquyen_tbl";
    $query = mysql_query($str,  connectdb()) or die(mysql_error());
    if (mysql_num_rows($query) > 0) {
        while ($r = mysql_fetch_array($query)) {
            $rs[] = $r;
        }
    } else {
        $rs = null;
    }

    return $rs;
}
