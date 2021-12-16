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

    .tablink {
        background-color: #ff804b;
        color: white;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 10px 10px;
        font-size: 16px;
        width: 25%;
    }

    .tablink:hover {
        background-color: #ff5a32;
    }

    /* Style the tab content */
    .tabcontent {
        display: none;
        padding: 30px;
        width: 100%;
        font-size: 18px;
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
                        <div class="card-doc-head">{{ t('History of','ประวัติความเป็นมา') }}</div>
                        <div class="h6"
                            style="margin-top: 5px; display:block; color:#FF6B2C;margin-left:5px;font-weight: bolder !important;">
                            {{ t("Office of the Registrar",'สำนักทะเบียนและประมวลผล') }}
                        </div>
                    </div>
                    <div v-for="(item, key) in history" style="margin-top:30px">
                        <button v-if="key==0" id="defaultOpen" class="tablink"
                            v-on:click="openText($event,item.dateId, this)">{{ t(item.dateEN, item.dateTH) }}</button>
                        <button v-else class="tablink"
                            v-on:click="openText($event,item.dateId, this)">{{ t(item.dateEN, item.dateTH) }}</button>
                    </div>

                    <div v-for="(item, key) in history">
                        <div v-bind:id="item.dateId" class="tabcontent">
                            <p>{{ t(item.textEN, item.textTH) }}</p>
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
        document.getElementById("defaultOpen").click();
    </script>
</body>

</html>