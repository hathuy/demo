<?php
session_start();

require "../Shared/Constants.php";
require_once Constants::$QL_DM_model_url;
require_once Constants::$ConnectDB_url;
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
        <style type="text/css">
            ul.drop{
                //list-style:none;
                margin:0px;
                padding:0px;
                width:200px;
                border:1px solid #f1f1f1;
            }
            ul.drop li, ul.drop a{ 
                border-bottom:1px solid #fbfbfb;
                height:32px;
                line-height:32px;
                padding-left:5px;
                position:relative;
                display: block;
                //width:150px;
                // text-decoration: none;
                color: darkblue;
            }
            ul.drop li:hover, ul.drop a:hover{
                position: relative;
                display: block;
                background:#fbfbfb;
                color: red;
            }
            ul.drop li > ul.drop{
                position:absolute;
                top:0px; 
                left:200px;
                display:none;
            }
            ul.drop li:hover > ul.drop{
                //position: relative;
                display: block;
            }
        </style>
    </head>
    <body>
        <?php

        function showMenu($lstmenu) {
            $idnhomquyen = $_SESSION['idnhomquyen'];
            echo "<ul class='drop'>";
            if (count($lstmenu) > 0) {
                foreach ($lstmenu as $i) {
                    if (checkExistentQ_NQ($idnhomquyen, $i["IDDM"])) {
                        echo "<li> <a href='#'> " . $i[Constants::$Ten_DM_name] . "</a>";
                        $rs = getDMCon($i[Constants::$ID_DM_name]);
                        if (count($rs) > 0) {
                            showMenu($rs);
                        }
                        echo "</li>";
                    }
                }
            }
            echo "</ul>";
        }

        $rs = getDMCon(0);
        showMenu($rs);
        ?>    
        <!--        <ul class ="drop">
                    <li><a href="">Danh mục 1</a>
                        <ul class="drop">
                            <li><a href="">Danh mục 1.1</a>
                                <ul class="drop">
                                    <li><a href="">Danh mục 1.1.1</a></li>
                                    <li><a href="">Danh mục 1.1.2</a></li>
                                    <li><a href="">Danh mục 1.1.3</a></li>
                                </ul>
                            </li>
                            <li><a href="">Danh mục 1.2</a></li>
                            <li><a href="">Danh mục 1.3</a></li>
                        </ul>
                    </li>
                    <li><a href="">Danh mục 2</a></li>
                    <li><a href="">Danh mục 3</a>
                        <ul class="drop">
                            <li><a href="">Danh mục 3.1</a></li>
                            <li><a href="">Danh mục 3.2</a></li>
                            <li><a href="">Danh mục 3.3</a></li>
                        </ul>
                    </li>
                    <li><a href="">Danh mục 4</a></li>
                    <li><a href="">Danh mục 5</a></li>
                </ul>-->
    </body>
</html>
