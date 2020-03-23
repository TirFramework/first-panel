@include(config('crud.admin-panel').'::layouts.head')

<body class="rtl">
@include(config('crud.admin-panel').'::layouts.header')
<div class="col-sm-9 col-sm-offset-3 col-lg-11 col-lg-offset-1 main">
        @include(config('crud.admin-panel').'::layouts.sidebar')
        {{--@include('admin.layouts.breadcrump')--}}
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header" mytitle="@yield('page-heading')">
                        <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 438.533 438.533" viewBox="0 0 438.533 438.533"><path d="M409.133 109.203c-19.608-33.592-46.205-60.189-79.798-79.796C295.736 9.801 259.058 0 219.273 0c-39.781 0-76.47 9.801-110.063 29.407-33.595 19.604-60.192 46.201-79.8 79.796C9.801 142.8 0 179.489 0 219.267c0 39.78 9.804 76.463 29.407 110.062 19.607 33.592 46.204 60.189 79.799 79.798 33.597 19.605 70.283 29.407 110.063 29.407s76.47-9.802 110.065-29.407c33.593-19.602 60.189-46.206 79.795-79.798 19.603-33.596 29.403-70.284 29.403-110.062.001-39.782-9.8-76.472-29.399-110.064zm-55.391 188.005c-13.894 23.791-32.736 42.633-56.527 56.534-23.791 13.894-49.771 20.834-77.945 20.834-28.167 0-54.149-6.94-77.943-20.834-23.791-13.901-42.633-32.743-56.527-56.534-13.897-23.791-20.843-49.772-20.843-77.941 0-28.171 6.949-54.152 20.843-77.943 13.891-23.791 32.738-42.637 56.527-56.53 23.791-13.895 49.772-20.84 77.943-20.84 28.173 0 54.154 6.945 77.945 20.84 23.791 13.894 42.634 32.739 56.527 56.53 13.895 23.791 20.838 49.772 20.838 77.943 0 28.169-6.943 54.15-20.838 77.941z"/><path d="M219.27 146.178c-20.177 0-37.401 7.139-51.678 21.411-14.272 14.277-21.411 31.501-21.411 51.678 0 20.175 7.135 37.402 21.411 51.673 14.277 14.277 31.504 21.416 51.678 21.416 20.179 0 37.406-7.139 51.676-21.416 14.274-14.271 21.413-31.498 21.413-51.673 0-20.177-7.139-37.401-21.413-51.678-14.27-14.273-31.497-21.411-51.676-21.411z"/></svg>
                @yield('page-heading')
            </h1>
            </div>
        </div><!--/.row-->

    {{--Custom System message--}}
    @if ($errors->any())
        <div class="alert bg-danger alert-dismissable fade in" role="alert">
            <a href="#" class="pull-right"><em class="fas fa-lg fa-close" data-dismiss="alert" aria-label="close"></em></a>
            <ul>
                @foreach ($errors->all() as $error)
                    <li> {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{--Custom Success message--}}
    @if (Session::has('message'))
        <div class="alert bg-success" role="alert">
            <a href="#" class="pull-right"><em class="fas fa-lg fa-times" data-dismiss="alert" aria-label="close"></em></a>
            <em class="fas fa-lg fa-exclamation-circle">&nbsp;</em>
            {{ Session::get('message') }}
        </div>
    @endif

    {{--Custom Error message--}}
    @if (Session::has('error'))
        <div class="alert bg-danger alert-dismissable fade in" role="alert">
            <a href="#" class="pull-right"><em class="fas fa-lg fa-times" data-dismiss="alert" aria-label="close"></em></a>
            <em class="fas fa-lg fa-exclamation-circle">&nbsp;</em>
            {{ Session::get('error') }}
        </div>
    @endif


    @yield('content')
</div>


@include(config('crud.admin-panel').'::layouts.footer')

</body>
</html>
