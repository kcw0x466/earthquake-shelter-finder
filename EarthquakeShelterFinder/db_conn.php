<?php
    // 함수화 시키기
    $con=mysqli_connect("127.0.0.1","root","1234","지진대피시설");
    if(mysqli_connect_error($con))
    {
        echo "MySQL 접속 실패", "<br>";
        echo "오류 원인: ", mysqli_connect_error();
        exit();
    }

    echo "접속 성공";
    mysqli_close($con);
?>


