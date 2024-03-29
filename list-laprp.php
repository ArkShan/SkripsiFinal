<?php
     include 'function.php';
     include 'cek.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>SJM - List Barang Retur Pabrik</title>
        <link href="./css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark"> 
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <a class="navbar-brand" href="home.php">Sinar Jaya Motor</a>
            <!-- Navbar Search-->
            <!-- <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form> -->
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <!-- <a class="dropdown-item" href="#">Settings</a>
                        <a class="dropdown-item" href="#">Activity Log</a>
                        <div class="dropdown-divider"></div> -->
                        <a class="dropdown-item" href="logout.php">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <?php require 'nav.php'; ?>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">List Barang Retur Order Sinar Jaya Motor</h1>    
                        <div class="card mb-4">
                            <div class="card-header">
                                <?php if($_SESSION['role'] == "Gudang"){?>
                                    <!-- Button to Open the Modal -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                    Tambah Barang Retur
                                    </button>
                                    <!-- end Button to Open the Modal  -->
                                    <!-- <i class="fas fa-table mr-1"></i> -->
                                    
                                <?php }; ?>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th class="text-center">Nomor Retur Pabrik</th>
                                                <th class="text-center">Tanggal</th>
                                                <th class="text-center">Pabrik</th>
                                                <!-- <th>Pengiriman</th>
                                                <?php if($_SESSION['role'] != "Gudang"){?>
                                                <th>Pembayaran</th> -->
                                                <?php }; ?>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <!-- <tfoot>
                                            <tr>
                                                <th>Name</th>
                                                <th>Position</th>
                                                <th>Office</th>
                                                <th>Age</th>
                                                <th>Start date</th>
                                                <th>Salary</th>
                                            </tr>
                                        </tfoot> -->
                                        <!-- Mulai Field Table -->
                                        <tbody>
                                            <?php
                                                $ambilsemuadatastock = mysqli_query($koneksi,"SELECT * FROM  returp rp, tb_pabrik p WHERE rp.id_p = p.id_p");
                                                
                                                if (!$ambilsemuadatastock) {
                                                    // Query execution failed, handle the error here
                                                    echo "Error executing the query: " . mysqli_error($koneksi);
                                                    exit; // Exit the script if the query failed
                                                }
                                                
                                                $i=1;
                                                while($data=mysqli_fetch_array($ambilsemuadatastock)){
                                                    $idretp     = $data['id_retp'];
                                                    $idp        = $data['id_p'];
                                                    $nop        = $data['no_rp'];
                                                    $namap      = $data['nama_p'];
                                                    $tglro      = $data['tgl_rp'];
                                            ?>
                                            <tr>
                                                <td class="text-center"><?=$i++?></td>
                                                <td class="text-center"><?=$nop;?></td>
                                                <td class="text-center"><?=$tglro;?></td>
                                                <td class="text-center"><?=$namap;?></td>
                                                <td class="text-center"><?php echo "<a href='laporan-rp.php?id_retp=$idretp'>" ;?><button target="_blank" type="button" class="btn btn-primary">Detail</button></a></td>
                                            </tr>
                                            <!-- END Selesai Field Table --> 
                                            <!-- Modal Tambah Barang -->                                     
                                        <?php }; ?>
                                    </tbody> 
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
    <!-- The Modal -->
    <div class="modal fade" id="myModal">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Tambah Barang Masuk</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <!-- Modal body -->
                                                <form method="POST" >
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <!-- <input class="form-control py-4 mb-2" id="inputEmailAddress" name="no_order"      type="text"     placeholder="Nomor Pesanan"   value="<?$newKodeBarang?>"/>                                 -->
                                                            <?php 
                                                                //ambil data terbesar 
                                                                $char = 'RETP';
                                                                $query=mysqli_query($koneksi,"SELECT max(no_rp) as max_kode FROM returp 
                                                                WHERE no_rp LIKE '{$char}%' ORDER BY no_rp DESC LIMIT 1");
                                                                $data = mysqli_fetch_array($query);
                                                                $kodeBarang = $data['max_kode'];

                                                                //mengambil data menggunakan fungsi subtr, 
                                                                //misal data BRG001 akan diambil 001 
                                                                $no = substr($kodeBarang, -3, 3);

                                                                //setelah substring bilangan diambil lantas dicasting menjadi integer
                                                                $no = (int) $no;

                                                                //bilangan yang diambil akan ditambah 1 untuk menentukan nomor urut berikutnya
                                                                $no += 1;

                                                                //perintah sprintf("%03s", $no) berguna untuk membuat string menjadi 3 karakter
                                                                $newKodeBarang = $char . sprintf("%03s", $no);
                                                            ?>
                                                            <input type="text" name="no_rp" id="nmr_po" value="<?= $newKodeBarang; ?>" class="form-control" readonly>
                                                            <select name="pabriknya" class="form-control mb-2">
                                                                <?php
                                                                    $ambilsemuadata = mysqli_query($koneksi,"SELECT * FROM tb_pabrik WHERE stat_p = 0");
                                                                    while($fetcharray = mysqli_fetch_array($ambilsemuadata)){
                                                                        $namap = $fetcharray['nama_p'];
                                                                        $idp = $fetcharray['id_p'];
                                                                ?>
                                                                    <option value="<?=$idp;?>"><?=$namap;?></option> 
                                                                <?php }; ?>
                                                            </select>
                                                            <button type="submit" name="rp1" class="btn btn-primary" >Submit</button>
                                                        </div>
                                                    </div>
                                                    <!-- Modal footer -->
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                <!-- Selesai modal tambah barang -->
</html>