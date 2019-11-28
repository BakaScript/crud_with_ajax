<?php

$connect = new mysqli('localhost', 'root', '', 'perpustakaan') ;

if( !$connect ) {
    echo "Koneksi gagal" ;
    exit() ;
}