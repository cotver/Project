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
            <div class="col-12 card reg-card-min-height">
                <div class="card-body con-margin">
                    <div class="font-weight-bolder h5" style="display:flex;">
                        <img src="new_index_assets/img/logo/main.png" alt="" class="reg-height-title-kmitl-very-small">
                        <div class="card-doc-head">{{ t('Personnel of','บุคลากร') }}</div>
                        <div class="h6"
                            style="margin-top: 5px; display:block; color:#FF6B2C;margin-left:5px;font-weight: bolder !important;">
                            {{ t("Office of the Registrar",'สำนักทะเบียนและประมวลผล') }}
                        </div>
                    </div>
                    <a v-for="(item, key) in aboutMenu" href="item.url" class="dropdown_item">

                        <div class="side-db" v-if="key%2==0"
                            style="background:#fff1e6; width:100%; border-radius: 10px;">
                            <i class="icofont-rounded-right text-primary"></i>
                            {{ t(item.textEN, item.textTH) }}
                        </div>
                        <div class="side-db" v-else style="background:#f5f5f5; width:100%; border-radius: 10px;">
                            <i class="icofont-rounded-right text-primary"></i>
                            {{ t(item.textEN, item.textTH) }}
                        </div>
                    </a>
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