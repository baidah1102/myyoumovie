<?php include "header.php"; ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Profil Anda</h1>

            <?php
            include "../koneksi.php";

            // Ambil informasi profil pengguna dari sesi
            $user_id = $_SESSION['user_id'];

            // Menggunakan prepared statement untuk menghindari SQL injection
            $stmt = $koneksi->prepare("SELECT * FROM user WHERE user_id = ?");
            
            // Periksa apakah prepared statement berhasil dibuat
            if ($stmt) {
                $stmt->bind_param("s", $user_id);

                // Eksekusi prepared statement
                if ($stmt->execute()) {
                    $result = $stmt->get_result();

                    // Pastikan data pengguna ditemukan
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        // Tampilkan informasi profil pengguna
                        ?>
                        <form action="peditp.php" method="post">
                            <table class="table">
                                <tr>
                                    <td><strong>Username:</strong></td>
                                    <td><?php echo $row['username']; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Nama Lengkap:</strong></td>
                                    <td><input type="text" name="nama_lengkap" value="<?php echo $row['nama_lengkap']; ?>" required></td>
                                </tr>
                                <tr>
                                    <td><strong>Tanggal Lahir:</strong></td>
                                    <td><input type="date" name="tanggal_lahir" value="<?php echo $row['tanggal_lahir']; ?>" required></td>
                                </tr>
                                <tr>
                                    <td><strong>Alamat:</strong></td>
                                    <td><textarea name="alamat" required><?php echo $row['alamat']; ?></textarea></td>
                                </tr>
                                <tr>
                                    <td><strong>Email:</strong></td>
                                    <td><input type="email" name="email" value="<?php echo $row['email']; ?>" required></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <button type="submit" class="btn btn-primary">Perbarui</button>
                                    </td>
                                </tr>
                            </table>
                        </form>
                        <?php
                    } else {
                        echo "<p>Data pengguna tidak ditemukan.</p>";
                    }
                } else {
                    echo "<p>Terjadi kesalahan dalam eksekusi prepared statement: " . $stmt->error . "</p>";
                }

                $stmt->close();
            } else {
                echo "<p>Terjadi kesalahan dalam pembuatan prepared statement.</p>";
            }
            ?>
        </div>
    </div>
</div>

<br><?php include "footer.php"; ?>
