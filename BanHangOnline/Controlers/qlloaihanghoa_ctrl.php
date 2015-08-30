<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require '../Shared/Constants.php';
require Constants::$ConnectDB_url;
require Constants::$QL_LoaiHH_model_url;

$action = $_REQUEST['act'];
//echo $action ."<br>";

switch ($action) {
    case "insert":
        $tenLoaiHH = $_REQUEST['tenLoaiHH'];
        $motaLoaiHH = $_REQUEST['motaLoaiHH'];

        if ($rs = insertLoaiHH($tenLoaiHH, $motaLoaiHH) == 1) {
            //echo "insert success";
            header("location:" . Constants::$QL_LoaiHH_View_from_child_url);
        } else {
            echo $rs;
        }
        break;
        
    case "del":
        //gọi phương thức xóa của model
        $idloaihh = $_REQUEST['id'];
        if ($rs = delLoaijHH($idloaihh) == 1) {
            //echo "insert success";
            header("location:" . Constants::$QL_LoaiHH_View_from_child_url);
        } else {
            echo $rs;
        }
        break;
        
    case "edit":
        //gọi phương thức update trong model
        $idloaihh = $_REQUEST['id'];
        $tenloaihh = $_REQUEST['ten'];
        $mota = $_REQUEST['mota'];
        if ($rs = updateLoaiHH($idloaihh, $tenloaihh, $mota) == 1) {
            //echo "insert success";
            header("location:" . Constants::$QL_LoaiHH_View_from_child_url);
        } else {
            echo $rs;
        }
        break;
        
    case "search":
        //gọi phương thức search của model
        $search_value = $_REQUEST['valuesearch'];
        $search_type = $_REQUEST['searchtype'];
        
        $rs = searchLoaiHH($search_value, $search_type);
        
        echo json_encode($rs);
        break;
}




//echo $tenLoaiHH . $motaLoaiHH;