<?php
header("Content-type: text/html; charset=UTF-8");
$group = $_GET['group'];
# Server Test Announcement

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="new_index_assets/lib/jquery-3.4.1.slim.min.js"></script>
    <script src="new_index_assets/lib/popper.min.js"></script>
    <script src="new_index_assets/lib/bootstrap.min.js"></script>
    <script src="new_index_assets/lib/vue.js"></script>
    <script src="new_index_assets/lib/dayjs.min.js"></script>
    <script src="new_index_assets/lib/th.js"></script>
    <script src="new_index_assets/lib/axios.min.js"></script>
    <script src="new_index_assets/lib/polyfill.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="new_index_assets/css/master.css">
    <link rel="stylesheet" href="new_index_assets/css/testing.css">
    <link rel="stylesheet" href="new_index_assets/font/icofont/icofont.min.css">
    <meta name="description" content="ระบบสารสนเทศ สำนักทะเบียนและประมวลผล สถาบันเทคโนโลยีพระจอมเกล้าคุณทหารลาดกระบัง
    - Information System, Office of the Registrar, King Mongkut's Institute of Technology Ladkrabang">
    <title>สำนักทะเบียนและประมวลผล สถาบันเทคโนโลยีพระจอมเกล้าคุณทหารลาดกระบัง</title>
    <style>
    /* The popup form - hidden by default */
    .form-popup {
        display: none;
        margin: auto;
        width: 50%;
        border: 3px solid #f1f1f1;
        z-index: 9;
    }

    /* Add styles to the form container */
    .form-container {

        max-width: 100%;
        padding: 10px;
        background-color: white;
    }

    /* Full-width input fields */
    .form-container input[type=text],
    .form-container input[type=password] {
        width: 100%;
        padding: 15px;
        margin: 5px 0 22px 0;
        border: none;
        background: #f1f1f1;
    }

    /* When the inputs get focus, do something */
    .form-container input[type=text]:focus,
    .form-container input[type=password]:focus {
        background-color: #ddd;
        outline: none;
    }

    /* Set a style for the submit/login button */
    .form-container .btn {
        background-color: #04AA6D;
        color: white;
        padding: 16px 20px;
        border: none;
        cursor: pointer;
        width: 100%;
        margin-bottom: 10px;
        opacity: 0.8;
    }

    /* Add a red background color to the cancel button */
    .form-container .cancel {
        background-color: red;
    }

    /* Add some hover effects to buttons */
    .form-container .btn:hover,
    .open-button:hover {
        opacity: 1;
    }

    .red {
        color: red;
        -webkit-text-stroke-color: black;
    }

    .black {
        color: black;
        -webkit-text-stroke-color: white;
    }

    .blue {
        color: blue;
        -webkit-text-stroke-color: white;
    }

    .green {
        color: green;
        -webkit-text-stroke-color: white;
    }
    </style>

</head>

