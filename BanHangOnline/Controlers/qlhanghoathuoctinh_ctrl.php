<?php
require_once "../Shared/Constants.php";
require_once Constants::$QL_HH_TT_model_url;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$idhh = $_REQUEST['select_hh'];
$idloaitt = $_REQUEST['select_loaitt'];
$idtt = $_REQUEST['select_tt'];
$dongia = $_REQUEST['txt_dongia'];

echo $idhh . "<br>";
echo $idloaitt . "<br>";
echo $idtt . "<br>";
echo $dongia . "<br>";


//gọi phương thức insert vao bang hanghoa_thuoctinh_tbl
if (insert($idhh, $idloaitt, $idtt, $dongia) == 1) {
    header("location: ../Views/qlhanghoathuoctinh_view.php" );
}
else
{
    echo insert($idhh, $idloaitt, $idtt, $dongia);
}