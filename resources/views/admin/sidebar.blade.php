<div class="col-md-3">
    <div class="card">
        <div class="card-header">
            Admin Menu
        </div>

        <div class="card-body">
            <ul class="nav flex-column" role="tablist">
                <li role="nav-item">
                    <a class="nav-link" href="{{ url('/admin') }}">
                        Dashboard
                    </a>
                </li>
                <li role="nav-item">
                    <a class="nav-link" href="{{ url('/admin/perawatan-kategori') }}">
                        Kategori Perawatan
                    </a>
                </li>
                <li role="nav-item">
                    <a class="nav-link" href="{{ url('/admin/perawatan') }}">
                        Perawatan
                    </a>
                </li>
                <li role="nav-item">
                    <a class="nav-link" href="{{ url('/admin/terapis') }}">
                        Terapis
                    </a>
                </li>
                <li role="nav-item">
                    <a class="nav-link" href="{{ url('/admin/waktu-hari') }}">
                        Setting Day Slot
                    </a>
                </li>
                <li role="nav-item">
                    <a class="nav-link" href="{{ url('/admin/booking') }}">
                        Booking
                    </a>
                </li>
                <li role="nav-item">
                    <a class="nav-link" href="{{ url('/admin/jadwal-terapis') }}">
                        Jadwal Terapis
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
