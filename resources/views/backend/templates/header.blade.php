<div class="sh-logopanel">
    <a href="" class="sh-logo-text">Bengkel</a>
    <a id="navicon" href="" class="sh-navicon d-none d-xl-block"><i class="icon ion-navicon"></i></a>
    <a id="naviconMobile" href="" class="sh-navicon d-xl-none"><i class="icon ion-navicon"></i></a>
</div>
<!-- sh-logopanel -->

<div class="sh-headpanel">
<div class="sh-headpanel-left">

    <!-- START: HIDDEN IN MOBILE -->

        <a href="#modal-transaksi" class="sh-icon-link" data-toggle="modal">
            <div>
                <i class="icon ion-ios-cart"></i>
                <span>Transaksi</span>
            </div>
        </a>

    @if(Auth::user()->type=='admin')
    <a href="#modal-barang" class="sh-icon-link" data-toggle="modal">
        <div>
            <i class="icon ion-ios-plus-outline"></i>
            <span>Input Barang</span>
        </div>
    </a>

    @endif
    <!-- END: HIDDEN IN MOBILE -->

    <!-- START: DISPLAYED IN MOBILE ONLY -->
    <div class="dropdown dropdown-app-list">
        <a href="" data-toggle="dropdown" class="dropdown-link">
            <i class="icon ion-ios-keypad tx-208"></i>
        </a>


        <div class="dropdown-menu">
            <div class="row no-gutters">
                <div class="col-4">
                    <a href="" class="dropdown-menu-link">
                        <div>
                            <i class="icon ion-ios-folder-outline"></i>
                            <span>Payment Confirmation</span>
                        </div>
                    </a>
                </div><!-- col-4 -->
                <div class="col-4">
                    <a href="" class="dropdown-menu-link">
                        <div>
                            <i class="icon ion-ios-gear-outline"></i>
                            <span>Settings</span>
                        </div>
                    </a>
                </div><!-- col-4 -->
                <div class="col-4">
                    <div class="sh-headpanel-right">
                        <a href="" class="dropdown-menu-link">
                            <div>
                                <i class="icon ion-ios-person-outline"></i>
                                <span>Username</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div><!-- row -->
        </div><!-- dropdown-menu -->
    </div><!-- dropdown -->
    <!-- END: DISPLAYED IN MOBILE ONLY -->

</div><!-- sh-headpanel-left -->

    <div class="sh-headpanel-right">
        <a href="" class="sh-icon-link">
            <div>
                <i class="icon ion-ios-person-outline"></i>
                <span>{{Auth::user()->username}}</span>
            </div>
        </a>
    </div>
</div>



