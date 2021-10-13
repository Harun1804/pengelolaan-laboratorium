<!-- Sidebar -->
<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="../assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
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
                            <i class="fas fa-users"></i>
                            <p>Kelola Alat</p>
                        </a>
                    </li>

                    <li class="nav-item @if(Request::segment(2) == 'kegiatan') active @endif">
                        <a href="{{ route('admin.kegiatan') }}">
                            <i class="fas fa-users"></i>
                            <p>Kelola Kegiatan</p>
                        </a>
                    </li>
                @endif
                
                @if (auth()->user()->role == 'petugas')                    
                <li class="nav-item">
                    <a data-toggle="collapse" href="#base">
                        <i class="fas fa-layer-group"></i>
                        <p>Alat</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="base">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="components/avatars.html">
                                    <span class="sub-item">Input</span>
                                </a>
                            </li>
                            <li>
                                <a href="components/buttons.html">
                                    <span class="sub-item">Maintenance</span>
                                </a>
                            </li>
                            <li>
                                <a href="components/gridsystem.html">
                                    <span class="sub-item">Penggunaan</span>
                                </a>
                            </li>
                            <li>
                                <a href="components/panels.html">
                                    <span class="sub-item">Pemeliharaan</span>
                                </a>
                            </li>
                            <li>
                                <a href="components/notifications.html">
                                    <span class="sub-item">Monitoring & Evaluasi</span>
                                </a>
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
