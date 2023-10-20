<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        {{-- Nhóm đối tác --}}
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                    Nhóm đối tác
                    <i class="fas fa-angle-left right"></i>
                    <span class="badge badge-info right">0</span>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('dvvc-index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Đơn vị vận chuyển</p>
                    </a>
                </li>

            </ul>
        </li>
        {{-- Nhóm điều xe --}}
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                    Nhóm danh sách điều xe
                    <i class="fas fa-angle-left right"></i>
                    <span class="badge badge-info right">0</span>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('cars.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Thông tin xe</p>
                    </a>
                </li>

            </ul>
        </li>
        <li class="nav-item mt-5">
            <a class="btn btn-warning text-dark" href="{{ route('logout') }}" role="button">Đăng xuất</a>
        </li>

    </ul>
</nav>
