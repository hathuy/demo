<?php

require_once '../Shared/Constants.php';
require_once Constants::$QL_Q_NQ_model_url;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$idnhomquyen = $_REQUEST['txt_idnhomquyen'];
$iddm = $_REQUEST['cbx'];

//gọi phương thức delete quyền của nhóm quyền cũ
$rsdel = deleteQ_NQ($idnhomquyen);
if ($rsdel) {
    foreach ($iddm as $i) {

        //gọi phương thức insert dữ liệu vào bảng Quyen_Nhomquyen
        $rs = insertQ_NQ($idnhomquyen, $i);
        echo $rs;
    }
}


