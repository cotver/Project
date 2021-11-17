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
</head>

<body style="background:none;">
    <div id="app">
        <!-- Content -->
        <div class="reg-page">
            <div class="col-12 card reg-card-min-height" style="min-height:1050px;">
                <div class="card-body con-margin">
                    <div class="font-weight-bolder h5" style="display:flex;">
                        <img src="new_index_assets/img/logo/main.png" alt="" class="reg-height-title-kmitl-very-small">
                        <div class="card-doc-head">{{ t('Institute Curriculum','หลักสูตรและแผนการศึกษา') }}</div>
                        <div class="h6"
                            style="margin-top: 5px; display:block; color:#FF6B2C;margin-left:5px;font-weight: bolder !important;">
                            {{ t("King Mongkut's Institute of Technology Ladkrabang",'สถาบันเทคโนโลยีพระจอมเกล้าเจ้าคุณทหารลาดกระบัง') }}
                        </div>
                    </div>
                    <div class="btn-tran ml-2 ">
                        <div class=" pt-3" style="display:flex;">
                            <div class="col-4 col-md-4">
                                <div class="dropdown dropdown-6">
                                    <a href="javascript:void(0);" onclick="Undergraduate()" class="cur-head"
                                        style="background: #FF7F49;">
                                        <i class="icofont-caret-right text-light"></i>
                                        {{ t('Undergraduate','หลักสูตรระดับปริญญาตรี') }}
                                    </a>
                                    <div id="Undergraduate"
                                        class="dropdown_menu dropdown_menu--animated dropdown_menu-6"
                                        style="display: none;">
                                        <a v-for="(item, key) in Undergraduate" href="item.url" class="dropdown_item">
                                            <i class="icofont-rounded-right text-primary"></i>
                                            <div class="side-db" v-if="key%2==0"
                                                style="background:#fff1e6; width:100%; border-radius: 10px;">
                                                {{ t(item.textEN, item.textTH) }}</div>
                                            <div class="side-db" v-else
                                                style="background:#f5f5f5; width:100%; border-radius: 10px;">
                                                {{ t(item.textEN, item.textTH) }}</div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 col-md-4">
                                <div class="dropdown dropdown-6">
                                    <a href="javascript:void(0);" onclick="Graduate()" class="cur-head"
                                        style="background: #1FC24A;">
                                        <i class="icofont-caret-right text-light"></i>
                                        {{ t('Graduate','หลักสูตรระดับบัณฑิตศึกษา') }}
                                    </a>
                                    <div id="Graduate" class="dropdown_menu dropdown_menu--animated dropdown_menu-6"
                                        style="display: none;">
                                        <a v-for="(item, key) in Graduate" href="item.url" class="dropdown_item">
                                            <i class="icofont-rounded-right text-primary"></i>
                                            <div class="side-db" v-if="key%2==0"
                                                style="background:#fff1e6; width:100%; border-radius: 10px;">
                                                {{ t(item.textEN, item.textTH) }}</div>
                                            <div class="side-db" v-else
                                                style="background:#f5f5f5; width:100%; border-radius: 10px;">
                                                {{ t(item.textEN, item.textTH) }}</div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 col-md-4">
                                <div class="dropdown dropdown-6">
                                    <a href="javascript:void(0);" onclick="Minor()" class="cur-head"
                                        style="background: #A94FF9;">
                                        <i class="icofont-caret-right text-light"></i>
                                        {{ t('Minor Program (Undergraduate)','หลักสูตรวิชาโท (ระดับปริญญาตรี)') }}
                                    </a>
                                    <div id="Minor" class="dropdown_menu dropdown_menu--animated dropdown_menu-6"
                                        style="display: none;">
                                        <a v-for="(item, key) in Minor" href="item.url"
                                            class="dropdown_item">
                                            <i class="icofont-rounded-right text-primary"></i>
                                            <div class="side-db" v-if="key%2==0"
                                                style="background:#fff1e6; width:100%; border-radius: 10px;">
                                                {{ t(item.textEN, item.textTH) }}</div>
                                            <div class="side-db" v-else
                                                style="background:#f5f5f5; width:100%; border-radius: 10px;">
                                                {{ t(item.textEN, item.textTH) }}</div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ---------------------------------------------------------- -->
    </div>
    <script src="new_index_assets/js/index.js?v=1.7"></script>
    <script>
    function Undergraduate() {
        document.getElementById("Undergraduate").style.display === 'none' ? document.getElementById("Undergraduate")
            .style.display = "flex" : document.getElementById("Undergraduate").style.display = "none";
    }

    function Graduate() {
        document.getElementById("Graduate").style.display === 'none' ? document.getElementById("Graduate").style
            .display = "flex" : document.getElementById("Graduate").style.display = "none";

    }

    function Minor() {
        document.getElementById("Minor").style.display === 'none' ? document.getElementById("Minor").style.display =
            "flex" : document.getElementById("Minor").style.display = "none";
    }
    </script>

    </script>
</body>

</html>