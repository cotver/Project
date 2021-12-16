<?php


header('Content-Type: application/json; charset=UTF-8');
session_start();

# route
if ($REQUEST_METHOD == 'GET') {
    switch ($_REQUEST['function']) {
        case 'get-info':
            $response = getInfo();
            break;
        case 'get-news':
            $response = getNews();
            break;
        case 'get-language':
            $response = getLanguage();
            break;
        default:
            error('Bad Request', 400);
    }
} else if (REQUEST_METHOD == 'POST') {
    switch ($_REQUEST['function']) {
        case 'set-language':
            $response = setLanguage();
            break;
        default:
            error('Bad Request', 400);
    }
} else
    error('Method Not Allowed', 405);

echo json_encode($response);

function getInfo()
{
    $response = array(
        'timestamp' => time(),
        'server_no' => null,
        'logged_in' => false,
        'user_id' => false,
        'privilege' => false
    );

    switch ($_SERVER['SERVER_ADDR']) {
        case '10.100.102.33':
            $response['server_no'] = '#1';
            break;
        case '10.100.102.45':
            $response['server_no'] = '#2';
            break;
        case '10.100.102.46':
            $response['server_no'] = '#3';
            break;
        case '10.100.102.47':
            $response['server_no'] = '#4';
            break;
        case '10.100.102.35':
            $response['server_no'] = '#5';
            break;
        case '10.100.102.36':
            $response['server_no'] = '#6';
            break;
        case '10.100.102.37':
            $response['server_no'] = '#7';
            break;
        default:
            $response['server_no'] = $_SERVER['SERVER_ADDR'];
            break;
    }

    if (isset($_SESSION["ticket"]['LAST_ACTIVITY']) && (time() - $_SESSION["ticket"]['LAST_ACTIVITY'] > 1400)) {
        unset($_SESSION['ticket']);
        header("Location: ../user/index.php");
        exit;
    }

    if (isset($_SESSION['ticket'])) {
        $response['logged_in'] = true;
        $response['user_id'] = $_SESSION['ticket']['user_id'];
        $response['privilege'] = $_SESSION['ticket']['privilege'];

        if ($_SESSION["ticket"]["privilege"] != PRIV_ADMIN) {
            $response['user_menu'] = array();

            $response['user_menu'][0]["textEN"] = 'User main page';
            $response['user_menu'][0]["textTH"] = 'หน้าหลักผู้ใช้';
            $response['user_menu'][0]["path"] = getHomePage($_SESSION["ticket"]["privilege"]);
            if(($_SESSION["ticket"]["privilege"] == PRIV_STUDENT)||($_SESSION["ticket"]["privilege"] == PRIV_STUDENT_X)) {
                $response['user_menu'][1]["textEN"] = 'Student Card';
                $response['user_menu'][1]["textTH"] = 'บัตรนักศึกษา';
                $response['user_menu'][1]["path"] = "../virtualcard/index_test.php";
            }
        } else {
            $response['user_menu'] = array();

            $response['user_menu'][0]["textEN"] = 'Faculty';
            $response['user_menu'][0]["textTH"] = 'คณะ';
            $response['user_menu'][0]["path"] = "../u_cregis/index.php";

            $response['user_menu'][1]["textEN"] = 'Ungrad';
            $response['user_menu'][1]["textTH"] = 'ตรี';
            $response['user_menu'][1]["path"] = "../u_officer/index.php";

            $response['user_menu'][2]["textEN"] = 'Grad';
            $response['user_menu'][2]["textTH"] = 'บัณฑิต';
            $response['user_menu'][2]["path"] = "../u_officer_x/index.php";

            $response['user_menu'][3]["textEN"] = 'Tester';
            $response['user_menu'][3]["textTH"] = 'ทดสอบ';
            $response['user_menu'][3]["path"] = "../tester/index.php";
        }
    }

    return $response;
}

function getNews()
{
    # 2 แจ้งประกาศสำนัก(ปริญญาตรี)
    # 3 ประกาศสำคัญ
    # 4 แจ้งประกาศสำนัก(บัณฑิตศึกษา)
    # 23 แจ้งประกาศหลักสูตรวิชาโท

    $response = array();

    $rcon = replicateConnection();

    if (!isset($_REQUEST['group']))
        error('[group] Required', 400);
    else if (!ctype_digit((string) $_REQUEST['group']))
        error('Bad Request', 400);

    $group = mysqli_real_escape_string($rcon, $_REQUEST['group']);
    if ($group == 2)
        $group = '2, 23';
    $sql = "SELECT `date`, `topic`, `topic_en`, `detail`, `link`, `pin`, `publish_date`, `expire_date`, `group` FROM `registrar`.`_news_` WHERE `group` IN ($group) AND `status` = 1 ORDER BY `pin` DESC, `date` DESC";

    $result = mysqli_query($rcon, $sql) or error(mysqli_error($rcon));
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            if ($row['topic_en'] == '')
                $row['topic_en'] = '{ English translation in progress }';
            $row['href'] = 'group_news.php?group=' . $row['group'] . '~' . urlencode($row['date']);
            $response[] = $row;
        }
    }

    mysqli_close($rcon);
    return $response;
}

function getLanguage()
{
    $response = array(
        'lang' => ''
    );

    if (!isset($_SESSION['lang']))
        $_SESSION['lang'] = 'th';

    $response['lang'] = $_SESSION['lang'];

    return $response;
}

function setLanguage()
{
    $response = array(
        'status' => false,
        'lang' => ''
    );

    if (!isset($_REQUEST['lang']))
        error('[lang] Required', 400);
    else if ($_REQUEST['lang'] != 'th' && $_REQUEST['lang'] != 'en')
        error('Bad Request', 400);

    $_SESSION['lang'] = $_REQUEST['lang'];
    if ($_SESSION['lang'] == $_REQUEST['lang'])
        $response['status'] = true;
    $response['lang'] = $_SESSION['lang'];

    return $response;
}
