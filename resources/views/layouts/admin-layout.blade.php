<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="{{url('css/style.css')}}">
</head>

<body class="@yield('bg-color')">
    <div class="container">
        @include('layouts.includes.sidebar-menu-admin')
        @yield('content')
    </div>
    <script>
        $(document).ready(function () {
            $('#logout-admin').on('submit', function (event) {
                event.preventDefault();
                $.ajax({
                    url: "{{ route('admin.logout') }}", // Or route('admin.logout')
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    // xhrFields: {
                    //     withCredentials: true
                    // },
                    success: function (response) {
                        //alert(response.message);
                        Swal.fire({
                                title: "Good Job !",
                                text: response.message,
                                icon: 'success'
                        });
                        window.location.href = response.redirect;
                    },
                    error: function (xhr) {
                        // alert("Logout failed");
                        console.log(xhr.responseText);
                        Swal.fire({
                                title: "Error !",
                                text: 'Logout failed',
                                icon: 'error'
                        });
                    }
                });
            });
        });
    </script>
    @yield('script')
</body>

</html>