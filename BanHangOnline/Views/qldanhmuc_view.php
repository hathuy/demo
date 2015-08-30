<?php
require_once '../Shared/Constants.php';

require_once Constants::$QL_DM_model_url;
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
        <style type="text/css">
            /*            div
                        {
                            border: 1px black solid;
                        }*/

            #tbl1 tr:nth-of-type(even)
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
            ul.drop{
                //list-style:none;
                margin:0px;
                padding:5px;
                width:200px;
                //border:1px solid #f1f1f1;
            }
            ul.drop li
            {
                border-right:1px solid;
                border-bottom: 1px solid;
                margin:3px;
                height:32px;
                line-height:32px;
                position:relative;
                display: block;
                width: 200px;
                background: #ffff00;
            }
            ul.drop li a{                                
                //text-decoration: none;
                color: darkblue;                
                float: left;
            }
            ul.drop li:hover,ul.drop li a:hover{
                display:block;
                background: #88ff88;
                color: red;
            }
            ul.drop li > ul.drop{
                position:absolute;
                top:0px; 
                left:200px;
                display:none;
            }
            ul.drop li:hover > ul.drop{
                display:block;
            }        
        </style>
        <script src="../js/jquery-2.1.1.min.js" ></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $("#btn_cancel").click(function() {
                    window.location = "../Views/qldanhmuc_view.php";
                });

                var iddm = document.getElementById("id_dm").value;
                if (iddm.length > 0) {
                    document.getElementById("btn_update").style.display = "inline";
                }
            });
            function validate() {
                $ten = document.getElementById('tenDM').value;

                if ($ten.length == 0)
                {
                    alert("Trường Tên không được để trống");
                    document.getElementById('tenDM').focus();
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
                var id = document.getElementById('id_dm').value;
                var ten = document.getElementById('tenDM').value;
                var iddmcha = document.getElementById('select_IDDM_Cha').value;
                var mota = document.getElementById('motaDM').value;
                window.location = "../Controlers/qldanhmuc_ctrl.php?id=" + id + "&ten=" + ten + "&iddmcha=" + iddmcha + "&mota=" + mota + "&act=edit";
            }
        </script>
    </head>

    <body>
        <!--phần insert-->
        <div style="width:350px; float:left;">
            <center>
                <h1> Quản lý Danh mục </h1>
                <form action="<?php echo Constants::$QL_DM_Ctrl_url; ?>?act=insert" method="POST" onsubmit="return validate()">
                    <table width="300px">
                        <tr>
                            <td>Tên Danh mục: </td>
                            <td> <input type="text" id="tenDM" name="tenDM" value="<?php echo @$_REQUEST['ten']; ?>"> </td>
                        </tr>
                        <tr>
                            <td>Danh mục cha</td>
                            <td>
                                <?php
                                $iddmcha = @$_REQUEST['iddmcha'];
                                ?>
                                <select id="select_IDDM_Cha" name="select_IDDM_Cha">
                                    <option <?php
                                    if ($iddmcha == 0) {
                                        echo "selected";
                                    }
                                    ?> value="0"> Root </option>
                                        <?php
                                        $rs = getAllDM();
                                        if (count($rs) > 0) {
                                            foreach ($rs as $i) {
                                                echo "<option ";
                                                if ($iddmcha == $i[Constants::$ID_DM_name]) {
                                                    echo "selected";
                                                }
                                                echo " value='" . $i[Constants::$ID_DM_name] . "'>";
                                                if ($iddmcha == 0) {
                                                    echo "<li>";
                                                }
                                                echo $i[Constants::$Ten_DM_name];
                                                if ($iddmcha == 0) {
                                                    echo "</li>";
                                                }
                                                echo "</option>";
                                            }
                                        }
                                        ?>

                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Mô tả về Danh mục: </td>
                            <td> <input type="text" id="motaDM" name="motaDM" value="<?php echo @$_REQUEST['mota']; ?>"> </td>
                        </tr>
                        <tr>
                            <td align="right"> <input type="submit" value="Thêm mới"></td>
                            <td> 
                                <input type="button" value="Cập nhật" name="btn_update" id="btn_update" onclick="callCtrl()" />
                                <input type="button" id="btn_cancel" name="btn_cancel" value="Hủy" > 
                            </td>
                        </tr>
                    </table>
                    <input type="text" name="id_dm" id="id_dm" value="<?php echo @$_REQUEST['id']; ?>" />
                </form>

            </center>
        </div>
        <!--Phần hiển thị dữ liệu-->
        <div style="float:left;">
            <center> <h1> Dữ liệu trong bảng hiện tại </h1> </center>
            <table id="tbl1" style="width:500px; padding-left: 50px;">
                <tr>
                    <th>ID Danh mục </th>
                    <th>Tên Danh mục</th>
                    <th>Danh mục Cha </th>
                    <th>Mô tả </th>
                </tr>
                <?php
                $result = getAllDM();
                if (count($result) > 0) {
                    foreach ($result as $i) {
                        echo "<tr>";
                        echo "<td>" . $i[Constants::$ID_DM_name] . "</td>";
                        echo "<td>" . $i[Constants::$Ten_DM_name] . "</td>";
                        echo "<td>" . $i[Constants::$ID_DM_Cha_name] . "</td>";
                        echo "<td>" . $i[Constants::$MoTa_DM_name] . "</td>";
                        echo "<td> <a href='?id=" . $i[Constants::$ID_DM_name] . "&ten=" . $i[Constants::$Ten_DM_name] . "&iddmcha=" . $i[Constants::$ID_DM_Cha_name] . "&mota=" . $i[Constants::$MoTa_DM_name] . "'>Sửa</a></td>";
                        echo "<td> <a href='" . Constants::$QL_DM_Ctrl_url . "?id=" . $i[Constants::$ID_DM_name] . "&act=del' onclick='return confirmDel()'>Xóa</a></td>";
                        echo "</tr>";
                    }
                }
                ?>
            </table>
        </div>


        <!--Hiển thị menu-->
        <?php

        function showMenu($lstdm) {
            echo "<ul class='drop'>";
            if (count($lstdm) > 0) {
                foreach ($lstdm as $i) {
                    echo "<li>";
                    echo "<a>" . $i[Constants::$Ten_DM_name] . "</a>";
                    //kiểm tra xem nó có con hay k, nếu có thì gọi lại chính phương thức này -> đệ qui
                    $lstdmCon = getDMbyIDCha($i[Constants::$ID_DM_name]);
                    if (count($lstdmCon) > 0) {
                        showMenu($lstdmCon);
                    }
                    echo "</li>";
                }
            }
            echo "</ul>";
        }
        ?>
    <center>
        <div style="clear:both; width:1024px; ">
        <?php
        //echo "<div style='clear: both; width:1024px; height:auto;'>";
        echo "<div style='float: left; width: 250px;'>";
        $rs = getDMbyIDCha(0);
        showMenu($rs);
        echo "</div>";
        ?>
        </div>
        <div id="Main" style="width:600px; float:left; height:300px; background: red;" >
            abc
        </div>
    </center>
    </body>

</html>