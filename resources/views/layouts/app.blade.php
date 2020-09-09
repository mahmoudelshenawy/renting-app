<!DOCTYPE html>
<html lang="en">
    
@include('layouts.header')
    <!-- START: Body-->
    <body id="main-container" class="default semi-dark">
        <!-- START: Pre Loader-->
        <div class="se-pre-con">
            <img src="{{ asset('dist/images/logo.png') }}" alt="logo" width="23" class="img-fluid"/>
        </div>
        <!-- END: Pre Loader-->

      @include('layouts.navbar')

      @include('layouts.sidebar')

        <!-- START: Main Content-->
        <main>
            <div class="container-fluid">

            @include('components.notification')    
               @yield('content')
            </div>
        </main>
        <!-- END: Content-->

     @include('layouts.footer')


     @stack('scripts')
    </body>
    <!-- END: Body-->
</html>
