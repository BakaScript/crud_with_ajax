<?php
    include 'koneksi.php' ;

    $judulbuku = $_POST['judulbuku'] ;
    $pengarang = $_POST['pengarang'] ;
    $tahunterbit = $_POST['tahunterbit'] ;

    $result['pesan'] = "" ;

    if( $judulbuku == '' ) {
        $result['pesan'] = "Judul buku harus diisi!" ;
    } elseif($pengarang == '') {
        $result['pesan'] = "Pengarang harus diisi!" ;
    } elseif($tahunterbit == '') {
        $result['pesan'] = "Tahun terbit harus diisi!" ;
    } else {

        $queryResult = $connect->query("INSERT INTO tb_buku (judulbuku, pengarang, tahunterbit) VALUES('".$judulbuku."', '". $pengarang ."', '".$tahunterbit."')") ;

        if( $queryResult ) {
            $result['pesan'] = "Data berhasil ditambahkan!" ;
        } else {
            $result['pesan'] = "Data gagal ditambahkan!" ;

        }

    }

    echo json_encode($result) ;