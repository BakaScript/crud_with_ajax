<?php
    include 'koneksi.php' ;

    $id = $_POST['id'] ;
    $judulbuku = $_POST['judulbuku'] ;
    $pengarang = $_POST['pengarang'] ;
    $tahunterbit = $_POST['tahunterbit'] ;

    $result['pesan'] = "" ;

    if( $id == '' ) {
        $result['pesan'] = "Id harus diisi!" ;
    } elseif( $judulbuku == '' ) {
        $result['pesan'] = "Judul buku harus diisi!" ;
    } elseif($pengarang == '') {
        $result['pesan'] = "Pengarang harus diisi!" ;
    } elseif($tahunterbit == '') {
        $result['pesan'] = "Tahun terbit harus diisi!" ;
    } else {

$queryResult = $connect->query("UPDATE tb_buku SET judulbuku='".$judulbuku."', pengarang='".$pengarang."', tahunterbit='".$tahunterbit."' WHERE id=".$id) ;

        if( $queryResult ) {
            $result['pesan'] = "Data berhasil diubah!" ;
        } else {
            $result['pesan'] = "Data gagal diubah!" ;

        }

    }

    echo json_encode($result) ;