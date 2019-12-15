<!DOCTYPE html>
<html dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>EmmaStore</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Common RTL and LTR -->
   



    <link rel="stylesheet" href="{{asset('dashboard_files/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard_files/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard_files/css/skin-blue.min.css')}}">

 <!-- RTL Version -->
 @if (app()->getLocale() == 'ar')

    <link rel="stylesheet" href="{{asset('dashboard_files/css/font-awesome-rtl.min.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard_files/css/AdminLTE-rtl.min.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Cairo:400,700" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('dashboard_files/css/bootstrap-rtl.min.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard_files/css/rtl.css')}}">

    <style>
        body, h1, h2, h3, h4, h5, h6 {
            font-family: 'Cairo', sans-serif !important;
        }
    </style>
    @else
  
  <!-- LTR Version -->
  
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <link rel="stylesheet" href="{{asset('dashboard_files/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{asset('dashboard_files/css/AdminLTE.min.css')}}">

@endif
    <!-- jQuery 3 -->
    <script src="{{asset('dashboard_files/js/jquery.min.js')}}"></script>

    <!-- noty -->
    <link rel="stylesheet" href="{{asset('dashboard_files/plugins/noty/noty.css')}}">
    <script src="{{asset('dashboard_files/plugins/noty/noty.min.js')}}"></script>

    <!-- morris -->
    <link rel="stylesheet" href="{{asset('dashboard_files/plugins/morris/morris.css')}}">

    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('dashboard_files/plugins/icheck/all.css')}}">

    <!-- html in  ie -->
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

</head>
<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">

    <header class="main-header">

        <!-- Logo -->
        <a href="dashboard/index2.html" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            
            <span class="logo-lg"><b>Emma</b>Store</span>
        </a>

        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">

                    {{-- language --}}

                    <li style="margin-top:7px">

                    <div class="dropdown">
                      <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        @lang('site.language')
                        <span class="caret"></span>
                      </button>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                           @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <li>
                                    <a rel="alternate" class="dropdown-item" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                        {{ $properties['native'] }}
                                    </a>
                                </li>
                            @endforeach
                      </ul>
                    </div>               
                    </li>


                 


                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{ auth()->user()->image_path }}" class="user-image" alt="User Image">
                            <span class="hidden-xs">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</span>
                        </a>
                        <ul class="dropdown-menu">

                            {{--<! User image ->--}}
                            <li class="user-header">
                                <img src="{{ auth()->user()->image_path }}" class="img-circle" alt="User Image">

                                <p>
                                    {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}
                                    
                                </p>
                            </li>

                            {{--<! Menu Footer>--}}
                                     <li class="user-footer">


                                <a href="{{ route('logout') }}" class="btn btn-default btn-flat" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">@lang('site.logout')</a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>

                            </li>
                        </ul>
                    </li>

                </ul>
            </div>
        </nav>

    </header>

    @include('layouts.dashboard._sidebar')

    @include('partials._session')

    @yield('content')

    



    <footer class="main-footer">
        
        <strong>Copyright &copy; 2020 All rights reserved.
    </footer>

</div><!-- end of wrapper -->



<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('dashboard_files/js/bootstrap.min.js') }}"></script>

<!-- icheck -->
<script src="{{ asset('dashboard_files/plugins/icheck/icheck.min.js') }}"></script>

<!-- FastClick -->
<script src="{{asset('dashboard_files/js/fastclick.js')}}"></script>

<!-- AdminLTE App -->
<script src="{{asset('dashboard_files/js/adminlte.min.js')}}"></script>

<!-- ckeditor standard -->
<script src="{{asset('dashboard_files/plugins/ckeditor/ckeditor.js')}}"></script>

<!-- jquery number -->
<script src="{{asset('dashboard_files/js/jquery.number.min.js')}}"></script>

<!-- print this -->
<script src="{{asset('dashboard_files/js/printThis.js')}}"></script>

<!-- morris --> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="{{asset('dashboard_files/plugins/morris/morris.min.js')}}"></script>

<!-- custom js -->
<script src="{{asset('dashboard_files/js/custom/image_preview.js')}}"></script>
<script src="{{asset('dashboard_files/js/custom/order.js')}}"></script>

<script>
    $(document).ready(function () {

        $('.sidebar-menu').tree();

        //icheck
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        });


// delete image
    $('.delete').click(function (e) {

            var that = $(this)

            e.preventDefault();

            var n = new Noty({
                text: "@lang('site.confirm_delete')",
                type: "alert",
                killer: true,
                buttons: [
                    Noty.button("@lang('site.yes')", 'btn btn-danger mr-2', function () {
                        that.closest('form').submit();
                    }),

                    Noty.button("@lang('site.no')", 'btn btn-primary mr-2', function () {
                        n.close();
                    })
                ]
            });

            n.show();

        });//end of delete

    //preview image
  
   $(".image").change(function () {
        
            if (this.files && this.files[0]) {
                var reader = new FileReader();
        
                reader.onload = function (e) {
                    $('.image-preview').attr('src', e.target.result);
                }
        
                reader.readAsDataURL(this.files[0]);
            }
        
        });//end preview

   CKEDITOR.config.language =  "{{ app()->getLocale() }}";
        
    });//end of ready




    
</script>
</body>
</html>
