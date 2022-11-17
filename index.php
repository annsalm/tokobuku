<!DOCTYPE html>
<html lang="en">
<head>
 <title>Toko Buku | BukuPedia</title>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>

 <?php
 //tambahkan dbconnect
 include('dbconnect.php');

 //query
 $query = "SELECT * FROM buku";

 $result = mysqli_query($conn , $query);

 ?>

 <div class="container bg-info" style="padding-top: 20px; padding-bottom: 20px;">
  <h3>Crud APP Toko Buku &#128525</h3>
  <h3>"BukuPedia"</h3>
  <hr>
  <div class="row">
   <div class="col-sm-4">
    <h3>Form Tambah Buku</h3>
    <form role="form" action="insert.php" method="post">
     <div class="form-group">
      <label>Judul Buku</label>
      <input type="text" name="judul_bk" class="form-control">
     </div>
     <div class="form-group">
      <label>Penerbit Buku</label>
      <input type="text" name="terbit_bk" class="form-control">
     </div>
     <div class="form-group">
      <label>Genre Buku</label>
      <input type="text" name="genre_bk" class="form-control">
     </div>
     <div class="form-group">
      <label>Harga Buku</label>
      <input type="text" name="harga_bk" class="form-control">
     </div>
     <br>
     <button type="submit" class="btn btn-info btn-block">Tambah Buku</button>     
    </form>
    
   </div>
   <div class="col-sm-8">
    <h3>Tabel Daftar Buku</h3>
    <table class="table table-striped table-hover dtabel">
     <thead>
      <tr>
       <th>No</th>
       <th>Judul Buku</th>
       <th>Penerbit Buku</th>
       <th>Genre Buku</th>
       <th>Harga Buku</th>
       <th>Aksi</th>
      </tr>
     </thead>
     <tbody> 
      
      <?php
       $no = 1;  
       while ($row = mysqli_fetch_assoc($result)) {
      ?>
      <tr>
       <td><?php echo $no++; ?></td>
       <td><?php echo $row['judul_buku']; ?></td>
       <td><?php echo $row['penerbit_buku']; ?></td>
       <td><?php echo $row['genre_buku']; ?></td>
       <td><?php echo $row['harga_buku']; ?></td>
       <td>
        <a href="editform.php?id=<?php echo $row['id_buku'];?>" class="btn btn-success" role="button">Edit</a>
        <a href="delete.php?id=<?php echo $row['id_buku']?>" class="btn btn-danger" role="button">Delete</a>
       </td>
      </tr>

      <?php
       }
       mysqli_close($conn); 
      ?>
     </tbody>
    </table>
   </div>
  </div>
 </div>
</body>
</html>