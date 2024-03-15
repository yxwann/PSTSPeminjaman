<?php
require_once("../../database.php");
$tampil = query("SELECT * FROM user WHERE role='Member'");
// $tampil = showcatatan(); 
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>W FOR WANN</title>

    <!-- Custom fonts for this template-->
    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <!-- Custom styles for this template-->
    <link href="../../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


</head>

<body id="page-top">
<?php
  session_start();
  if ($_SESSION['role'] != "Admin" ){
    header("location:../login.php?msg=belum_login");
}
  if ($_SESSION['status'] != "login") {
    header("location:../login.php?msg=belum_login");
  }
  ?>

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">W FOR WANN<sup>2</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="../../home.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Fitur
            </div>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="../../Barang/barang.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Barang</span></a>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="../../Peminjaman/peminjaman.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Peminjaman</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="user.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>User</span></a>
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

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->



                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                <?= $_SESSION['nama'];
                                  ?>
                                </span>
                                <img class="img-profile rounded-circle" src="../../img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalProfile">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>                         
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tabel Barang</h1>

                    <p class="mb-4">Data Barang mencakup detail vital seperti kode barang, nama barang, kategori, merk,
                        dan jumlah.
                        Ini memberikan gambaran baik tentang inventaris, memudahkan manajemen, dan pengawasan stok.</p>
                        <div class="row">
                     <!-- Member Card Example -->
                     <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                 Data Member</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <a href="#datamember"class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    lihat data ->
                                                </a>
                                        </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <!-- Admin Card Example -->
                         <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Data Admin</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <a href="../Admin/user.php"class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    lihat data ->
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4" id="datamember" >
                        <div class="card-header py-3">
                            <div class="row">
                                <div class="col text-start">
                                    <h6 class="m-0 font-weight-bold text-primary">Data Barang</h6>
                                </div>
                            
                               <div class="col text-end">
                                   <button class="btn btn-primary btn-icon-split ms-auto float-end" type="submit"
                                    data-bs-toggle="modal" data-bs-target="#contohModal">
                                    <span class="text">Tambah Data Barang</span>
                                  </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No Identitas</th>
                                            <th>Nama</th>
                                            <th>Status</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Role</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($tampil as $data): ?>
                                            <tr>

                                                <th scope="row">
                                                    <?= $i; ?>
                                                </th>
                                                <td>
                                                    <?= "$data[no_identitas]"; ?>
                                                </td>
                                                <td>
                                                    <?= "$data[nama]"; ?>
                                                </td>
                                                <td>
                                                    <?= "$data[status]"; ?>
                                                </td>
                                                <td>
                                                    <?= "$data[username]"; ?>
                                                </td>
                                                <td>
                                                    <?= "$data[password]"; ?>
                                                </td>
                                                <td>
                                                    <?= "$data[role]"; ?>
                                                </td>
                                                <td>
                                                    <a href="edit_user.php?id=<?= $data['id'] ?>">Edit</a>|
                                                    <a href="javascript:hapusData(<?= $data['id'] ?>)">Hapus Data</a>
                                                </td>
                                                
                                            </tr>
                                            <?php $i++ ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
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
                        <span>Copyright &copy; ridwmm_</span>
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
    <!-- Modal -->
    <div class="modal fade" id="contohModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        <h6 class="m-0 font-weight-bold text-primary">Tambah Data User Baru</h6>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <p class="mb-4"> </p>
                        <form action="proses_input_usr.php" method="post">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Input Data</h6>
                                </div>
                                <div class="card-body">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">
                                            <div class="form-floating mb-3">
                                                <input type="text" name="no_identitas" class="form-control"
                                                    id="floatingInput" placeholder="Kode Barang">
                                                <label for="floatingInput">No Identitas </label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="text" name="nama" class="form-control"
                                                    id="floatingInput" placeholder="Nama Barang">

                                                <label for="floatingInput">Nama </label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="text" name="status" class="form-control"
                                                    id="floatingInput" placeholder="Kategori">
                                                <label for="floatingInput">Status</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="text" name="username" class="form-control" id="floatingInput"
                                                    placeholder="Merk">

                                                <label for="floatingInput">Username</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="text" name="password" class="form-control"
                                                    id="floatingInput" placeholder="Jumlah">
                                                  <label for="floatingInput">Password</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                            <select class="form-select form-select-lg mb-3" name="role"
                                              aria-label=".form-select-lg example">
                                                      <option selected>-- ROLE --</option>
                                                          <option value="Member">Member</option>
                                                          <option value="Admin">Admin</option>
                                             </select>
                                                <label for="floatingInput">Role</label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan </button>
                </div>
                </form>
            </div>
        </div>
    </div>

      <!-- Profil modal-->
      <div class="modal fade" id="modalProfile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        <h6 class="m-0 font-weight-bold text-primary"></h6>
                    </h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <p class="mb-4"> </p>
                        <form >
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary" style="text-align:center;">Your Profile</h6>
                                </div>
                                <div class="card-body">
                                <div class="form-floating mb-3">
                                                <input class="form-control"
                                                    id="floatingInput" placeholder="Kategori"
                                                    value=" <?= $_SESSION['nama'];?>"  style="cursor: pointer;">
                                                <label for="floatingInput">Nama</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control"
                                                    id="floatingInput" placeholder="Kategori"
                                                    value=" <?= $_SESSION['username'];?>"  style="cursor: pointer;">
                                                <label for="floatingInput">Username</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control"
                                                    id="floatingInput" placeholder="Kategori" 
                                                    value=" <?= $_SESSION['role'];?>" style="cursor: pointer;">
                                                <label for="floatingInput">Role</label>
                                            </div>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
                </form>
            </div>
        </div>
    </div>

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
                <div class="modal-body">Tekan tombol "Logout" untuk keluar</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="../../logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <script language="JavaScript" type="text/javascript">
    function hapusData(id) {
      if (confirm("Apakah anda yakin akan menghapus data ini?")) {
       window.location.href = 'hapus.php?id=' + id;
      }
    }

  </script>
    <!-- Bootstrap core JavaScript-->
    <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../../js/demo/datatables-demo.js"></script>
</body>

</html>