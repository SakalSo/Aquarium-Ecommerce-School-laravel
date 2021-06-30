@extends('layout.app')

{{-- title --}}
@section('title', 'Dashboard')

    {{-- css style --}}
@section('stylesheet')
    <link rel="stylesheet" href="{{ asset('css/dashboard.min.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC&display=swap" rel="stylesheet">
    @yield('dashboard_stylesheet')
@endsection

<style type="text/css">
    body,
    html {
        height: 100%;
    }

    /* workaround modal-open padding issue */

    body.modal-open {
        padding-right: 0 !important;
    }

    #sidebar {
        padding-left: 0;
    }

    /*
 * Off Canvas at medium breakpoint
 * --------------------------------------------------
 */

    @media screen and (max-width: 48em) {
        .row-offcanvas {
            position: relative;
            -webkit-transition: all 0.25s ease-out;
            -moz-transition: all 0.25s ease-out;
            transition: all 0.25s ease-out;
        }

        .row-offcanvas-left .sidebar-offcanvas {
            left: -33%;
        }

        .row-offcanvas-left.active {
            left: 33%;
            margin-left: -6px;
        }

        .sidebar-offcanvas {
            position: absolute;
            top: 0;
            width: 33%;
            height: 100%;
        }
    }

    /*
 * Off Canvas wider at sm breakpoint
 * --------------------------------------------------
 */

    @media screen and (max-width: 34em) {
        .row-offcanvas-left .sidebar-offcanvas {
            left: -45%;
        }

        .row-offcanvas-left.active {
            left: 45%;
            margin-left: -6px;
        }

        .sidebar-offcanvas {
            width: 45%;
        }
    }

    .card {
        overflow: hidden;
    }

    .card-block .rotate {
        z-index: 8;
        float: right;
        height: 100%;
    }

    .card-block .rotate i {
        color: rgba(20, 20, 20, 0.15);
        position: absolute;
        left: 0;
        left: auto;
        right: -10px;
        bottom: 0;
        display: block;
        -webkit-transform: rotate(-44deg);
        -moz-transform: rotate(-44deg);
        -o-transform: rotate(-44deg);
        -ms-transform: rotate(-44deg);
        transform: rotate(-44deg);
    }

</style>

{{-- header --}}
@section('header')
    @include('dashboard.partials.navbar')
@endsection

@section('content')
<div class="container-fluid h-100">
    <div class="row h-100">

      @include('dashboard.partials.sidebar')

      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4 overflow-auto">
        <div class="text-left pb-2 mb-3 border-bottom">
          <h1 class="h2">Dashboard</h1>
        </div>

        @yield('dashboard_content')
      </main>
    </div>
  </div>
@endsection

{{-- footer --}}
@section('footer')
    @yield('dashboard_footer')
@endsection

{{-- Javascript --}}
@section('script')

    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
        feather.replace();
    </script>
    {{-- custom script --}}
    @yield('dashboard_script')
@endsection
