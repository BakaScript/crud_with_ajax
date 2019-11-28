<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Data Buku</h1>

    <table width=100%>
        <thead>
            <tr>
                <th>No</th>
                <th>Judul Buku</th>
                <th>Pengarang</th>
                <th>Tahun Terbit</th>
                <th></th>
            </tr>
        </thead>
        <tbody id="barisdata">
        </tbody>
    </table>

    <h2>Tambah Data</h2>

    <table>
        <tr>
            <td>ID</td>
            <td><input type="text" name="id" disabled></td>
        </tr>
        <tr>
            <td>Judul Buku</td>
            <td><input type="text" name="judulbuku"></td>
        </tr>

        <tr>
            <td>Pengarang</td>
            <td><input type="text" name="pengarang"></td>
        </tr>

        <tr>
            <td>Tahun terbit</td>
            <td><input type="text" name="tahunterbit"></td>
        </tr>


        <tr>
            <td></td>
            <td>
            <button name="tambah_data" onclick="tambahdata()">Tambah Data</button>
                <button name="update_data" onclick="updatedata()">Update Data</button>
            </td>
        </tr>
    </table>
    <p id="pesan"></p>

    <script src="jquery.js"></script>
    <script>
        onload() ;

        function onload() {
            var dataHandler = $('#barisdata') ;
            dataHandler.html("") ;

            $.ajax({
                    type : "GET",
                    data : "",
                    url : "ambildata.php",
                    success : function(result) {
                        var objResult = JSON.parse(result) ;
                        var nomor = 1 ;
                        $.each(objResult, function(key, val) {
                            var barisBaru = $("<tr>") ;
                            barisBaru.html("<td>"+nomor+"</td><td>"+val.judulbuku+"</td><td>"+val.pengarang+"</td><td>"+val.tahunterbit+"</td><td><button onclick='pilihData("+val.id+")'>Select</button><button onclick='hapusdata("+val.id+")'>Hapus Data</button></td>") ;

                            var dataHandler = $('#barisdata') ;

                            dataHandler.append(barisBaru) ;
                            nomor++ ;

                            $('[name=update_data]').hide() ;
                        }) ;
                        console.log(objResult) ;
                    }
                }) ;
            }
        
        function tambahdata()
        {
            var judulbuku = $('input[name=judulbuku]').val() ;
            var pengarang = $('input[name=pengarang]').val() ;
            var tahunterbit = $('input[name=tahunterbit]').val() ;

            
            $.ajax({
               type : "POST",
               data : "judulbuku="+judulbuku+"&pengarang="+pengarang+"&tahunterbit="+tahunterbit,
               url : 'tambahdata.php',
               success : function(result) {
                var objResult = JSON.parse(result) ;

                $('#pesan').html(objResult.pesan) ;

                onload() ;
                }  
            }) ;
        }

        function pilihData(id)
        {
            $.ajax({
                type : "POST",
                data : "id="+id,
                url : "ambilId.php",
                success : function(result) {
                    var objResult = JSON.parse(result) ;

                    $('[name=id]').val(objResult.id) ;
                    $('[name=judulbuku]').val(objResult.judulbuku) ;
                    $('[name=pengarang]').val(objResult.pengarang) ;
                    $('[name=tahunterbit]').val(objResult.tahunterbit) ;

                    $('[name=tambah_data]').hide() ;
                    $('[name=update_data]').show() ;

                }
            }) ;
        }

        function updatedata() 
        {
            var id = $('input[name=id]').val() ;
            var judulbuku = $('input[name=judulbuku]').val() ;
            var pengarang = $('input[name=pengarang]').val() ;
            var tahunterbit = $('input[name=tahunterbit]').val() ;

            
            $.ajax({
               type : "POST",
               data : "id="+id+"&judulbuku="+judulbuku+"&pengarang="+pengarang+"&tahunterbit="+tahunterbit,
               url : 'updatedata.php',
               success : function(result) {
                var objResult = JSON.parse(result) ;

                $('#pesan').html(objResult.pesan) ;

                onload() ;
                }  
            }) ;
        }

        function hapusdata(id)
        {
            var check = confirm('Apa yakin data akan dihapus??') ;

            if( check ) {

                $.ajax({
                    type : "POST",
                    data : "id="+id,
                    url : 'hapus.php',
                    success : function(result) {
                        onload() ;
                    }
                }) ;
            }
        }
    </script>
</body>
</html>