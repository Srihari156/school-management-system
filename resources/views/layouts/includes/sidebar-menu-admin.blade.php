 <button class="btn btn-info btn-outline-dark mt-3" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
            &#9776; Menu
        </button>
        <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasExample"
            aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasExampleLabel">{{$loginName ?? 'Admin Page'}} </h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <nav class="navbar navbar-expand">
                    <div class="container-fluid">
                        <!-- <a class="navbar-brand" href="#">Navbar</a> -->
                        <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="true" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span> -->
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                            <div class="navbar-nav flex-column align-items-center">
                                <a class="nav-link text-light" href="{{route('admin.admin-page')}}">Home</a>
                                <a class="nav-link text-light" href="{{route('admin.admin-student-add')}}">Student</a>
                                <a class="nav-link text-light" href="{{route('admin.admin-class-add')}}">Class</a>
                                <a class="nav-link text-light" href="{{route('admin.admin-teacher-add')}}">Teacher</a>
                                <a class="nav-link text-light" href="{{route('admin.admin-subject-add')}}">Subject</a>
                                <a class="nav-link text-light" href="{{route('admin.admin-assign-teacher-class')}}">Teacher Assign Class</a>
                                <a class="nav-link text-light" href="{{route('admin.admin-change-password')}}">Change Password</a>
                                <form action="{{route('admin.logout')}}" method="post" id="logout-admin">
                                    @csrf
                                    <button type="submit" class="nav-link btn btn-link text-light p-2 text-decoration-none">Logout</button>
                                </form>
                                {{-- <a class="nav-link text-dark" href="{{route('admin.logout')}}">Logout</a> --}}
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>


