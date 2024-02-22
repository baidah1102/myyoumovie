<?php
  session_start();
  if (empty($_SESSION['user_id'])){
    header("location:../login.php");
  }
?>
<?php include "header.php"; ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
        <h1>Data User</h1>

        <table  class="table table-bordered table-hover" id="data-table">
        <thead>
            <tr>
                <th>Username</th><th>Nama Lengkap</th><th>Role</th><th>Detail</th>

            </tr> 
        </thead> 
        <tbody>
        <?php

        include "../koneksi.php";
        $sql=$koneksi->query("select * from user order by user_id ASC");

        while($row= $sql->fetch_assoc()){
        ?>

            <tr>
                <td><?php echo $row['username']?></td>
                <td><?php echo $row['nama_lengkap']?></td>
                <td><?php echo $row['role']?></td>
                <td>

                <a href="edit-user.php?id=<?php echo $row['user_id']?>">
                    <button class="btn btn-xs btn-danger glyphicon glyphicon-eye-open"></button>
                </a>

                <a href="hapus-user.php?id=<?php echo $row['user_id']?>" onclick=" return confirm('Anda yakin menghapus data?')">
                    <button class="btn btn-xs btn-warning glyphicon glyphicon-remove"></button>
                </a>

                </td>
            </tr>

        <?php    
        }
        ?>
        </tbody>
        </table>
        </div>
    </div>
</div>


<?php include "footer.php";?>