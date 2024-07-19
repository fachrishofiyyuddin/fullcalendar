<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalender Acara</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- full calendar 5.8 -->
    <link href="<?= 'https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.css' ?>" rel='stylesheet' />
    <!-- custom css -->
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>

    <div class="container">
        <h3>Demo Tampilan Kalender Interaktif dengan FullCalendar dan TerIntegrasi Data JSON dari PHP/MySQLi</h3>
        <hr>

        <!-- Elemen preloader -->
        <div class="preloader" id="preloader">
            <p class="preloader-text" id="loadingText">Loading Calendar</p>
        </div>

        <div id="calendar"></div>

        <div class="table-responsive">
            <div id="calendar"></div>
            <div id="eventPopup">
                <h2 id="popupEventTitle"></h2>
                <p id="popupEventDescription"></p>
                <p id="popupEventDate"></p>
                <p id="popupEventTime"></p>
            </div>
        </div>
    </div>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="<?= 'https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.js' ?>"></script>
    <script src="assets/js/index.js"></script>
</body>

</html>