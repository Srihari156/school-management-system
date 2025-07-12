<button class="btn btn-info btn-outline-dark mt-3" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
            &#9776; Menu
        </button>
        <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasExample"
            aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasExampleLabel">Teacher Page</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <nav class="navbar navbar-expand">
                    <div class="container-fluid">
                        <!-- <a class="navbar-brand" href="#">Navbar</a> -->
                        <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="true" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span> -->
                        <!-- </button> -->
                        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                            <div class="navbar-nav flex-column align-items-center">
                                <a class="nav-link text-light" href="{{route('teacher.teacher-page')}}">Home</a>
                                <a class="nav-link text-light" href="{{route('teacher.teacher-student-leave-status')}}">Student Leave Status</a>
                                <a class="nav-link text-light" data-bs-toggle="collapse" href="#submenu" role="button">Reports <i class="bi bi-caret-down"></i></a>
                                <ul class="collapse list-styled" id="submenu">
                                    <li><a class="nav-link text-light" href="{{route('teacher.teacher-monthly-reports')}}">Monthly Reports</a></li>
                                    {{-- <li><a class="nav-link text-light" href="{{route('teacher.teacher-student-status-attendance')}}">Student Status Attendance</a></li> --}}
                                </ul>
                                <!-- <a class="nav-link text-dark" href="#"></a>
                                <a class="nav-link text-dark" href="#">Subject</a> -->
                                <a class="nav-link text-light" href="{{route('teacher.teacher-change-password')}}">Change Password</a>
                                <form action="{{route('teacher.logout')}}" method="post" id="logout-teacher">
                                    @csrf
                                    <button type="submit" class="nav-link btn btn-link text-light p-2 text-decoration-none">Logout</button>
                                </form>
                                {{-- <a class="nav-link text-light" href="{{route('teacher.logout')}}">Logout</a> --}}
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>