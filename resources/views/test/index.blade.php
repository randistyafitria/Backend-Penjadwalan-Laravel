
<html>
<head>
   <link rel="stylesheet" type="text/css"  />
</head>
<body>
   <div class="content-form">
      <br />
      <center><b>DATA PRIBADI KARYAWAN</b></center>
      <br />
         <table class="table-form" width="600">
            <tr>
               <th width="150">Nama Lengkap</th>
               <td width="5">:</td>
               <td>{{ $nama }}</td>
            </tr>
            <tr>
               <th>Nama Panggilan</th>
               <td>:</td>
               <td>{{ $panggilan }}</td>
            </tr>
            <tr>
               <th>Alamat</th>
               <td>:</td>
               <td>{{ $alamat }}</td>
            </tr>
            <tr>
               <th>Nomor Telp/HP</th>
               <td>:</td>
               <td>{{ $telp }}</td>
            </tr>
         </table>

   </div>
</body>
</html>
