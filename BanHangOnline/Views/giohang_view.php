<?php
session_start();

require_once '../Shared/Constants.php';
require_once Constants::$QL_HH_model_url;

class giohang {

    public $idhh;
    public $soluong;

}

$giohang = @$_SESSION['giohang'];
$idhh = @$_REQUEST['idhh'];
$act = @$_REQUEST['act'];

switch ($act) {
    case 'add':
        //add vào giỏ hàng
        if ($idhh != null) {
            if (!isset($giohang)) {
                $hh = new giohang;
                $hh->idhh = $idhh;
                $hh->soluong = 1;
                $giohang[] = $hh;
            } else {
                if (count($giohang) > 0) {
                    $existent_hh = false;
                    foreach ($giohang as $hh_obj) {
                        if ($hh_obj->idhh == $idhh) {
                            $hh_obj->soluong += 1;
                            $existent_hh = true;
                        }
                    }
                    if (!$existent_hh) {
                        $hh = new giohang;
                        $hh->idhh = $idhh;
                        $hh->soluong = 1;
                        $giohang[] = $hh;
                    }
                } else {
                    $hh = new giohang;
                    $hh->idhh = $idhh;
                    $hh->soluong = 1;
                    $giohang[] = $hh;
                }
            }

            $_SESSION['giohang'] = $giohang;
        }

        header("location: ../Views/giohang_view.php");

        break;

    case 'edit':
        header("location: ../Views/giohang_view.php");
        break;

    case 'del':
        if ($idhh != null) {
            if (isset($giohang)) {
                if (count($giohang) > 0) {
                    foreach ($giohang as $hh_obj) {
                        if ($hh_obj->idhh != $idhh) {
                            $newgiohang[] = $hh_obj;
                        }
                    }
                    $giohang = $newgiohang;
                }
            }

            $_SESSION['giohang'] = $giohang;
        }

        header("location: ../Views/giohang_view.php");

        break;
}


/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>


<html>
    <head>
        <meta charset="utf-8">

        <style>
            .panel_hh
            {
                width:200px;
                height:250px;
                float: left;
                margin: 4px;

            }
            .panel_img
            {
                height: 200px;
            }
        </style>
    </head>
    <body>
        <div style="width:840px;" >
            <h1> Hiển thị danh sách hàng hóa </h1>
            <?php
            $rs = getAllHH();
            if (count($rs) > 0) {
                foreach ($rs as $r) {
                    echo "<div class='panel_hh' >" . $r['TenHH'] . " "
                    . "<div class='panel_img' style='background-image: url(" . $r['HinhAnh'] . ")' > </div>"
                    . "<a href='?idhh=" . $r["IDHH"] . "&act=add' > Thêm vào giỏ hàng </a>"
                    . " </div>";
                }
            }
            ?>
        </div>

        <div style=' margin-left: 100px;'>
            <?php
            if (isset($giohang)) {
                echo "<table border='1'>";
                echo "<tr>";
                echo "<th style='width:100px;'> Mã Hàng Hóa </th>";
                echo "<th style='width:100px;'> Số lượng </th>";
                echo "<th> </th>";
                echo "</tr>";

                foreach ($giohang as $hh_obj) {
                    echo "<tr>";
                    echo "<td> " . $hh_obj->idhh . "</td>";
                    echo "<td> <input type='text' name='txt_soluong' value='" . $hh_obj->soluong . "' /> </td>";
                    echo "<td> <a href='?idhh=" . $hh_obj->idhh . "&act=del' > Xóa </a>";
                    echo "</tr>";
                }
                echo "</table>";
            }
            ?>
        </div>
    </body>
</html>
