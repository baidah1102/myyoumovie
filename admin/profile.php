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
                        <table class="table">
                            <tr>
                                <td><strong>Username:</strong></td>
                                <td><?php echo $row['username']; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Nama Lengkap:</strong></td>
                                <td><?php echo $row['nama_lengkap']; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Tanggal Lahir:</strong></td>
                                <td><?php echo $row['tanggal_lahir']; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Alamat:</strong></td>
                                <td><?php echo $row['alamat']; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Email:</strong></td>
                                <td><?php echo $row['email']; ?></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                <button type="submit" class="btn btn-primary">Perbarui</button>
                                </td>
                            </tr>
                        </table>
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
