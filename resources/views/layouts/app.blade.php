<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Speak_InsAcademy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>

        .top-bar {
            background-color: #f1f1f1;
            padding: 10px 0;
        }
        .navbar {
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .navbar-brand img {
            max-height: 50px;
        }
        .navbar-nav .nav-link {
            color: #333;
        }
        .navbar-nav .nav-link:hover {
            color: #007bff;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .logo {
            width: 250px; /* Ukuran logo yang lebih besar */
            height: auto;
        }
        footer {
          position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: #03318C;
            color: white;
            text-align: center;
            padding: 10px;
        }
    </style>
</head>
<body>
    <!-- Header Section -->
    <header>
        <!-- Top Bar -->
        <div class="container-fluid top-bar">
            <div class="container d-flex justify-content-between">
                <div class="left-info d-flex align-items-center"></div>
            </div>
        </div>

        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <!-- Logo -->
                <a class="navbar-brand" style="color: #03318C; font-weight: bold;" href="#">
                    <img src="images/ps22.png" alt="Speak_InsAcademy Logo" class="logo"> <span></span>

                </a>
                <!-- Mobile Toggle -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Menu Links -->
                <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">

                        <li class="nav-item">
                            <a class="nav-link" href="homes"><i class="fas fa-home"></i> Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="materi"><i class="fas fa-book"></i> Materi dan Link Zoom</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="dokumentasi"><i class="fas fa-camera"></i> Dokumentasi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fas fa-user"></i> Informasi Admin</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="admin"><i class="fas fa-user"></i> Login</a>
                        </li>
                    </ul>



                        </li>


                </div>
            </div>
        </nav>
    </header>
  <body>
      <!-- Main Content -->
      <div class="content">

        <!-- Page Content -->
        @yield('content')
      </div>
    </div>
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <div class="content">
        <!-- Konten utama halaman Anda -->
    </div>
    <br>
    <footer>
        © 2024 Speak_InsAcademy. All rights reserved.
    </footer>
  </body>
</html>