<body>
    <div id="app">
        <div class="container-xl reg-page">
            <!-- Mobile Tools bar -->
            <div class="d-block d-sm-none" style="z-index: 2;">
                <div class="reg-nav text-white reg-main-logo-small">
                    <div class="btn-group btn-group-toggle">
                        <label class="btn btn-sm btn-outline-light" v-bind:class="{ active: language === 'en'}">
                            <input type="radio" name="options" id="option1" v-on:click="changeLanguage('en')"> ENG
                        </label>
                        <label class="btn btn-sm btn-outline-light" v-bind:class="{ active: language === 'th'}">
                            <input type="radio" name="options" id="option2" v-on:click="changeLanguage('th')"> ไทย
                        </label>
                    </div>
                    <div>
                        <a href="#">
                            <button class="btn btn-sm btn-outline-light" style="position: relative; top: -5px;"
                                id="toggler-login" type="button" data-toggle="collapse" data-target="#navbarToggleLogin"
                                v-show="!isLoggedIn">
                                <i class="icofont-login"></i> {{ t('Login', 'เข้าสู่ระบบ') }}
                            </button>
                        </a>
                        <a href="#">
                            <button class="btn btn-sm btn-outline-light" style="position: relative; top: -5px;"
                                id="toggler-user" type="button" data-toggle="collapse" data-target="#navbarToggleUser"
                                v-show="isLoggedIn">
                                <i class="icofont-ui-user"></i> {{user_name}} <i class="icofont-caret-down"></i>
                            </button>
                        </a>
                        <a href="#">
                            <button class="navbar-toggler" id="toggler-menu" type="button" data-toggle="collapse"
                                data-target="#navbarToggleMenu">
                                <i class="icofont-navigation-menu reg-text-menulist"></i>
                            </button>
                        </a>
                    </div>
                </div>
                <div class="reg-height-title-kmitl-small"></div>
            </div>
            <!-- ---------------------------------------------------------- -->

            <!-- Nav Bar-->
            <div class="reg-nav text-white d-block bg-primary">
                <img src="new_index_assets/img/logo/main.png" alt="" class="d-none d-md-block reg-main-logo-full">
                <div class="row">
                    <div class="col-2 d-none d-md-block"></div>
                    <div class="col-12 col-sm-8 col-md-6">
                        <div class="d-none d-sm-block">{{ t('Office of the Registrar', 'สำนักทะเบียนและประมวลผล') }}
                        </div>
                        <div class="d-block d-sm-none h3">{{ t('Office of the Registrar', 'สำนักทะเบียนและประมวลผล') }}
                        </div>
                    </div>
                    <div class="col-4 text-right d-none d-sm-block">
                        <div class="btn-group btn-group-toggle">
                            <label class="btn btn-outline-light" v-bind:class="{ active: language === 'en'}">
                                <input type="radio" name="options" id="option1" v-on:click="changeLanguage('en')"> ENG
                            </label>
                            <label class="btn btn-outline-light" v-bind:class="{ active: language === 'th'}">
                                <input type="radio" name="options" id="option2" v-on:click="changeLanguage('th')"> ไทย
                            </label>
                        </div>

                        <!-- <a href="../user/" v-show="!isLoggedIn">
                            <span class="btn btn-outline-light h6 mt-2">
                                <i class="icofont-login"></i> {{ t('Login', 'เข้าสู่ระบบ') }}
                            </span>
                        </a> -->

                        <div class="dropdown d-inline-block">
                            <span class="btn btn-outline-light h6 mt-2" id="test" data-toggle="dropdown"
                                v-show="!isLoggedIn">
                                <i class="icofont-login"></i> {{ t('Login', 'เข้าสู่ระบบ') }}
                            </span>

                            <div class="dropdown-menu" aria-labelledby="test">
                                <a href="../user/" class="dropdown-item">
                                    {{ t('Login to the system', 'เข้าสู่ระบบปัจจุบัน') }}
                                </a>
                                <a href="https://new.reg.kmitl.ac.th/reg/" target="_blank" class="dropdown-item">
                                    {{ t('Direct to Registration system (Bachelor)', 'เข้าสู่ระบบลงทะเบียน (ระดับปริญญาตรี)') }}
                                </a>
                            </div>
                        </div>

                        <div class="dropdown d-inline-block">
                            <span class="btn btn-primary h6 mt-2" id="dropdownMenuButtonLoggedIn" data-toggle="dropdown"
                                v-show="isLoggedIn">
                                <i class="icofont-ui-user"></i> {{user_name}} <i class="icofont-caret-down"></i>
                            </span>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButtonLoggedIn">
                                <a href="https://new.reg.kmitl.ac.th/reg/" target="_blank" class="dropdown-item">
                                    {{ t('Direct to Registration system (Bachelor)', 'เข้าสู่ระบบลงทะเบียน (ระดับปริญญาตรี)') }}
                                </a>
                                <a v-for="item in userMenu" v-show="isLoggedIn" class="dropdown-item"
                                    v-bind:href="item.path">
                                    {{ t(item.textEN, item.textTH) }}
                                </a>
                                <a href="../user/logout.php" class="dropdown-item text-danger">
                                    {{ t('Logout', 'ออกจากระบบ') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ---------------------------------------------------------- -->

            <!-- Subtitle -->
            <div class="reg-nav text-white reg-title-kmitl d-block pt-1 pb-0">
                <div class="row">
                    <div class="col-md-2 d-none d-md-block"></div>
                    <div class="col h6">
                        {{ t('King Mongkut’s Institute of Technology Ladkrabang', 'สถาบันเทคโนโลยีพระจอมเกล้าเจ้าคุณทหารลาดกระบัง') }}
                    </div>
                </div>
            </div>

            <!-- ---------------------------------------------------------- -->

            <!-- Drawer -->
            <div class="collapse" id="navbarToggleLogin">
                <div class="bg-dark p-4">
                    <a href="../user/">
                        <div class="reg-menu-small">
                            {{ t('Login to the system', 'เข้าสู่ระบบปัจจุบัน') }}
                        </div>
                    </a>
                    <a href="https://new.reg.kmitl.ac.th/reg/" target="_blank">
                        <div class="reg-menu-small">
                            {{ t('Direct to Registration system (Bachelor)', 'เข้าสู่ระบบลงทะเบียน (ระดับปริญญาตรี)') }}
                        </div>
                    </a>
                </div>
            </div>

            <div class="collapse" id="navbarToggleUser" v-show="isLoggedIn">
                <div class="bg-dark p-4">
                    <a href="https://new.reg.kmitl.ac.th/reg/" target="_blank">
                        <div class="reg-menu-small">
                            {{ t('Direct to Registration system (Bachelor)', 'เข้าสู่ระบบลงทะเบียน (ระดับปริญญาตรี)') }}
                        </div>
                    </a>
                    <a v-for="item in userMenu" v-bind:href="item.path">
                        <div class="reg-menu-small">
                            {{ t(item.textEN, item.textTH) }}
                        </div>
                    </a>
                    <a href="../user/logout.php">
                        <div class="reg-menu-small text-danger">
                            {{ t('Logout', 'ออกจากระบบ') }}
                        </div>
                    </a>
                </div>
            </div>

            <div class="collapse" id="navbarToggleMenu">
                <div class="bg-dark p-4">
                    <div v-for="item in navButtonsAll">
                        <a v-bind:href="item.url" v-if="!item.children">
                            <div class="reg-menu-small">
                                {{ t(item.textEN, item.textTH) }}
                            </div>
                        </a>
                        <a v-for="item2 in item.children" v-bind:href="item2.url" v-if="item.children">
                            <div class="reg-menu-small">
                                {{ t(item2.textEN, item2.textTH) }}
                            </div>
                        </a>
                    </div>
                    <a href="../index" id="'_menu_bar'">
                        <div class="reg-menu-small">
                            <i class="icofont-home"></i>
                        </div>
                    </a>
                </div>
            </div>
            <!-- ---------------------------------------------------------- -->

            <!-- Menu Bar -->
            <div class="reg-nav reg-nav-2 text-white reg-datetime-bg">
                <div class="reg-datetime-width">
                    <div class="reg-text-datetime">
                        {{currentDateTime}}
                    </div>
                </div>
            </div>

            <div class="d-none d-sm-block">
                <div class="d-xs-none d-block pt-3">
                    <span v-for="item in navButtonsAll">
                        <a v-bind:href="item.url" id="item.textEN+'_menu_bar'"
                            :data-toggle="item.children ? 'dropdown' : ''" v-bind:target="item.target">
                            <div class="btn reg-nav-button pl-2 pr-2 pt-2 pb-2 mb-1" style="border:0px transparent;">
                                <i class="icofont-caret-right text-primary" v-show="!item.children"></i>
                                <i class="icofont-caret-down text-primary" v-show="item.children"></i>
                                {{ t(item.textEN, item.textTH) }}
                            </div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="item.textEN+'_menu_bar'" v-if="item.children">
                            <a v-for="item2 in item.children" v-bind:href="item2.url" class="dropdown-item"
                                v-bind:target="item2.target">
                                {{ t(item2.textEN, item2.textTH) }}
                            </a>
                        </div>
                    </span>
                    <a href="../index" id="'_menu_bar'">
                        <div class="btn reg-nav-button" style="border:0px transparent; float: right;">
                            <i class="icofont-home"></i>
                        </div>
                    </a>
                </div>
            </div>


            <!-- Content -->
            <div class="reg-page">
                <table width="100%" style="background: #c9c9c9;" border="0" cellspacing="0" cellpadding="0" height="48">
                    <tbody>
                        <tr>
                            <td width="245" height="4"></td>
                            <td width="776"></td>
                        </tr>
                        <tr>
                            <td height="27" style="text-align: center;font-size:25px; padding:10px;"><i
                                    class="icofont-newspaper "></i> ข่าว-ประกาศล่าสุด</td>
                            <td>
                                <div id="comment_update" style="display: block; padding:7px;"
                                    onmouseout="initNewsFeed();" onmouseover="skipxNewsFeed();">
                                    <ul id="ticker_04" class="ticker">
                                        <li v-for="item in commentUp" style="display: list-item; ">
                                            <a href="item.href" target="_self">
                                                <font color="#FFFFFF" style="font-size:16px;">
                                                    {{ t(item.textEN, item.textTH) }}
                                                </font>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div style="margin:20px;display:block;">
                    <a href="#" style="float:right;" target="_blank">
                        <div class="btn d-button">กระทู้ของ นศ.</div>
                    </a>
                    <a href="#" onclick="openForm()" style="float:right;">
                        <div class="btn d-button">ตั้งกระทู้ใหม่</div>
                    </a>
                    <form class="form-popup" id="myForm">
                        <div class="form-container">
                            <label for="topic"><b>หัวข้อ :</b></label>
                            <input type="text" id="topic" placeholder="Enter Topic" name="topic" required>
                            <label for="detail"><b>รายละเอียด :</b></label>
                            <textarea style="width: 100%; height: 215px;" cols="80" rows="5" type="text" id="detail"
                                placeholder="Enter Detail" name="detail" required></textarea>
                            <label for="email"><b>อีเมล์ :</b></label>
                            <input type="text" id="email" placeholder="Enter Email" name="email" required>


                            <button v-on:click="submit_post(this)" class="btn">บันทึก</button>
                            <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
                        </div>
                    </form>
                    <p style="color:red;">***โปรดล็อคอินเพื่อตั้งกระทู้***</p>

                </div>

                <div class="reg-card-min-height" style="min-height:1050px;">
                    <div class="card-body con-margin">
                        <div class="card w-75 m-auto" style="background:#f89248;">
                            <div class="font-weight-bolder h5 m-4" style="display:flex;margin:10px !important; ">

                                <img src="new_index_assets/img/logo/main.png" alt=""
                                    class="reg-height-title-kmitl-very-small ">
                                <div class="card-doc-head">
                                    {{ t('Webboard','เว็บบอร์ด') }}
                                </div>
                                <div class="h6"
                                    style="margin-top: 5px; display:block; color:#FFF;margin-left:5px;font-weight: bolder !important;">
                                    {{ t('','สำนักทะเบียนฯ') }}
                                </div>
                            </div>
                        </div>
                        <div v-for="(item,index) in postAll" class="card w-75 m-auto">
                            <a v-bind:href='item.url' v-on:click="setHit(item.date)" class="card-body">
                                <h5 class="card-title">
                                    <div id='newItem' v-if="index == 0" style=" display:inline-block">
                                        NEW
                                    </div>
                                    {{ item.topic }}
                                </h5>
                                <i class="icofont-eye text-primary m-1" style="float: left;"> {{ item.views }} </i>
                                <i class="icofont-comment text-primary m-1" style="float: left;"> {{ item.count }} </i>
                                <i style="float: right;">วันที่ตอบล่าสุด {{ item.commentDate }}</i>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- ---------------------------------------------------------- -->

        <div class="text-light reg-footer-top bg-primary">

        </div>
        <div class="text-light reg-footer-bottom">
            <div class="row">
                <div class="col-12 col-lg-6 pt-3">
                    <h2>{{ t('Office of the Registrar', 'สำนักทะเบียนและประมวลผล') }}</h2>
                    {{ t('King Mongkut’s Institute of Technology Ladkrabang', 'สถาบันเทคโนโลยีพระจอมเกล้าเจ้าคุณทหารลาดกระบัง') }}<br>
                    {{ t('2nd floor, Krom Luang Naratiwas Rachanakarin Building', 'ชั้น 2 อาคารกรมหลวงนราธิวาสราชนครินทร์') }}<br>
                    {{ t('1 Soi Chalong Krung 1', 'เลขที่ 1 ซอยฉลองกรุง 1') }}<br>
                    {{ t('Ladkrabang Subdistrict, Ladkrabang District', 'แขวงลาดกระบัง เขตลาดกระบัง') }}<br>
                </div>

                <div class="col-12 col-lg-6 pt-3">
                    <hr style="border-color: aliceblue;" class="d-lg-none">

                    <a href="http://www.facebook.com/reg.kmitl" target="blank" class="btn btn-outline-light mb-3">
                        <span class="h4"><i class="icofont-facebook"></i></span>
                        {{ t('Reg.KMITL', 'สำนักทะเบียนฯ') }}
                    </a>
                    <a href="http://www.facebook.com/Admission.KMITL" target="blank" class="btn btn-outline-light mb-3">
                        <span class="h4"><i class="icofont-facebook"></i></span>
                        {{ t('Admission.KMITL', 'การศึกษาต่อ') }}
                    </a>
                    <a href="http://council.kmitl.ac.th/council2018/request/" target="blank"
                        class="btn btn-outline-light mb-3">
                        <span class="h4"><i class="icofont-exclamation-square"></i></span>
                        {{ t('Corruption Complain', 'ร้องเรียนทุจริต') }}
                    </a>

                    <br>

                    <a href="../information/contact.php" target="blank">
                        {{ t('Contact us : Click here', 'ติดต่อสอบถาม : คลิกที่นี่') }}
                        <i class="icofont-ui-call"></i>
                        <i class="icofont-email"></i>
                    </a>
                    <br>
                    King Mongkut's Institute of Technology Ladkrabang<br>
                    All Rights Reserved.<br>
                    {{ t('Admin', 'ผู้ดูแลระบบ') }} : registrar@kmitl.ac.th<br>
                    <a href="../office/personnel.php?dept_id=10"
                        target="blank">{{ t('Developer : Click here','ผู้พัฒนา : คลิกที่นี่') }}</a><br>
                    <!-- Last modified: <br> -->
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <h5 class="modal-title" id="modalLabel">Modal title</h5> -->
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img src="new_index_assets/img/modal/17122020th.jpg" alt="" style="width: 100%;">
                    <hr>
                    <img src="new_index_assets/img/modal/17122020en.jpg" alt="" style="width: 100%;">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>



    <script src="new_index_assets/js/webboard.js?v=1.7"></script>
    <script>
    $(document).ready(function() {
        // $('#modal').modal('show');
        //----------------------------------

        $(document).click(function(event) {
            var clickover = $(event.target);
            var _opened_menu = $("#navbarToggleMenu").hasClass("collapse show");
            if (_opened_menu === true && !clickover.hasClass("toggler-menu") &&
                !clickover.parents().hasClass("collapse") &&
                !clickover.parents().hasClass("btn-group-toggle")) {
                $("#toggler-menu").click();
            }

            var _opened_login = $("#navbarToggleLogin").hasClass("collapse show");
            if (_opened_login === true && !clickover.hasClass("toggler-login") &&
                !clickover.parents().hasClass("collapse") &&
                !clickover.parents().hasClass("btn-group-toggle")) {
                $("#toggler-login").click();
            }

            var _opened_user = $("#navbarToggleUser").hasClass("collapse show");
            if (_opened_user === true && !clickover.hasClass("toggler-user") &&
                !clickover.parents().hasClass("collapse") &&
                !clickover.parents().hasClass("btn-group-toggle")) {
                $("#toggler-user").click();
            }
        });
    });
    </script>
    <script type="text/javascript">
    $(function() {
        $('#M5').css('background-image', 'url(../index/images/htopmenu3_10.jpg)');
        $('#M5').prop('href', 'javascript:void(0)');
    });

    function getiContent(page) {
        $('#iContent').prop('src', page);
    }
    </script>

    <script language="javascript">
    var skipNewsFeed = 0;

    function tick2() {
        if (skipNewsFeed == 0)
            $('#ticker_04 li:first').delay(3000).slideUp(function() {
                $(this).appendTo($('#ticker_04')).slideDown();
            });
    }


    function skipxNewsFeed() {
        skipNewsFeed = 1;
    }

    function initNewsFeed() {
        skipNewsFeed = 0;
    }
    setInterval(function() {
        tick2()
    }, 3500);
    </script>
    <script>
    function openForm() {
        document.getElementById("myForm").style.display = "block";
    }

    function closeForm() {
        document.getElementById("myForm").style.display = "none";
    }

    function change(i) {
        var i = 0;
        var doc = document.getElementById("newItem");
        var color = ["black", "blue", "brown", "green"];
        doc.style.color = color[i % 4];
        i = i++;
    }

    var nc = 0;
    setInterval(function changebackground() {
        var doc = document.getElementById("newItem");
        var color = ["black", "blue",'pink', "brown", "green", "yellow", "red",'purple'];
        doc.style.color = color[nc % 8];
        nc = nc+1;
    }, 500);
    </script>


</body>

</html>