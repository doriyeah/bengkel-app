<div class="sh-sideleft-menu">
    <label class="sh-sidebar-label">Navigation</label>
    <ul class="nav">
        <li class="nav-item">
            <a href="{{url('dashboard')}}" class="nav-link
            @if(Request::url()==url('dashboard'))active @endif">
                <i class="icon ion-ios-home-outline"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- nav-item -->
        <li class="nav-item">
            <a href="" class="nav-link with-sub @if(Request::url()==url('dashboard/barang'))active @endif">
                <i class="icon ion-ios-cart-outline"></i>
                <span>Barang</span>
            </a>
            <ul class="nav-sub">
                <li class="nav-item"><a href="{{route('index_barang')}}" class="nav-link ">List Barang</a></li>
                <li class="nav-item"><a href="{{route('index_category')}}" class="nav-link ">Category Barang</a></li>


            </ul>
        </li><!-- nav-item -->
        <li class="nav-item">
            <a href="" class="nav-link with-sub @if(Request::url()==url('dashboard/laporan'))active @endif">
                <i class="icon ion-ios-list-outline"></i>
                <span>Laporan</span>
            </a>
            <ul class="nav-sub">
                <li class="nav-item"><a href="{{route('index_laporan')}}" class="nav-link ">List Laporan</a></li>
                <li class="nav-item"><a href="{{route('index_laporan_masuk')}}" class="nav-link ">Laporan Masuk</a></li>
                <li class="nav-item"><a href="{{route('index_laporan_keluar')}}" class="nav-link ">Laporan Keluar</a></li>
            </ul>
        </li><!-- nav-item -->
        @if(Auth::user()->type=='admin')
        <li class="nav-item">
            <a href="" class="nav-link with-sub @if(Request::url()==url('dashboard/user'))active @endif">
                <i class="icon ion-ios-person-outline"></i>
                <span>User</span>
            </a>
            <ul class="nav-sub">
                <li class="nav-item"><a href="{{route('index_user')}}" class="nav-link ">List User</a></li>
                <li class="nav-item"><a href="{{route('post_user')}}" class="nav-link ">Tambah User</a></li>
            </ul>
        </li>
        @endif
        <li class="nav-item">
            <a href="{{route('index_message')}}" class="nav-link @if(Request::url()==url('dashboard/message'))active @endif">
                <i class="icon ion-ios-email-outline"></i>
                <span>Message</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('logout')}}" class="nav-link ">
                <i class="icon ion-power"></i>
                <span>Logout</span>
            </a>

        </li><!-- nav-item -->
    </ul>
</div><!-- sh-sideleft-menu -->