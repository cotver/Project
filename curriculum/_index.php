
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
                <div class="col-12">
                    <div class="card"> 
                        <div class="card-body  con-margin ">
                            <div class="font-weight-bolder h5" style="display:flex;">  
                                <img src="new_index_assets/img/logo/main.png" alt="" class="reg-height-title-kmitl-very-small">
                                    <div class="card-doc-head">หลักสูตรและแผนการศึกษา</div> 
                                    <div class="h6" style="margin-top: 5px; display:block; color:#FF6B2C;margin-left:5px;font-weight: bolder !important;">สถาบันเทคโนโลยีพระจอมเกล้าเจ้าคุณทหารลาดกระบัง</div> 
                            </div> 
                            <div v-for="item in CurriculumMenu" class="btn-tran ml-2 ">
                                <a v-bind:href="item.url" class="btn btn-tran text-left mb-2 side-df" target="blank">
                                    <i class="icofont-caret-right text-primary"></i>
                                    <span class="side-text">{{ t(item.textEN, item.textTH) }}</span>
                                    <a href="http://www1.reg.kmitl.ac.th/filecontainer/files/A622021.pdf" title="ดาวน์โหลด" target="_blank">
                                        <button class="d-button">Download</button>
                                    </a>
                                </a>
                                <hr class="m-0">
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- ---------------------------------------------------------- -->
    </div>
    <script src="new_index_assets/js/index.js?v=1.7"></script>
</body>

</html>