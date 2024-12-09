<?php
    function connect_db() {
        $host = "127.0.0.1";
        $username = "root";
        $password = "1234";
        $schema = "지진대피시설";

        $con = mysqli_connect($host, $username, $password, $schema);
        if(!$con)
        {
            echo "MySQL 접속 실패", "<br>";
            echo "오류 원인: ", mysqli_connect_error();
            exit();
        }
        return $con;
    }

    // 함수화 시키기
    // echo "접속 성공";
    // mysqli_close($con);
?>


