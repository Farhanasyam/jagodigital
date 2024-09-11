<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Content Calendar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
    <style>
        .calendar-container {
            background-color: #d1d1d6;
            border-radius: 0.5rem;
            padding: 1rem;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        .calendar-header {
            border-bottom: 1px solid #000;
            padding-bottom: 0.5rem;
        }

        .calendar-controls button {
            border: none;
        }

        .table-bordered {
            border: none;
        }

        .table-bordered th,
        .table-bordered td {
            width: 14.285714%;
            height: 100px;
            border: 1px solid #dee2e6;
            position: relative;
        }

        .table-bordered th {
            height: 70px;
            border-top: 1px solid #dee2e6 !important;
            border-bottom: 1px solid #dee2e6 !important;
            border-left: none !important;
            border-right: none !important;
        }

        .event-rect,
        .event-rect-small,
        .event-rect-medium {
            color: white;
            padding: 5px;
            border-radius: 5px;
            text-align: center;
            position: absolute;
            width: 70%;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            cursor: pointer;
        }

        .event-rect {
            background-color: #007bff;
        }

        .event-rect-small {
            background-color: #28a745;
        }

        .event-rect-medium {
            background-color: #dc3545;
        }

        .event-detail strong {
            display: inline-block;
            width: 110px;
        }

        .event-detail p {
            margin: 0.5em 0;
        }

        .tab {
            overflow: hidden;
            border: 1px solid #ccc;
            background-color: #f1f1f1;
        }

        .tab button {
            background-color: inherit;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            transition: 0.3s;
            font-size: 17px;
            color: black;
        }

        .tab button.active {
            background-color: #555;
            color: white;
        }

        .tabcontent {
            display: none;
            padding: 6px 12px;
            border: 1px solid #ccc;
            border-top: none;
        }

        .tab button.instagram:hover,
        .tab button.instagram.active:hover {
            background-color: #E1306C;
            color: white;
        }

        @media (max-width: 768px) {
            .calendar-container {
                padding: 0.75rem;
            }

            .calendar-controls button {
                font-size: 0.75rem;
            }

            .event-rect,
            .event-rect-small,
            .event-rect-medium {
                font-size: 9px;
                width: 90%;
                top: 50px;
            }

            .table-bordered td {
                height: 80px;
            }
        }

        @media (max-width: 576px) {
            .calendar-container {
                padding: 0.5rem;
            }

            .calendar-controls button {
                font-size: 0.65rem;
            }

            .head h5 {
                font-size: 15px;
            }

            .head .btn-success {
                font-size: 7px;
            }

            .head input {
                font-size: 10px;
            }

            .head .btn-light {
                font-size: 8px;
            }

            .head i {
                font-size: 9px;
            }

            .table-responsive {
                font-size: 13px;
            }

            .event-rect,
            .event-rect-small,
            .event-rect-medium {
                font-size: 0.35rem;
                width: 60px;
                top: 40px;
            }

            .table-bordered td {
                height: 60px;
            }
        }

        @media (max-width: 320px) {
            .calendar-controls button {
                font-size: 0.5rem;
            }

            .head h5 {
                font-size: 7px;
            }

            .head .add {
                width: 35px;
                height: 17px;
                font-size: 2.5px;
                position: relative;
                right: 10px;
            }

            .head .add2 {
                width: 35px;
                height: 17px;
                font-size: 5px;
            }

            .head input {
                font-size: 5px;
                position: relative;
                left: 10px;
            }

            .head .btn-light {
                font-size: 7px;
                width: 7px;
                height: 20px;
                position: relative;
                left: 20px;
            }

            .head i {
                font-size: 10px;
                position: relative;
                right: 5px;
                bottom: 3px;
            }

            .table-responsive {
                font-size: 10px;
            }

            .event-rect,
            .event-rect-small,
            .event-rect-medium {
                font-size: 0.25rem;
                width: 80%;
                top: 35px;
            }

            .table-bordered td {
                height: 50px;
            }

            .modal {
                width: 300px;
                left: 10px;
            }
        }
    </style>
</head>

<body>
    <!-- navbar
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </li>
                </ul>
                <div class="pe-3">
                    <div class="dropdown">
                        <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle"></i> User Profile
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav> -->

    <!-- calendar -->
    <div class="container mt-4">
        <h3>Content Calendar</h3>
        <hr>
        <div class="calendar-container mt-4">
            <div class="head d-flex justify-content-between align-items-center">
                <h5 class="m-0" id="dataDisplay"></h5>
                <div class="calendar-controls d-flex align-items-center">
                    <button class="btn btn-light me-2" id="prevMonth">
                        <i class="bi bi-chevron-left"></i>
                    </button>
                    <button class="btn btn-light" id="nextMonth">
                        <i class="bi bi-chevron-right"></i>
                    </button>
                    <input type="month" id="monthPicker" class="ms-3 form-control-sm">
                    <button type="button" class="add2 btn btn-primary ms-3">Cari</button>
                    <a href="/content-planner">
                        <button type="button" class="add btn btn-success ms-3">Content Planner</button>
                    </a>
                </div>
            </div>

            <div class="calendar-header mt-2"></div>
            <div class="table-responsive">
                <table class="table table-bordered text-center mt-4">
                    <thead>
                        <tr id="daysRow">
                            <!-- Hari (Minggu-Sabtu) -->
                        </tr>
                    </thead>
                    <tbody class="text-end" id="datesBody">
                        <!-- Tanggal (Sesuai Bulan) -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Pop Up -->
    <div class="modal fade" id="eventModal" tabindex="-1" aria-labelledby="eventModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="eventModalLabel1"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pb-5">
                    <!-- Tab links -->
                    <div class="tab">
                        <?php foreach ($sosialmedia as $item) : ?>
                            <button class="tablinks <?= $item['nama_sosial_media'] ?>"
                                style="--hover-color: <?= $item['warna_sosial_media'] ?>;"
                                onmouseover="this.style.backgroundColor=this.style.getPropertyValue('--hover-color'); this.style.color='white';"
                                onmouseout="this.style.backgroundColor=''; this.style.color='';"
                                onclick="openPlatform(event, '<?= $item['nama_sosial_media'] ?>')">
                                <?= $item['nama_sosial_media'] ?>
                            </button>
                        <?php endforeach; ?>
                    </div>
                    <?php foreach ($sosialmedia as $item) : ?>
                        <div id="<?= $item['nama_sosial_media'] ?>" class="tabcontent">
                            <!-- Content -->
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary">Some Button</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>

    <script>
        function openPlatform(evt, platformName) {
            // Declare all variables
            var i, tabcontent, tablinks;

            // Get all elements with class="tabcontent" and hide them
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }

            // Get all elements with class="tablinks" and remove the class "active"
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }

            // Show the current tab, and add an "active" class to the button that opened the tab
            document.getElementById(platformName).style.display = "block";
            evt.currentTarget.className += " active";
        }

        document.querySelector('.btn.btn-primary').addEventListener('click', function() {
            // Mendapatkan nilai dari input type="month"
            var monthPickerValue = document.getElementById('monthPicker').value;

            if (monthPickerValue) {
                // Pisahkan nilai menjadi tahun dan bulan
                var [year, month] = monthPickerValue.split('-');

                // Buat tanggal baru berdasarkan tahun dan bulan yang dipilih
                var selectedDate = new Date(year, month - 1); // Bulan dalam JavaScript berbasis 0

                // Perbarui currentDate dengan tanggal yang dipilih
                currentDate = selectedDate;

                // Perbarui tampilan dengan tanggal yang dipilih
                updateDateDisplay(currentDate);
                updateCalendar(currentDate);
            }
        });

        // Mendapatkan data dari PHP (eventsByDate dan socialMediaColors) sebagai objek JavaScript
        var eventsByDate = <?= json_encode($eventsByDate) ?>;
        var socialMediaColors = <?= json_encode($socialMediaColors) ?>;

        // Mendapatkan elemen untuk baris hari, tubuh tabel, dan tampilan bulan
        var daysRow = document.getElementById('daysRow');
        var datesBody = document.getElementById('datesBody');

        // Array nama hari dalam Bahasa Indonesia
        var dayNames = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];

        // Menampilkan hari dari Minggu hingga Sabtu di baris pertama
        dayNames.forEach(function(day) {
            var th = document.createElement('th');
            th.textContent = day;
            daysRow.appendChild(th);
        });

        // Mendapatkan bulan dan tahun saat ini
        var currentDate = new Date();
        var options = {
            year: 'numeric',
            month: 'long'
        };

        // Mendapatkan tanggal hari ini
        var today = new Date();

        // Fungsi untuk memperbarui tampilan bulan dan tahun
        function updateDateDisplay(date) {
            document.getElementById('dataDisplay').textContent = date.toLocaleDateString('id-ID', options);
        }

        // Fungsi untuk memperbarui tampilan tanggal sesuai bulan
        function updateCalendar(date) {
            // Kosongkan isi datesBody
            datesBody.innerHTML = '';

            // Mendapatkan jumlah hari dalam bulan yang sedang ditampilkan
            var year = date.getFullYear();
            var month = date.getMonth();
            var daysInMonth = new Date(year, month + 1, 0).getDate();

            // Mendapatkan hari pertama dalam bulan ini (0 = Minggu, 1 = Senin, ..., 6 = Sabtu)
            var firstDay = new Date(year, month, 1).getDay();

            // Mengisi tanggal-tanggal sesuai dengan minggunya
            var currentDay = 1;
            var tr = document.createElement('tr'); // Buat baris baru untuk minggu pertama

            // Isi baris pertama dengan tanggal yang tepat
            for (var i = 0; i < 7; i++) {
                var td = document.createElement('td');

                if (i >= firstDay && currentDay <= daysInMonth) {
                    var span = document.createElement('span');
                    span.textContent = currentDay;
                    span.style.display = 'inline-block';
                    span.style.padding = '5px';
                    span.style.width = '33px';
                    span.style.height = '33px';
                    span.style.lineHeight = '20px';
                    span.style.textAlign = 'center';
                    span.style.borderRadius = '50%';

                    // Tanggal dalam format YYYY-MM-DD
                    var currentDateStr = year + '-' + String(month + 1).padStart(2, '0') + '-' + String(currentDay).padStart(2, '0');

                    // Cek apakah ada event pada tanggal ini
                    if (eventsByDate[currentDateStr]) {
                        // Object untuk mengelompokkan event berdasarkan created_at
                        var eventsGroupedByCreatedAt = {};

                        // Mengelompokkan event berdasarkan created_at
                        eventsByDate[currentDateStr].forEach(function(event) {
                            if (!eventsGroupedByCreatedAt[event.created_at]) {
                                eventsGroupedByCreatedAt[event.created_at] = [];
                            }
                            eventsGroupedByCreatedAt[event.created_at].push(event);
                        });

                        // Membuat div untuk setiap group created_at
                        Object.keys(eventsGroupedByCreatedAt).forEach(function(createdAt) {
                            var events = eventsGroupedByCreatedAt[createdAt];
                            var eventDiv = document.createElement('div');
                            eventDiv.className = 'event-rect';
                            eventDiv.setAttribute('data-bs-toggle', 'modal');
                            eventDiv.setAttribute('data-bs-target', '#eventModal');

                            // Jika hanya ada satu event, gunakan content_pillar dari event tersebut
                            if (events.length === 1) {
                                eventDiv.textContent = events[0].content_pillar;
                            } else {
                                // Jika lebih dari satu event, tampilkan "[Jumlah Data] Plan"
                                eventDiv.textContent = events.length + ' Plan';
                            }

                            // Set background color berdasarkan sosial media dari event pertama
                            var color = socialMediaColors[events[0].sosial_media];
                            if (color) {
                                eventDiv.style.backgroundColor = color;
                            }

                            // Menambahkan event listener untuk mengisi data modal ketika diklik
                            eventDiv.addEventListener('click', function() {
                                fillEventModal(currentDateStr, events);
                            });

                            td.appendChild(eventDiv);
                        });
                    }

                    // Cek apakah tanggal ini adalah hari ini
                    if (year === today.getFullYear() && month === today.getMonth() && currentDay === today.getDate()) {
                        span.style.backgroundColor = '#87D5C8';
                    }

                    td.appendChild(span);
                    currentDay++;
                }

                tr.appendChild(td);
            }

            datesBody.appendChild(tr);

            // Isi baris berikutnya hingga semua tanggal habis
            while (currentDay <= daysInMonth) {
                tr = document.createElement('tr');
                for (var i = 0; i < 7; i++) {
                    var td = document.createElement('td');
                    if (currentDay <= daysInMonth) {
                        var span = document.createElement('span');
                        span.textContent = currentDay;
                        span.style.display = 'inline-block';
                        span.style.padding = '5px';
                        span.style.width = '33px';
                        span.style.height = '33px';
                        span.style.lineHeight = '20px';
                        span.style.textAlign = 'center';
                        span.style.borderRadius = '50%';

                        // Tanggal dalam format YYYY-MM-DD
                        var currentDateStr = year + '-' + String(month + 1).padStart(2, '0') + '-' + String(currentDay).padStart(2, '0');

                        // Cek apakah ada event pada tanggal ini
                        if (eventsByDate[currentDateStr]) {
                            // Object untuk mengelompokkan event berdasarkan created_at
                            var eventsGroupedByCreatedAt = {};

                            // Mengelompokkan event berdasarkan created_at
                            eventsByDate[currentDateStr].forEach(function(event) {
                                if (!eventsGroupedByCreatedAt[event.created_at]) {
                                    eventsGroupedByCreatedAt[event.created_at] = [];
                                }
                                eventsGroupedByCreatedAt[event.created_at].push(event);
                            });

                            // Membuat div untuk setiap group created_at
                            Object.keys(eventsGroupedByCreatedAt).forEach(function(createdAt) {
                                var events = eventsGroupedByCreatedAt[createdAt];
                                var eventDiv = document.createElement('div');
                                eventDiv.className = 'event-rect';
                                eventDiv.setAttribute('data-bs-toggle', 'modal');
                                eventDiv.setAttribute('data-bs-target', '#eventModal');

                                // Jika hanya ada satu event, gunakan content_pillar dari event tersebut
                                if (events.length === 1) {
                                    eventDiv.textContent = events[0].content_pillar;
                                } else {
                                    // Jika lebih dari satu event, tampilkan "[Jumlah Data] Plan"
                                    eventDiv.textContent = events.length + ' Plan';
                                }

                                // Set background color berdasarkan sosial media dari event pertama
                                var color = socialMediaColors[events[0].sosial_media];
                                if (color) {
                                    eventDiv.style.backgroundColor = color;
                                }

                                // Menambahkan event listener untuk mengisi data modal ketika diklik
                                eventDiv.addEventListener('click', function() {
                                    fillEventModal(currentDateStr, events);
                                });

                                td.appendChild(eventDiv);
                            });
                        }

                        // Cek apakah tanggal ini adalah hari ini
                        if (year === today.getFullYear() && month === today.getMonth() && currentDay === today.getDate()) {
                            span.style.backgroundColor = '#87D5C8';
                        }

                        td.appendChild(span);
                        currentDay++;
                    }
                    tr.appendChild(td);
                }
                datesBody.appendChild(tr);
            }
        }

        function fillEventModal(dateStr, events) {
            // Ubah format created_at menjadi [Nama Hari], [Angka Tanggal] [Nama Bulan] [Angka Tahun]
            var date = new Date(events[0].created_at); // Menggunakan created_at dari event pertama
            var options = {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            };
            var formattedDateStr = date.toLocaleDateString('id-ID', options);

            var modalTitle = 'Detail Kegiatan (' + formattedDateStr + '):';
            document.querySelector('#eventModal .modal-title').innerHTML = modalTitle;

            var modalBodyList = '';

            // Jika ada lebih dari satu event, gabungkan data mereka
            events.forEach(function(event, index) {
                var planNumber = events.length > 1 ? `${index + 1}` : '1';
                modalBodyList += `
                    <ol class="event-detail list-group list-group mt-3">
                        <li class="list-group-item">
                            <strong>Plan Ke:</strong> ${planNumber}<br>
                            <strong>Status:</strong> ${event.status}<br>
                            <strong>Content Type:</strong> ${event.content_type}<br>
                            <strong>Content Pillar:</strong> ${event.content_pillar}<br>
                            <strong style="display: flex;">Caption:</strong> ${event.caption}<br>
                            <strong>CTA/Link:</strong> ${event.cta_link}<br>
                            <strong>Hashtag:</strong> ${event.hashtag}<br>
                        </li>
                    </ol>
                    <div class="text-center mt-3">
                        <img src="${event.file_content ? '<?= base_url('serve-file') ?>/' + event.file_content : 'https://via.placeholder.com/300'}"
                        alt="File Kegiatan" class="img-fluid rounded shadow-sm">
                    </div>
                `;
            });

            document.querySelector('#eventModal .modal-body .tabcontent').innerHTML = modalBodyList;

            // Set image URL berdasarkan event pertama jika ada
            if (events[0].file_content) {
                var filePath = '<?= base_url('serve-file') ?>/' + events[0].file_content;
                document.querySelector('#eventModal .modal-body img').src = filePath;
            } else {
                document.querySelector('#eventModal .modal-body img').src = 'https://via.placeholder.com/300';
            }
        }

        // Menampilkan bulan dan kalender saat ini pada tampilan pertama
        updateDateDisplay(currentDate);
        updateCalendar(currentDate);

        // Event listener untuk tombol "chevron-left"
        document.getElementById('prevMonth').addEventListener('click', function() {
            currentDate.setMonth(currentDate.getMonth() - 1);
            updateDateDisplay(currentDate);
            updateCalendar(currentDate);
        });

        // Event listener untuk tombol "chevron-right"
        document.getElementById('nextMonth').addEventListener('click', function() {
            currentDate.setMonth(currentDate.getMonth() + 1);
            updateDateDisplay(currentDate);
            updateCalendar(currentDate);
        });
    </script>

</body>

</html>