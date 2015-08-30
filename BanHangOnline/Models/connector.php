<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function connectdb()
{
    $conn = NULL;
    if($conn == NULL)
    {
        $conn = mysql_connect("localhost", "root", "") or die(mysql_error());
        mysql_select_db("banhangonline") or die(mysql_error());
        mysql_query("set names 'utf8'");
    }
    return $conn;
}
