<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Untitled Document</title>
        <style>

            /* CSS Document */
            body{margin:0; font-size:12px; font-family:Arial}
            .mainmenu{width:1000px; height:30px; margin:0 auto}
            .mainmenu ul{padding:0; margin:0}
            .mainmenu ul li{border:1px solid; list-style:none; float:left;margin-left:5px;position:relative;
            }
            .mainmenu ul li a{float:left;padding:7px 15px; text-decoration:none; font-weight:bold; color:#630;
                              text-shadow:1px 1px 2px #FFF;
            }
            /*CSS FOR DI CHUỘT*/
            .mainmenu ul li:hover{border:#06C 1px solid; border-bottom:0;
                                  background:-webkit-gradient(linear,left top, left bottom, from(#AADDF9),to(#06C)); 
            }
            .mainmenu ul li:hover>a{color:#fff;text-shadow:1px 1px 2px #000;}

            .mainmenu ul li:hover>ul{display:block}

            /*CSS FOR SUB MENU*/
            .mainmenu ul ul{position:absolute;width:170px; top:29px; left:-1px; display:none}
            .mainmenu ul ul li{margin:0;width:100%; border-radius:0}

            .mainmenu ul ul ul{left:170px;top:0px}



        </style>
    </head>
    <body>
        <!--MAIN MENU-->
        <div class="mainmenu">
            <ul>
                <li><a href="#">Trang chủ</a></li>
                <li><a href="#">Sách kinh tế</a>
                    <ul>
                        <li><a href="#">Kinh tế học</a></li>
                        <li><a href="#">Kinh doanh hay</a></li>
                        <li><a href="#">Bí quyết chém gió</a>
                            <ul>
                                <li><a href="#">Bí kíp tán gái</a></li>
                                <li><a href="#">Bí kíp chém bão</a></li>
                                <li><a href="#">Đóng của tu luyện</a>
                                    <ul>
                                        <li><a href="#">Luyện dịch cân kinh</a></li>
                                        <li><a href="#">Sư tử hống</a></li>
                                        <li><a href="#">Hàm long 7,8 chưởng</a>
                                            <ul>
                                                <li><a href="#">Quách tĩnh</a></li>
                                                <li><a href="#">Kiều Phong</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><a href="#">Sách mới</a></li>
                <li><a href="#">Đặt sách theo yêu cầu</a></li>
            </ul>
        </div>
        <!--END MAIN MENU-->
    </body>
</html>


