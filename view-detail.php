<?php
// ambil koneksi dari folder koneksi
include "koneksi/index.php";

// ambil id
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Detail</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- data tables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap.css">
    <!-- custom css -->
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <div class="container">
        <h3>Page Detail</h3>
        <p>Anda dapat melihat informasi lengkap tentang acara atau jadwal yang telah Anda pilih sebelumnya. Kami menyajikan detail dengan jelas, termasuk tanggal, waktu, lokasi, dan deskripsi acara. Desain yang intuitif memastikan pengalaman navigasi yang mudah, sehingga Anda bisa mendapatkan informasi yang Anda cari tanpa kesulitan.</p>
        <a href="<?= $route; ?>">back to schedules</a>
        <hr>

        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Acara</th>
                    <th>Mulai tgl</th>
                    <th>Selesai tgl</th>
                    <th>Mulai pukul</th>
                    <th>Sampai pukul</th>
                    <th>LAB.</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $result = mysqli_query($koneksi, "SELECT schedules.id as id_schedule, schedules.name_schedule, schedules.start_date, schedules.end_date,  schedules.start_clock, schedules.end_clock, laboratories.name  FROM schedules JOIN laboratories ON schedules.id_laboratory = laboratories.id where schedules.id='$id'");
                foreach ($result as $row) :
                ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row['name_schedule']; ?></td>
                        <td><?= date("d-m-Y", strtotime($row['start_date'])); ?></td>
                        <td><?= date("d-m-Y", strtotime($row['end_date'])); ?></td>
                        <td><?= $row['start_clock']; ?></td>
                        <td><?= $row['end_clock']; ?></td>
                        <td><?= $row['name']; ?></td>
                    </tr>
                <?php
                endforeach;
                ?>
            </tbody>
        </table>
    </div>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap.js"></script>
    <script>
        // dataTables
        new DataTable('#example');
    </script>
</body>

</html>