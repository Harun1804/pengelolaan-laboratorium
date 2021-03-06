<!-- Sidebar -->
<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="{{ asset('assets/img/default.png') }}" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            {{ auth()->user()->username }}
                            <span class="user-level">{{ ucfirst(auth()->user()->role) }}</span>
                        </span>
                    </a>
                </div>
            </div>
            <ul class="nav nav-primary">
                <li class="nav-item @if(Request::segment(2) == 'dashboard') active @endif">
                    <a href="
                    @if (auth()->user()->role == 'admin')
                        {{ route('admin.dashboard') }}
                    @else
                        {{ route('petugas.dashboard') }}    
                    @endif">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Menu</h4>
                </li>

                @if (auth()->user()->role == 'admin')
                    <li class="nav-item @if(Request::segment(2) == 'personil') active @endif">
                        <a href="{{ route('admin.personil') }}">
                            <i class="fas fa-users"></i>
                            <p>Personil</p>
                        </a>
                    </li>

                    <li class="nav-item @if(Request::segment(2) == 'alat') active @endif">
                        <a href="{{ route('admin.alat') }}">
                            <i class="fas fa-toolbox"></i>
                            <p>Kelola Alat</p>
                        </a>
                    </li>

                    <li class="nav-item @if(Request::segment(2) == 'kegiatan') active @endif">
                        <a href="{{ route('admin.kegiatan') }}">
                            <i class="fas fa-list-ul"></i>
                            <p>Kelola Kegiatan</p>
                        </a>
                    </li>

                @endif

                @if (in_array(auth()->user()->role,['admin','petugas']))
                    <li class="nav-item @if(Request::segment(1) == 'patologi') active @endif">
                        <a data-toggle="collapse" href="#submenu">
                            <i class="fas fa-plus-circle"></i>
                            <p>Patologi Klinik</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="submenu">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a data-toggle="collapse" href="#subnav1">
                                        <span class="sub-item">Kimia Klinik</span>
                                        <span class="caret"></span>
                                    </a>
                                    <div class="collapse" id="subnav1">
                                        <ul class="nav nav-collapse subnav">
                                            <li>
                                                <a href="{{ route('patologi.kimia.maintenance') }}">
                                                    <span class="sub-item">Maintenance</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('patologi.kimia.penggunaan') }}">
                                                    <span class="sub-item">Penggunaan Alat</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('patologi.kimia.pemeliharaan') }}">
                                                    <span class="sub-item">Pemeliharaan Alat</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('patologi.kimia.monitoring') }}">
                                                    <span class="sub-item">Monitoring dan Evaluasi</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <a data-toggle="collapse" href="#subnav2">
                                        <span class="sub-item">Hematologi</span>
                                        <span class="caret"></span>
                                    </a>
                                    <div class="collapse" id="subnav2">
                                        <ul class="nav nav-collapse subnav">
                                            <li>
                                                <a href="{{ route('patologi.hematologi.maintenance') }}">
                                                    <span class="sub-item">Maintenance</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('patologi.hematologi.penggunaan') }}">
                                                    <span class="sub-item">Penggunaan Alat</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('patologi.hematologi.pemeliharaan') }}">
                                                    <span class="sub-item">Pemeliharaan Alat</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('patologi.hematologi.monitoring') }}">
                                                    <span class="sub-item">Monitoring dan Evaluasi</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <a data-toggle="collapse" href="#subnav3">
                                        <span class="sub-item">Urinalisis</span>
                                        <span class="caret"></span>
                                    </a>
                                    <div class="collapse" id="subnav3">
                                        <ul class="nav nav-collapse subnav">
                                            <li>
                                                <a href="{{ route('patologi.urinalisis.maintenance') }}">
                                                    <span class="sub-item">Maintenance</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('patologi.urinalisis.penggunaan') }}">
                                                    <span class="sub-item">Penggunaan Alat</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('patologi.urinalisis.pemeliharaan') }}">
                                                    <span class="sub-item">Pemeliharaan Alat</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('patologi.urinalisis.monitoring') }}">
                                                    <span class="sub-item">Monitoring dan Evaluasi</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <a data-toggle="collapse" href="#subnav4">
                                        <span class="sub-item">Imunoserologi</span>
                                        <span class="caret"></span>
                                    </a>
                                    <div class="collapse" id="subnav4">
                                        <ul class="nav nav-collapse subnav">
                                            <li>
                                                <a href="{{ route('patologi.imunoserologi.maintenance') }}">
                                                    <span class="sub-item">Maintenance</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('patologi.imunoserologi.penggunaan') }}">
                                                    <span class="sub-item">Penggunaan Alat</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('patologi.imunoserologi.pemeliharaan') }}">
                                                    <span class="sub-item">Pemeliharaan Alat</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('patologi.imunoserologi.monitoring') }}">
                                                    <span class="sub-item">Monitoring dan Evaluasi</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item @if(Request::segment(1) == 'resume') active @endif">
                        <a data-toggle="collapse" href="#resume">
                            <i class="fas fa-file-alt"></i>
                            <p>Resume</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="resume">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a data-toggle="collapse" href="#subnav5">
                                        <span class="sub-item">Kimia Klinik</span>
                                        <span class="caret"></span>
                                    </a>
                                    <div class="collapse" id="subnav5">
                                        <ul class="nav nav-collapse subnav">
                                            <li>
                                                <a href="{{ route('resume.kimia.maintenance.index') }}">
                                                    <span class="sub-item">Maintenance</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('resume.kimia.penggunaan.index') }}">
                                                    <span class="sub-item">Penggunaan Alat</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('resume.kimia.pemeliharaan.index') }}">
                                                    <span class="sub-item">Pemeliharaan Alat</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('resume.kimia.monitoring.index') }}">
                                                    <span class="sub-item">Monitoring dan Evaluasi</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <a data-toggle="collapse" href="#subnav6">
                                        <span class="sub-item">Hematologi</span>
                                        <span class="caret"></span>
                                    </a>
                                    <div class="collapse" id="subnav6">
                                        <ul class="nav nav-collapse subnav">
                                            <li>
                                                <a href="{{ route('resume.hematologi.maintenance.index') }}">
                                                    <span class="sub-item">Maintenance</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('resume.hematologi.penggunaan.index') }}">
                                                    <span class="sub-item">Penggunaan Alat</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('resume.hematologi.pemeliharaan.index') }}">
                                                    <span class="sub-item">Pemeliharaan Alat</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('resume.hematologi.monitoring.index') }}">
                                                    <span class="sub-item">Monitoring dan Evaluasi</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <a data-toggle="collapse" href="#subnav7">
                                        <span class="sub-item">Urinalisis</span>
                                        <span class="caret"></span>
                                    </a>
                                    <div class="collapse" id="subnav7">
                                        <ul class="nav nav-collapse subnav">
                                            <li>
                                                <a href="{{ route('resume.urinalisis.maintenance.index') }}">
                                                    <span class="sub-item">Maintenance</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('resume.urinalisis.penggunaan.index') }}">
                                                    <span class="sub-item">Penggunaan Alat</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('resume.urinalisis.pemeliharaan.index') }}">
                                                    <span class="sub-item">Pemeliharaan Alat</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('resume.urinalisis.monitoring.index') }}">
                                                    <span class="sub-item">Monitoring dan Evaluasi</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <a data-toggle="collapse" href="#subnav8">
                                        <span class="sub-item">Imunoserologi</span>
                                        <span class="caret"></span>
                                    </a>
                                    <div class="collapse" id="subnav8">
                                        <ul class="nav nav-collapse subnav">
                                            <li>
                                                <a href="{{ route('resume.imunoserologi.maintenance.index') }}">
                                                    <span class="sub-item">Maintenance</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('resume.imunoserologi.penggunaan.index') }}">
                                                    <span class="sub-item">Penggunaan Alat</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('resume.imunoserologi.pemeliharaan.index') }}">
                                                    <span class="sub-item">Pemeliharaan Alat</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('resume.imunoserologi.monitoring.index') }}">
                                                    <span class="sub-item">Monitoring dan Evaluasi</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->
