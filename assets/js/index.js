document.addEventListener('DOMContentLoaded', function() {
    // Tampilkan teks "Loading Calendar..." dengan titik-titik yang bergerak
    var loadingTextElement = document.getElementById('loadingText');
    var dots = 0;
    var intervalId = setInterval(function() {
        dots = (dots + 1) % 4;
        loadingTextElement.textContent = 'Loading Calendar' + '.'.repeat(dots);
    }, 500); // Ubah titik setiap 0.5 detik (500 milidetik)

    // Tampilkan teks "Loading Calendar" dan jeda selama 3 detik sebelum memuat kalender
    setTimeout(function() {
        loadCalendar();
    }, 3000); // Jeda 3 detik

    function loadCalendar() {
        // Tampilkan preloader saat permintaan AJAX sedang dilakukan
        $('#preloader').show();

        $.ajax({
            url: 'api.php',
            type: 'GET',
            dataType: 'json',
            success: function(events) {
                // Sembunyikan preloader setelah data berhasil dimuat
                $('#preloader').hide();

                var calendarEl = document.getElementById('calendar');

                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    events: events,
                    eventMouseEnter: function(info) {
                        showEventPopup(info.event);
                    },
                    eventMouseLeave: function() {
                        hideEventPopup();
                    },
                    eventClick: function(info) {
                        console.log('Event clicked:', info.event);
                        if (info.event.url) {
                            window.location.href = info.event.url;
                        }
                    }
                });

                calendar.render();
            },
            error: function(xhr, status, error) {
                console.error('Error AJAX: ' + status + ' - ' + error);
                // Sembunyikan preloader jika terjadi kesalahan
                $('#preloader').hide();
            }
        });
    }

    function showEventPopup(event) {
        var popup = document.getElementById('eventPopup');
        var popupTitle = document.getElementById('popupEventTitle');
        var popupDescription = document.getElementById('popupEventDescription');
        var popupTime = document.getElementById('popupEventTime');

        popupTitle.textContent = event.title;
        popupDescription.textContent = event.extendedProps.description;
        popupTime.textContent = event.extendedProps.time;

        popup.style.display = 'block';
    }

    function hideEventPopup() {
        var popup = document.getElementById('eventPopup');
        popup.style.display = 'none';
    }
});


