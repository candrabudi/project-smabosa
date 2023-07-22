<!DOCTYPE html>

<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="../../backend/" data-template="vertical-menu-template-no-customizer">

<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>@yield('title') - Bosa</title>

    <meta name="description" content="" />
    @include('admin.layouts.template.styles')
    <style>
        .toast-body{
            background-color: #FFF;
            color: #000;
        }
    </style>
</head>

<body>
    @include('sweetalert::alert')
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            @include('admin.layouts.template.sidebar')

            <div class="bs-toast toast toast-placement-ex m-2" style="border: none;" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="2000">
                <div class="toast-header p-2" style="border: none; border-radius: 2px;background: #EEE;">
                    <i class="ti ti-arrows-cross ti-xs me-2"></i>
                    <div class="me-auto fw-semibold">Something Wrong Error</div>
                    
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">Sepertinya ada masalah internal.</div>
            </div>

            <div class="layout-page">


                @include('admin.layouts.template.navbar')


                <div class="content-wrapper">

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="row">
                            @yield('content')
                        </div>
                    </div>

                    <footer class="content-footer footer bg-footer-theme">
                        <div class="container-xxl">
                            <div
                                class="footer-container d-flex align-items-center justify-content-between py-2 flex-md-row flex-column">
                                <div>
                                    ©
                                    <script>
                                        document.write(new Date().getFullYear());
                                    </script>
                                    , made with ❤️ by <a href="#" target="_blank"
                                        class="fw-semibold">Smabosa</a>
                                </div>
                            </div>
                        </div>
                    </footer>


                    <div class="content-backdrop fade"></div>
                </div>

            </div>

        </div>


        <div class="layout-overlay layout-menu-toggle"></div>

        <div class="drag-target"></div>
    </div>
    @include('admin.layouts.template.scripts')
</body>

</html>