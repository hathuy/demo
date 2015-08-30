<?php
session_start();
require_once '../Shared/Constants.php';
require_once Constants::$Login_model_url;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$acc= $_REQUEST['txt_acc'];
$pw = $_REQUEST['txt_pw'];
echo $acc . $pw;
$rs = login($acc, $pw);

if (count($rs) > 0) {
    foreach($rs as $r)
    {
        $_SESSION['idnhomquyen'] = $r['IDNhomQuyen'];
        
    }
    header("location:../Views/danhmuc.php");
}
else
{
    header("location:".Constants::$Login_View_from_child_url);
}

