<?php
require_once '../Shared/Constants.php';
require_once Constants::$QL_NQ_model_url;
require_once Constants::$QL_DM_model_url;
require_once Constants::$QL_Q_NQ_model_url;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<html>
    <head>
        <meta charset="utf-8">
        <script src="../js/jquery-2.1.1.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
//                $("#btn_OK").click(function() {
//                    var cbxVal = $("input[name=cbx]:checked");
//                    var idnhomquyen = $("#txt_idnhomquyen").val();
//                    //cbxVal.each(function() {
//                        //alert(this.value);
//                        window.location = "../Controlers/qlquyennhomquyen_ctrl.php?idnhomquyen="+idnhomquyen+"&iddm="+cbxVal;
//                    //});
//                });

            })
        </script>
    </head>
    <body>
        <form action="../Controlers/qlquyennhomquyen_ctrl.php">
        <!--Hiển thị các nhóm quyền-->
        <div style="width:200px;float: left;">
            <?php
            $rs = getAllNhomQuyen();
            if (count($rs) > 0) {
                foreach ($rs as $r) {
                    echo "<a href='?idnhomquyen=" . $r['IDNhomQuyen'] . "' >" . $r['TenNhomQuyen'] . "</a><br>";                    
                }
            }
            ?>
            <input type="text" name="txt_idnhomquyen" id="txt_idnhomquyen" value="<?php
            $idnhomquyen = @$_REQUEST['idnhomquyen'];
            echo $idnhomquyen; ?>" />
        </div>
        <!--Hiển thị các danh mục-->
        <div style="width:600px; float: left;">
            <?php
            $rs = getAllDM();
            if (count($rs) > 0) {
                foreach ($rs as $r) {
                    echo "<input type='checkbox' ";
                    if(checkExistentQ_NQ($idnhomquyen, $r["IDDM"]))
                    {
                        echo "checked";
                    }
                    echo " name='cbx[]' id='cbx" . $r["IDDM"] . "' value=" . $r["IDDM"] . ">" . $r['TenDM'] . "</input><br>";
                }
            }
            ?>

            <div>
                <input type="submit" name="btn_OK" id="btn_OK" value="OK"/>
            </div>
        </div>
        </form>
<!--        <input type="checkbox" checked name="cbx" id="cbx1" value="1" onclick="getvalueCbx();"> 
        <input type="checkbox" checked name="cbx" id="cbx2" value="2" onclick="getvalueCbx();">-->
    </body>
</html>
