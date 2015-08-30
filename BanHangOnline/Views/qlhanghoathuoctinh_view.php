<?php
require_once '../Shared/Constants.php';

require_once Constants::$QL_LoaiHH_model_url;
require_once Constants::$QL_HH_model_url;
require_once Constants::$QL_LoaiTT_model_url;
require_once Constants::$QL_TT_model_url;
require_once Constants::$ConnectDB_url;
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
            select
            {
                width: 150px;
            }
        </style>

        <script src="../js/jquery-2.1.1.min.js"></script>
        <script>
            $(document).ready(function() {
                var idloaihh = document.getElementById("select_loaihh").value;
                var idloaitt = document.getElementById("select_loaitt").value;
                var idhh = document.getElementById("select_hh").value;
                var idtt = document.getElementById("select_tt").value;

                $("#select_loaihh").change(function()
                {
                    idtt = document.getElementById("select_tt").value;
                    idloaihh = document.getElementById("select_loaihh").value;
                    window.location = "?idloaihh=" + idloaihh + "&idloaitt=" + idloaitt + "&idhh=" + idhh + "&idtt=" + idtt;
                });

                $("#select_loaitt").change(function()
                {
                    idhh = document.getElementById("select_hh").value;
                    idloaitt = document.getElementById("select_loaitt").value;
                    window.location = "?idloaihh=" + idloaihh + "&idloaitt=" + idloaitt + "&idhh=" + idhh + "&idtt=" + idtt;
                });
            });
        </script>
    </head>
    <body>
        <form action="../Controlers/qlhanghoathuoctinh_ctrl.php" >
            <center>
                <table border="1">
                    <tr>
                        <th style="width:300px;">Lọc theo</th>
                        <th style="width:300px;">Giá trị</th>
                    </tr>
                    <tr>
                        <td>
                            Loại hàng hóa:
                            <select name="select_loaihh" id="select_loaihh">
                                <?php
                                $rs = getAllLoaiHH();
                                $idloaihh = @$_REQUEST['idloaihh'];
                                if ($idloaihh == null) {
                                    $idloaihh = 1;
                                }
                                if (count($rs) > 0) {
                                    foreach ($rs as $r) {
                                        echo "<option value='" . $r['IDLoaiHH'] . "' ";
                                        if ($idloaihh != null) {
                                            if ($r['IDLoaiHH'] == $idloaihh) {
                                                echo "selected";
                                            }
                                        }
                                        echo " > " . $r['TenLoaiHH'] . "</option>";
                                    }
                                }
                                ?>
                            </select>
                        </td>
                        <td>

                            <select name="select_hh" id="select_hh">
                                <?php
                                $rs = getHHbyLoaiHH($idloaihh);
                                $idhh = @$_REQUEST['idhh'];
                                if (count($rs) > 0) {
                                    foreach ($rs as $r) {
                                        echo "<option value='" . $r['IDHH'] . "' ";
                                        if ($idhh != null) {
                                            if ($r['IDHH'] == $idhh) {
                                                echo "selected";
                                            }
                                        }
                                        echo " > " . $r['TenHH'] . "</option>";
                                    }
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Loại thuộc tính:
                            <select name="select_loaitt" id="select_loaitt">
                                <?php
                                $rs = getAllLoaiTT();
                                $idloaitt = @$_REQUEST['idloaitt'];
//                                if ($idloaitt == null) {
//                                    $idloaitt = 5;
//                                }

                                if (count($rs) > 0) {
                                    foreach ($rs as $r) {
                                        echo "<option value='" . $r['IDLoaiTT'] . "' ";
                                        if ($idloaitt != null) {
                                            if ($r['IDLoaiTT'] == $idloaitt) {
                                                echo "selected";
                                            }
                                        }
                                        echo " > " . $r['TenLoaiTT'] . "</option>";
                                    }
                                }
                                ?>
                            </select>
                        </td>
                        <td>
                            <select name="select_tt" id="select_tt">
                                <?php
                                if ($idloaitt != null) {
                                    switch ($idloaitt) {
                                    case 5:
                                        $idtt_name = "IDMS";
                                        $tentt_name = "TenMS";
                                        break;

                                    case 6:
                                        $idtt_name = "IDDVT";
                                        $tentt_name = "TenDVT";
                                        break;
                                }
                                $rs = getTTbyLoaiTT($idloaitt);
                                $idtt = @$_REQUEST['idtt'];
                                if (count($rs) > 0) {
                                    foreach ($rs as $r) {
                                        echo "<option value='" . $r[$idtt_name] . "' ";
                                        if ($idtt != null) {
                                            if ($r[$idtt_name] == $idtt) {
                                                echo "selected";
                                            }
                                        }
                                        echo " > " . $r[$tentt_name] . "</option>";
                                    }
                                }
                                }
                                
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"> Đơn giá: <input type="text" name="txt_dongia" id="txt_dongia" /> </td>
                    </tr>
                    <tr>
                        <td align="right">
                            <input type="submit" value="Thêm"/>
                        </td>
                        <td>
                            <input type="reset" value="Hủy"/>
                        </td>
                    </tr>
                </table>
            </center>
        </form>
    </body>
</html>