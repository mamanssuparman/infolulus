<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link {{ $breadcrumb1 == 'Dashboard' ? '' : 'collapsed' }}" href="/dashboard">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->
        <li class="nav-item">
            <a class="nav-link {{ $breadcrumb1 == 'Data Kelas' ? '' : 'collapsed' }}" href="/kelas">
                <i class="bi bi-bank2"></i>
                <span>Data Kelas</span>
            </a>
        </li><!-- End Data Siswa Nav -->
        <li class="nav-item">
            <a class="nav-link {{ $breadcrumb1 == 'Data Siswa' ? '' : 'collapsed' }}" href="/siswa">
                <i class="bi bi-person-circle"></i>
                <span>Data Siswa</span>
            </a>
        </li><!-- End Data Siswa Nav -->
        <li class="nav-item">
            <a class="nav-link {{ $breadcrumb1 == 'Profile' ? '' : 'collapsed' }}" href="/profile">
                <i class="bi bi-person-bounding-box"></i>
                <span>Profile</span>
            </a>
        </li><!-- End Data Profile Nav -->
    </ul>

</aside><!-- End Sidebar-->
