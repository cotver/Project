<?php
    error_reporting();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $con= new mysqli($servername, $username, $password);
    echo mysqli_connect_error();
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
        echo mysqli_connect_error();
        echo "Connection failed"." ".mysqli_connect_error() ;
      }
      echo "Connected successfully";
      
      $sql = "SELECT `date`, `topic`, `topic_en`, `detail`, `link`, `pin`, `publish_date`, `expire_date`, `group` FROM `registrar`.`_news_`";
      $result = mysqli_query($con, $sql);
      echo mysqli_num_rows($result);
      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            if ($row['topic_en'] == '')
                $row['topic_en'] = '{ English translation in progress }';
            $row['href'] = 'group_news.php?group=' . $row['group'] . '~' . urlencode($row['date']);
            $response[] = $row;
        }
    }

    mysqli_close($con);
    echo $response;
    return $response;
      
?>