<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('assets/css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Aduan></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('aduan.create') }}">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Lapor Aduan</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('aduan.index') }}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Data Aduan</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Login</span>
                </a>

            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class="card o-hidden border-0 shadow-lg my-5 w-75 mx-auto">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row justify-content-md-center">
                                <div class="col-lg-9">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Lapor Aduan</h1>
                                        </div>
                                        <form method="post" action="{{ route('aduan.destroy', $item->id) }}"
                                            class="user" enctype="multipart/form-data">
                                            @csrf
                                            @method('DELETE')

                                            <div class="form-group">
                                                <label for="">NIK</label>
                                                <input type="text" name="nik" disabled
                                                    value="{{ $item->nik }}" class="form-control form-control-user"
                                                    id="exampleInputEmail">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Nama</label>
                                                <input type="text" name="nama" disabled
                                                    value="{{ $item->nama }}" class="form-control form-control-user"
                                                    id="exampleInputEmail">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Aduan</label>
                                                <textarea name="aduan" name="aduan" disabled class="form-control" id="" cols="30"
                                                    rows="4">{{ $item->aduan }}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="mr-2">Status :</label>
                                                @switch($item->status)
                                                    @case('diproses')
                                                        <span class="badge badge-secondary">diproses</span>
                                                    @break

                                                    @case('ditolak')
                                                        <span class="badge badge-danger">ditolak</span>
                                                    @break

                                                    @case('selesai')
                                                        <span class="badge badge-success">selesai</span>
                                                    @break

                                                    @default
                                                        <span class="badge badge-primary">baru</span>
                                                @endswitch
                                            </div>
                                            <div class="form-group">
                                                <label for="">Respon Admin</label>
                                                <textarea name="respon" name="aduan" class="form-control" id="" cols="30" rows="4"
                                                    disabled>{{ $item->respon }}</textarea>
                                            </div>

                                            <h3>Foto Aduan</h3>
                                            <label for="" class="form-label mb-2">Foto 1</label>
                                            <div>
                                                <img src="{{ asset('storage/' . $item->foto1) }}" width="300"
                                                    class="img-fluid mb-2" alt="">
                                            </div>

                                            <label for="" class="form-label mb-2">Foto 2</label>
                                            <div>
                                                <img src="{{ asset('storage/' . $item->foto2) }}" width="300"
                                                    class="img-fluid" alt="">
                                            </div>

                                            <h3>Foto Respon Admin</h3>
                                            <label for="" class="form-label mb-2">Foto 1</label>
                                            <div>
                                                <img src="{{ asset('storage/' . $item->foto_respon) }}"
                                                    width="300" class="img-fluid mb-2" alt="">
                                            </div>

                                            <label for="" class="form-label mb-2">Foto 2</label>
                                            <div>
                                                <img src="{{ asset('storage/' . $item->foto_respon_2) }}"
                                                    width="300" class="img-fluid" alt="">
                                            </div>

                                            <label for="" class="form-label mb-2">Foto 3</label>
                                            <div>
                                                <img src="{{ asset('storage/' . $item->foto_respon_3) }}"
                                                    width="300" class="img-fluid" alt="">
                                            </div>

                                            @if (Auth::check())
                                                <div class="">
                                                    <button class="btn btn-danger btn-rounded mt-3">Hapus</button>

                                                </div>
                                            @endif

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('assets/js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('assets/vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('assets/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('assets/js/demo/chart-pie-demo.js') }}"></script>

</body>

</html>
