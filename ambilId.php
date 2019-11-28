<?php
    include 'koneksi.php' ;

    $id = $_POST['id'] ;
    $result = [] ;

    $queryResult = $connect->query('SELECT * FROM tb_buku WHERE id=' . $id) ;

    $fetchData = $queryResult->fetch_assoc() ;

    $result = $fetchData ;

    echo json_encode($result) ;
