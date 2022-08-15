

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
<meta name="author" content="Creative Tim">
<title>Argon Dashboard - Free Dashboard for Bootstrap 4</title>

<link rel="icon" href="../assets/img/brand/favicon.png" type="image/png">

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">

<link rel="stylesheet" href="../assets/vendor/nucleo/css/nucleo.css" type="text/css">
<link rel="stylesheet" href="../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">

<link rel="stylesheet" href="../assets/css/argon.css?v=1.2.0" type="text/css">
</head>
<body>

<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
<div class="scrollbar-inner">

<div class="sidenav-header  align-items-center">
<a class="navbar-brand" href="javascript:void(0)">
<img src="../assets/img/brand/blue.png" class="navbar-brand-img" alt="...">
</a>
</div>
<div class="navbar-inner">

<div class="collapse navbar-collapse" id="sidenav-collapse-main">

<ul class="navbar-nav">
<li class="nav-item">
<a class="nav-link" href="/dashboard">
<i class="ni ni-tv-2 text-primary"></i> Dashboard
</a>
</li>
<li class="nav-item">
<a class="nav-link" href="/penjadwalan">
<i class="ni ni-calendar-grid-58 text-blue"></i>
<span class="nav-link-text">Penjadwalan</span>
</a>
</li>
<li class="nav-item">
<a class="nav-link" href="/dosen">
<i class="ni ni-badge text-blue"></i>
<span class="nav-link-text">Dosen</span>
</a>
</li>

<li class="nav-item">
<a class="nav-link active" href="#navbar-examples" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples">
<i class="ni ni-active-40 text-blue" style="color: #f4645f;"></i>
<span class="nav-link-text">Waktu</span>
</a>
<div class="collapse show" id="navbar-examples">
<ul class="nav nav-sm flex-column">
<li class="nav-item">
<a class="nav-link" href="/hari">Hari</a>
</li>
<li class="nav-item">
<a class="nav-link" href="/jam">Jam</a>
</li>
</ul>




<li class="nav-item">
<a class="nav-link" href="/jadwalkuliah">
<i class="ni ni-single-copy-04 text-blue"></i>
<span class="nav-link-text">Jadwal Kuliah</span>
</a>
</li>
<li class="nav-item ">
<a class="nav-link" href="/matakuliah">
<i class="ni ni-folder-17 text-blue"></i> Mata Kuliah</a>
</li>
<li class="nav-item">
<a class="nav-link" href="/pengampu">
<i class="ni ni-briefcase-24 text-blue"></i>
<span class="nav-link-text">Pengampu</span>
</a>
</li>
<li class="nav-item">
<a class="nav-link" href="/ruang">
<i class="ni ni-building text-blue"></i>
<span class="nav-link-text">Ruang</span>
</a>
</li>
<li class="nav-item">
<a class="nav-link" href="/waktu_tidak_bersedia">
<i class="ni ni-time-alarm text-blue"></i>
<span class="nav-link-text">Waktu Tidak Bersedia</span>
</a>
</li>
</ul>

<hr class="my-3">

<ul class="navbar-nav mb-md-3">

<li class="nav-item">
<a class="nav-link" href="/user">
<i class="ni ni-single-02"></i>
<span class="nav-link-text">User</span>
</a>
</li>
<li class="nav-item">
<a class="nav-link" href="/logout">
<i class="ni ni-user-run"></i>
<span class="nav-link-text">Logout</span>
</a>
</li>
</ul>
</div>
</div>
</nav>

<div class="main-content" id="panel">

<nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
<div class="container-fluid">
<div class="collapse navbar-collapse" id="navbarSupportedContent">

<form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
<div class="form-group mb-0">
<div class="input-group input-group-alternative input-group-merge">
<div class="input-group-prepend">
<span class="input-group-text"><i class="fas fa-search"></i></span>
</div>
<input class="form-control" placeholder="Search" type="text">
</div>
</div>
<button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
<span aria-hidden="true">×</span>
</button>
</form>

<ul class="navbar-nav align-items-center  ml-md-auto ">
<li class="nav-item d-xl-none">

<div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
<div class="sidenav-toggler-inner">
<i class="sidenav-toggler-line"></i>
<i class="sidenav-toggler-line"></i>
<i class="sidenav-toggler-line"></i>
</div>
</div>
</li>


<ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
<li class="nav-item dropdown">
<a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<div class="media align-items-center">
<span class="avatar avatar-sm rounded-circle">
<img alt="Image placeholder" src="../assets/img/theme/team-4.jpg">
</span>
<div class="media-body  ml-2  d-none d-lg-block">
<span class="mb-0 text-sm  font-weight-bold">John Snow</span>
</div>
</div>
</a>
<div class="dropdown-menu  dropdown-menu-right ">
<div class="dropdown-header noti-title">
<h6 class="text-overflow m-0">Welcome!</h6>
</div>
<a href="#!" class="dropdown-item">
<i class="ni ni-single-02"></i>
<span>My profile</span>
</a>
<a href="#!" class="dropdown-item">
<i class="ni ni-settings-gear-65"></i>
<span>Settings</span>
</a>
<a href="#!" class="dropdown-item">
<i class="ni ni-calendar-grid-58"></i>
<span>Activity</span>
</a>
<a href="#!" class="dropdown-item">
<i class="ni ni-support-16"></i>
<span>Support</span>
</a>
<div class="dropdown-divider"></div>
<a href="#!" class="dropdown-item">
<i class="ni ni-user-run"></i>
<span>Logout</span>
</a>
</div>
</li>
</ul>
</div>
</div>
</nav>


<div class="header bg-primary pb-6">
<div class="container-fluid">
<div class="header-body">
<div class="row align-items-center py-4">
<div class="col-lg-6 col-7">
<h6 class="h2 text-white d-inline-block mb-0">TABEL RUANG</h6>

</div>
<div class="col-lg-6 col-5 text-right">
<a href="#" class="btn btn-sm btn-neutral">New</a>
<a href="#" class="btn btn-sm btn-neutral">Filters</a>
</div>
</div>
</div>
</div>
</div>

<div class="container-fluid mt--6">
<div class="row">
<div class="col">
<div class="card">

<div class="card-header border-0">
<h3 class="mb-0">Ruang</h3>
</div>

<div class="table-responsive">
<table class="table align-items-center table-flush">
<thead class="thead-light">
<tr>
<th scope="col" class="sort" data-sort="nama">NAMA</th>
<th scope="col" class="sort" data-sort="kapasitas">KAPASITAS</th>
<th scope="col" class="sort" data-sort="jenis">JENIS</th>
<th scope="col">OPTION</th>
</tr>
</thead>
<tbody class="list">
@foreach($ruangs as $ruang)
<tr>

<td>{{ $ruang->nama }}</td>
<td>{{ $ruang->kapasitas }}</td>
<td>{{ $ruang->jenis }}</td>


<td class="text-left">
<router-link :to="{name: 'ruang.edit', params:{id: ruang.id }}" class="btn btn-sm btn-primary mr-1">EDIT</router-link>
<button @click.prevent="hariDelete(hari.id)" class="btn btn-sm btn-danger ml-1">DELETE</button>
</td>
</tr>
@endforeach
</tbody>
</table>
</div>




<div class="card-footer py-4">
<router-link :to="{name: 'ruang.create'}" class="btn btn-md btn-success">TAMBAH RUANG</router-link>
<nav aria-label="...">
<ul class="pagination justify-content-end mb-0">
<li class="page-item disabled">
<a class="page-link" href="#" tabindex="-1">
<i class="fas fa-angle-left"></i>
<span class="sr-only">Previous</span>
</a>
</li>
<li class="page-item active">
<a class="page-link" href="#">1</a>
</li>
<li class="page-item">
<a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
</li>
<li class="page-item"><a class="page-link" href="#">3</a></li>
<li class="page-item">
<a class="page-link" href="#">
<i class="fas fa-angle-right"></i>
<span class="sr-only">Next</span>
</a>
</li>
</ul>
</nav>
</div>
</div>
</div>
</div>



<footer class="footer pt-0">
<div class="row align-items-center justify-content-lg-between">
<div class="col-lg-6">
<div class="copyright text-center text-xl-left text-muted">
&copy; 2022 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Creative Tim</a> &amp;
<a href="https://www.updivision.com" class="font-weight-bold ml-1" target="_blank">Updivision</a>
</div>
</div>
<div class="col-xl-6">
<ul class="nav nav-footer justify-content-center justify-content-xl-end">
<li class="nav-item">
<a href="https://www.creative-tim.com" class="nav-link" target="_blank">Creative Tim</a>
</li>
<li class="nav-item">
<a href="https://www.updivision.com" class="nav-link" target="_blank">Updivision</a>
</li>
<li class="nav-item">
<a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About Us</a>
</li>
<li class="nav-item">
<a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
</li>
<li class="nav-item">
<a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md" class="nav-link" target="_blank">MIT License</a>
</li>
</ul>
</div>
</div>
</footer>
</div>
</div>


<script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
<script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/vendor/js-cookie/js.cookie.js"></script>
<script src="../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
<script src="../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>

<script src="../assets/js/argon.js?v=1.2.0"></script>
</body>
</html>