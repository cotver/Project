<?php
header("Content-type: text/html; charset=UTF-8");

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

    <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="new_index_assets/css/master.css">
    <link rel="stylesheet" href="new_index_assets/css/testing.css">
    <link rel="stylesheet" href="new_index_assets/font/icofont/icofont.min.css">
    <meta name="description" content="ระบบสารสนเทศ สำนักทะเบียนและประมวลผล สถาบันเทคโนโลยีพระจอมเกล้าคุณทหารลาดกระบัง
    - Information System, Office of the Registrar, King Mongkut's Institute of Technology Ladkrabang">
    <title>Office of the Registrar KMITL</title>
    <style>
    td {
        padding: 10px;
    }

    table {
        border-color: orange;
        background-color: #f8f8f8;
        margin-bottom: 5px;
    }

    .table1 {
        margin-top: 50px;
    }

    .button1 {
        background-color: #ff531a;
        color: white;
    }

    .button1:hover {
        background-color: #802000;
        color: #cc2900;
    }

    .button2 {
        background-color: #c65fff;
        color: white;
    }

    .button2:hover {
        background-color: #400080;
        color: #8000ff;
    }
    </style>
</head>

<body style="background:none;">
    <div id="app">
        <!-- Content -->
        <div class="reg-page">
            <div class="col-12 card reg-card-min-height">
                <div class="card-body con-margin">
                    <div class="font-weight-bolder h5" style="display:flex;">
                        <img src="new_index_assets/img/logo/main.png" alt="" class="reg-height-title-kmitl-very-small">
                        <div class="card-doc-head">{{ t('HAcademic Calendar of','ปฏิทินการศึกษา') }}</div>
                        <div class="h6"
                            style="margin-top: 5px; display:block; color:#FF6B2C;margin-left:5px;font-weight: bolder !important;">
                            {{ t("Office of the Registrar",'สำนักทะเบียนและประมวลผล') }}
                        </div>
                    </div>
                    <div v-for="(item, key) in calenMenu" style="margin-top:30px">
                        <table class="table1" width="770" border="5" style="border-color: #ff531a;">
                            <tbody>
                                <tr>
                                    <td class="panel-heading1 cufon-show" align="center" colspan="6">
                                        <h1>
                                            <cufon class="cufon cufon-canvas" alt="ปฏิทินการศึกษาปี "
                                                style="width: 218px; height: 36px;">
                                                <cufontext>{{ t("Academic Calendar ",'ปฏิทินการศึกษาปี ') }}</cufontext>
                                            </cufon>
                                            <cufon class="cufon cufon-canvas" alt="2564"
                                                style="width: 71px; height: 36px;">
                                                <cufontext>{{ t(item.yearEN,item.yearTH) }}</cufontext>
                                            </cufon>
                                        </h1>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="td1 cufon-show" align="center" colspan="3">
                                        <a v-bind:href="item.underGraduate"><button class="btn btn-lg button1"
                                                style="width: 180px;">
                                                <cufon class="cufon cufon-canvas" alt="ปริญญาตรี"
                                                    style="width: 72px; height: 18px;">
                                                    <cufontext>ปริญญาตรี</cufontext>
                                                </cufon>
                                            </button>
                                        </a>
                                    </td>
                                    <td class="td1 cufon-show" align="center" colspan="3" rowspan="2">
                                        <a v-bind:href="item.stuActivity"><button class="btn btn-lg button2"
                                                style="width: 180px;">
                                                <cufon class="cufon cufon-canvas" alt="บัณฑิต"
                                                    style="width: 47px; height: 18px;">
                                                    <cufontext>บัณฑิต</cufontext>
                                                </cufon>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="td1 cufon-show" align="center" colspan="3">
                                        <a v-bind:href="item.graduate"><button class="btn btn-lg button1"
                                                style="width: 180px;">
                                                <cufon class="cufon cufon-canvas" alt="กิจกรรมนักศึกษา"
                                                    style="width: 107px; height: 18px;">
                                                    <cufontext>กิจกรรมนักศึกษา</cufontext>
                                                </cufon>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <table class="table1" width="770" border="2">
                        <tbody>
                            <tr>
                                <td class="panel-heading2 cufon-show" align="center" colspan="6">
                                    <h1>
                                        <cufon class="cufon cufon-canvas"
                                            alt="คู่มือการนำข้อมูลปฏิทินการศึกษาเข้าปฏิทิน(Google "
                                            style="width: 616px; height: 36px;">
                                            <cufontext>คู่มือการนำข้อมูลปฏิทินการศึกษาเข้าปฏิทิน(Google </cufontext>
                                        </cufon>
                                        <cufon class="cufon cufon-canvas" alt="calendar) "
                                            style="width: 140px; height: 36px;">
                                            <cufontext>calendar) </cufontext>
                                        </cufon>
                                        <cufon class="cufon cufon-canvas" alt="ส่วนตัว"
                                            style="width: 87px; height: 36px;">
                                            <cufontext>ส่วนตัว</cufontext>
                                        </cufon>
                                    </h1>
                                </td>
                            </tr>
                            <tr>
                                <td class="td2 cufon-show" align="center" colspan="2">
                                    <a href="2560/manual import calendar PC.pdf">
                                        <button class="btn btn-lg button1" style="width: 180px;">
                                            <cufon class="cufon cufon-canvas" alt="สำหรับ "
                                                style="width: 48px; height: 18px;">
                                                <cufontext>สำหรับ </cufontext>
                                            </cufon>
                                            <cufon class="cufon cufon-canvas" alt="PC"
                                                style="width: 19px; height: 18px;">
                                                <cufontext>PC</cufontext>
                                            </cufon>
                                        </button>
                                    </a>
                                </td>
                                <td class="td2 cufon-show" align="center" colspan="2">
                                    <a href="2560/manual import calendar iOS.pdf">
                                        <button class="btn btn-lg button1" style="width: 180px;">
                                            <cufon class="cufon cufon-canvas" alt="สำหรับ "
                                                style="width: 48px; height: 18px;">
                                                <cufontext>สำหรับ </cufontext>
                                            </cufon>
                                            <cufon class="cufon cufon-canvas" alt="iOS"
                                                style="width: 22px; height: 18px;">
                                                <cufontext>iOS</cufontext>
                                            </cufon>
                                        </button>
                                    </a>
                                </td>
                                <td class="td2 cufon-show" align="center" colspan="2">
                                    <a href="2560/manual import calendar Android.pdf"><button class="btn btn-lg button1"
                                            style="width: 180px;">
                                            <cufon class="cufon cufon-canvas" alt="สำหรับ "
                                                style="width: 48px; height: 18px;">
                                                <cufontext>สำหรับ </cufontext>
                                            </cufon>
                                            <cufon class="cufon cufon-canvas" alt="Android"
                                                style="width: 52px; height: 18px;">
                                                <cufontext>Android</cufontext>
                                            </cufon>
                                        </button>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- ---------------------------------------------------------- -->
    </div>
    <script src="new_index_assets/js/index.js?v=1.7"></script>
    <script>
    document.getElementById("defaultOpen").click();
    </script>
</body>

</html>