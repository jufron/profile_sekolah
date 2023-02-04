<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="icon" type="image/png" href="{{ asset('favicon-16x16.png') }}" sizes="16x16">
  <link rel="icon" type="image/png" href="{{ asset('favicon-32x32.png') }}" sizes="32x32">
  <link rel="icon" type="image/png" href="{{ asset('favicon 48.ico') }}" sizes="48x48">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>{{ config('app.name', 'SMK') }} | {{ $title }} </title>

  {{-- costum font for this template --}}
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  {{-- costum style for this template --}}
  <link href=" {{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

  @isset($style)
    {{ $style }}
  @endisset
</head>
<body id="page-top">

      <!-- Page Wrapper -->
    <div id="wrapper">

      <!-- Sidebar -->
      <x-layouts.sidebar />
      <!-- End of Sidebar -->

      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">

          <!-- Main Content -->
          <div id="content">

              <!-- Topbar -->
              <x-layouts.topbar />
              <!-- End of Topbar -->

              <!-- Begin Page Content -->
              <div class="container-fluid">
                {{ $body }}
              </div>
              <!-- /.container-fluid -->

          </div>
          <!-- End of Main Content -->

          <!-- Footer -->
          <footer class="sticky-footer bg-white">
              <div class="container my-auto">
                  <div class="copyright text-center my-auto">
                      <span>Copyright &copy; Your Website 2021</span>
                  </div>
              </div>
          </footer>
          <!-- End of Footer -->

      </div>
      <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Keluar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                  Apakah anda yakin untuk keluar ?
                </div>
                <div class="modal-footer">
                  <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <button class="btn btn-primary" href="login.html">Keluar</button>
                  </form>
                </div>
            </div>
        </div>
    </div>

  {{ $slot }}
    {{-- bootstrap core javascript --}}
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    {{-- core plugin javascript --}}
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    {{-- costum script for all pages --}}
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

  @isset($script)
    @include('sweetalert::alert')

    {{ $script }}
  @endisset
</body>
</html>
