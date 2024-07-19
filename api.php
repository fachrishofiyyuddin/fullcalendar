<?php
// include koneksi db dari folder koneksi
include "koneksi/index.php";

// Ambil data acara dari database
$sql = "SELECT schedules.id as id_schedule, schedules.name_schedule, schedules.start_date, schedules.end_date,  schedules.start_clock, schedules.end_clock, laboratories.name  FROM schedules JOIN laboratories ON schedules.id_laboratory = laboratories.id";
$result = $koneksi->query($sql);

$events = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $tgl_mulai = new DateTime($row['start_date']);
        $tgl_akhir = new DateTime($row['end_date']);
        $start_clock = $row['start_clock'];
        $end_clock = $row['end_clock'];

        // Periksa apakah acara berlangsung lebih dari satu hari atau hanya satu hari
        if ($tgl_mulai->format('Y-m-d') === $tgl_akhir->format('Y-m-d')) {
            // Acara hanya berlangsung satu hari
            $start = $tgl_mulai->format('Y-m-d') . 'T' . date("H:i:s", strtotime($row['start_clock']));
            $end = $tgl_akhir->format('Y-m-d') . 'T' . date("H:i:s", strtotime($row['end_clock']));
            $description = $row['name_schedule'] . " pada tanggal " . $tgl_mulai->format("d/m/Y") . " dari jam $start_clock" . " - " . $end_clock . ".";
            $color = 'red'; // Set warna merah untuk acara satu hari
        } else {
            // Acara berlangsung lebih dari satu hari
            $start = $tgl_mulai->format('Y-m-d') . 'T' . date("H:i:s", strtotime($row['start_clock']));
            $end = $tgl_akhir->format('Y-m-d') . 'T' . date("H:i:s", strtotime($row['end_clock']));
            $description = $row['name_schedule'] . " dari tanggal " . $tgl_mulai->format("d/m/Y") . " hingga " . $tgl_akhir->format("d/m/Y") . " dari jam $start_clock" . " - " . $end_clock . ".";
            $color = 'green'; // Warna default untuk acara yang berlangsung lebih dari satu hari
        }

        // Tambahkan acara ke dalam array $events
        $events[] = array(
            'title' => $row['name'],
            'start' => $start,
            'end' => $end,
            'description' => $description,
            'color' => $color,
            'url' => 'view-detail.php?id=' . $row['id_schedule']
        );
    }
}

// Set header untuk respons JSON
header('Content-Type: application/json');

// Keluarkan hasil acara sebagai JSON
echo json_encode($events);

// Tutup koneksi database
$koneksi->close();
