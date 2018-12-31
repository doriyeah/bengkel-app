<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BengkelApp Admin</title>

    <!-- Vendor css -->
    <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.css')}}">
    <link href="{{asset('assets/lib/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('assets/lib/Ionicons/css/ionicons.css')}}" rel="stylesheet">
    <link href="{{asset('assets/lib/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet">
    <link href="{{asset('assets/lib/datatables/jquery.dataTables.css')}}" rel="stylesheet">

    {{--<!-- Shamcey CSS -->--}}
    <link rel="stylesheet" href="{{asset('assets/shamcey/shamcey.css')}}">
    <link rel="stylesheet" href="{{asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/bower_components/datatables/media/css/dataTables.bootstrap.css')}}">
    <link rel="stylesheet" href="{{ asset('bower_components/admin-lte/dist/css/AdminLTE.min.css') }}">

    {{--Selectize CSS--}}
    <link rel="stylesheet" href="{{ asset('bower_components/selectize/dist/css/selectize.bootstrap3.css') }}">

    {{--Sweetalert CSS--}}
    <link rel="stylesheet" type="text/css" href="{{asset('bower_components/sweetalert2/dist/sweetalert2.css')}}">

    {{--Custom CSS--}}
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

</head>
        @include('backend.templates.sidebar')
        @include('backend.templates.header')

    {{-- main-panel --}}
    <div class="sh-mainpanel">
        {{--breadcumb--}}
        <div class="sh-breadcrumb">
            @yield('breadcrumb')
        </div>
        <!-- breadcumb -->

        {{--sh-title--}}
        <div class="sh-pagetitle">
            {{-- title-left--}}
            <div class="input-group">
            </div>
            <!-- title-left -->

            {{--title--}}
            <div class="sh-pagetitle-left">
                @yield('title')
            </div>
            <!-- title -->
        </div>
        <!-- sh-title -->

        {{--sh-page-content--}}
        <div class="sh-pagebody" >
            @yield('content')
        </div>
        <!-- sh-pagebody -->
    </div>
    <!-- main-panel -->


    <!-- MODAl FOR INPUT BARANG-->
    @include('backend.components.modal-input_barang')

    <!-- MODAl FOR INPUT TRANSAKSI-->
    @include('backend.components.modal-input_transaksi')



    <script src="{{asset('assets/lib/jquery/jquery.js')}}"></script>
    <script src="{{asset('assets/bootstrap/js/bootstrap.js')}}"></script>
    <script src="{{asset('assets/lib/popper.js/popper.js')}}"></script>
    <script src="{{asset('assets/lib/bootstrap/bootstrap.js')}}"></script>
    <script src="{{asset('assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js')}}"></script>
    <script src="{{asset('assets/lib/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('assets/lib/datatables-responsive/dataTables.responsive.js')}}"></script>
    <script src="{{asset('assets/shamcey/shamcey.js')}}"></script>
    <script src="{{asset('bower_components/selectize/dist/js/standalone/selectize.min.js')}}"></script>
    <script src="{{asset('bower_components/sweetalert2/dist/sweetalert2.all.js')}}"></script>
    <script src="{{asset('js/style.js')}}"></script>

<script src="{{asset('assets/numeral/numeral.min.js')}}"></script>



@yield('script')

<script>

</script>
</body>
</html>