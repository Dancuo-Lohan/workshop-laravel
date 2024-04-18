<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css"
        integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!-- Login navbar -->
    @if (!auth()->check())
        <nav class="navbar navbar-expand-lg navbar-light bg-dark">
            <div class="container">
                <a class="navbar-brand text-white" href="#">Project Management Dashboard</a>
            </div>
        </nav>
    @endif

    @if (auth()->check())
        <!-- Admin navbar -->
        @if (auth()->user()->role->name === 'admin')
            <nav class="navbar navbar-expand-lg navbar-light bg-dark">
                <div class="container">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link text-white"
                                    href="{{ route('administrator.projectManager.index') }}">Projects
                                    manager</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white"
                                    href="{{ route('administrator.project.index') }}">Projects</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white"
                                    href="{{ route('administrator.developer.index') }}">Developers</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('administrator.task.index') }}">Tasks</a>
                            </li>
                        </ul>
                    </div>
                    <a href="{{ route('logout') }}" class="btn btn-light">Déconnexion</a>
                </div>
            </nav>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    @endif
    <div class="container" style="padding:2rem 1rem">
        @yield('content')
    </div>
</body>

</html>
