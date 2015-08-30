<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require '../Shared/Constants.php';
require Constants::$ConnectDB_url;
require Constants::$QL_DM_model_url;

$action = $_REQUEST['act'];
//echo $action ."<br>";

switch ($action) {
    case "insert":
        $ten = $_REQUEST['tenDM'];
        $iddmcha = $_REQUEST['select_IDDM_Cha'];
        $mota = $_REQUEST['motaDM'];
        
        //echo $ten . "  " . $iddmcha . "  " . $mota;

        if ($rs = insertDM($ten, $iddmcha, $mota) == 1) {
            //echo "insert success";
            header("location:" . Constants::$QL_DM_View_from_child_url);
        } else {
            echo $rs;
        }
        break;
        
    case "del":
        //gọi phương thức xóa của model
        $id = $_REQUEST['id'];
        if ($rs = delDM($id) == 1) {
            //echo "insert success";
            header("location:" . Constants::$QL_DM_View_from_child_url);
        } else {
            echo $rs;
        }
        break;
        
    case "edit":
        //gọi phương thức update trong model
        $id = $_REQUEST['id'];
        $ten = $_REQUEST['ten'];
        $iddmcha = $_REQUEST['iddmcha'];
        $mota = $_REQUEST['mota'];
        if ($rs = updateDM($id, $ten, $iddmcha, $mota) == 1) {
            //echo "insert success";
            header("location:" . Constants::$QL_DM_View_from_child_url);
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