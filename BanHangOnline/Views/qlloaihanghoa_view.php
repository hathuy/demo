<?php
require '../Shared/Constants.php';
require_once Constants::$QL_LoaiHH_model_url;
require_once Constants::$ConnectDB_url;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<html>
    <head>
        <meta charset="utf-8" >
        <script src="../js/jquery-2.1.1.min.js" ></script>
        <style type="text/css">
            /*            div
                        {
                            border: 1px black solid;
                        }*/

            #tbl1 tr:nth-of-type(odd)
            {
                background: #33ffff;
            }
            
            #search_rs tr:nth-of-type(odd)
            {
                background: #33ffff;
            }

            #btn_update
            {
                display:none;
            }
        </style>

        <script type="text/javascript">
            $(document).ready(function() {
                var idloaihh = document.getElementById("id_loai_hh").value;

                if (idloaihh.length > 0) {
                    document.getElementById("btn_update").style.display = "inline";
                }

                $("#btn_cancel").click(function() {
                    window.location = "../Views/qlloaihanghoa_view.php";
                });

                $("#btn_search").click(function() {
                    var search_value = $("#txt_search").val();
                    var search_type = $("input[name=radio_search]:checked").val();

//                window.location = "../Controlers/qlloaihanghoa_ctrl.php?valuesearch=" + search_value + "&searchtype=" + search_type+ "&act=search";

                    $.ajax({
                        url: "../Controlers/qlloaihanghoa_ctrl.php",
                        type: "POST",
                        data:
                                {
                                    "act": "search",
                                    "valuesearch": search_value,
                                    "searchtype": search_type
                                },
                        success: function(r) {
                            //alert(r);
                            var rs = $.parseJSON(r);
                            //alert(r);
                            document.getElementById("search_rs").innerHTML =
                                    "<tr>"
                                    + "<th>ID</th>"
                                    + "<th>Tên Loại hàng hóa</th>"
                                    + "<th>Mô tả</th>"
                                    + "</tr>";
                            for (var i = 0; i < rs.length; i++)
                            {
                                //document.getElementById("search_result").innerHTML +=
                                $("#search_rs").append(
                                        "<tr>"
                                        + "<td>"
                                        + rs[i].IDLoaiHH
                                        + "</td>"
                                        + "<td>"
                                        + rs[i].TenLoaiHH
                                        + "</td>"
                                        + "<td>"
                                        + rs[i].MoTa
                                        + "</td>"
                                        + "</tr>");
                            }
//                            alert(kq[0].IDLoaiHH]);
////                            for (var i = 0; i < rs.length; i++)
////                            {
////                                alert($rs[i].IDLoaiHH);
////                            }                            
                        },
                        error: function() {
                            alert('Có lỗi xảy ra');
                        }
                    });
                });
            });

            function validate() {
                $tenLoaiHH = document.getElementById('tenLoaiHH').value;

                if ($tenLoaiHH.length == 0)
                {
                    alert("Trường Tên không được để trống");
                    document.getElementById('tenLoaiHH').focus();
                    return false;
                }
            }

            function confirmDel()
            {
                if (confirm("Bạn có chắc chắn muốn xóa bản ghi này") === true)
                {
                    return true;
                }
                else
                {
                    return false;
                }
            }

            function callCtrl()
            {
                var idLoaiHH = document.getElementById('id_loai_hh').value;
                var tenLoaiHH = document.getElementById('tenLoaiHH').value;
                var motaLoaiHH = document.getElementById('motaLoaiHH').value;
                window.location = "../Controlers/qlloaihanghoa_ctrl.php?id=" + idLoaiHH + "&ten=" + tenLoaiHH + "&mota=" + motaLoaiHH + "&act=edit";
            }


        </script>
    </head>
    <body>
        <!--phần insert-->
        <div style="width:350px; float:left;">
            <center>
                <h1> Quản lý loại hàng hóa </h1>
                <form action="<?php echo Constants::$QL_LoaiHH_Ctrl_url; ?>?act=insert" method="POST" onsubmit="return validate()">
                    <table width="300px">
                        <tr>
                            <td>Tên Loại Hàng hóa: </td>
                            <td> <input type="text" id="tenLoaiHH" name="tenLoaiHH" value="<?php echo @$_REQUEST['ten']; ?>"> </td>
                        </tr>
                        <tr>
                            <td>Mô tả về Loại Hàng hóa: </td>
                            <td> <input type="text" id="motaLoaiHH" name="motaLoaiHH" value="<?php echo @$_REQUEST['mota']; ?>"> </td>
                        </tr>
                        <tr>
                            <td align="right"> <input type="submit" value="Thêm mới"></td>
                            <td> 
                                <input type="button" value="Cập nhật" name="btn_update" id="btn_update" onclick="callCtrl()" />
                                <input type="button" id="btn_cancel" name="btn_cancel" value="Hủy" > 
                            </td>
                        </tr>
                    </table>
                    <input type="hidden" name="id_loai_hh" id="id_loai_hh" value="<?php echo @$_REQUEST['id']; ?>" />
                </form>

            </center>
        </div>

        <!--Phần hiển thị dữ liệu-->
        <div style="float:left;">
            <center> <h1> Dữ liệu trong bảng hiện tại </h1> </center>
            <table id="tbl1" style="width:500px; padding-left: 50px;">
                <tr>
                    <th>ID Loại hàng hóa </th>
                    <th>Tên loại hàng hóa</th>
                    <th>Mô tả </th>
                </tr>
                <?php
                $result = getAllLoaiHH();
                if (count($result) > 0) {
                    foreach ($result as $i) {
                        echo "<tr>";
                        echo "<td>" . $i[Constants::$ID_LoaiHH_name] . "</td>";
                        echo "<td>" . $i['TenLoaiHH'] . "</td>";
                        echo "<td>" . $i['MoTa'] . "</td>";
                        echo "<td> <a href='?id=" . $i[Constants::$ID_LoaiHH_name] . "&ten=" . $i['TenLoaiHH'] . "&mota=" . $i['MoTa'] . "'>Sửa</a></td>";
                        echo "<td> <a href='" . Constants::$QL_LoaiHH_Ctrl_url . "?id=" . $i[Constants::$ID_LoaiHH_name] . "&act=del' onclick='return confirmDel()'>Xóa</a></td>";
                        echo "</tr>";
                    }
                }
                ?>
            </table>
        </div>
        <!-- tìm kiếm loại hàng hóa -->
        <div>
            <center>
                <table>
                    <tr>
                        <td>Nhập vào giá trị tìm kiếm: </td>
                        <td><input type="text" name="txt_search" id="txt_search" /></td>
                    </tr>
                    <tr>
                        <td>Lựa chọn tiêu chí tìm kiếm: </td>
                        <td>
                            <input type="radio" checked name="radio_search" value="ID" > ID </input>
                            <input type="radio" name="radio_search" value="Ten" > Ten </input>
                            <input type="radio" name="radio_search" value="MoTa" > Mota </input>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"> <input type="button" name="btn_search" id="btn_search" value="Tìm kiếm" /> </td>
                    </tr>
                </table>

                <table style="border:1px black; width: 300px;" id="search_rs" name="search_rs" >

                </table>
            </center>
        </div>

    </body>
</html>