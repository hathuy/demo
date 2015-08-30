<?php

require_once '../Shared/Constants.php';
require_once Constants::$ConnectDB_url;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function login($acc, $pw) {
    $str = "Select * from user_tbl where Username='" . $acc . "' and Password='" . $pw . "'";
    //$str = "SELECT * FROM user_tbl";

    $query = mysql_query($str, connectdb()) or die(mysql_error());
    while ($r = mysql_fetch_array($query)) {
        $rs[]= $r;
    }
    return $rs;
}
