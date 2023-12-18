<?php
include("../templates/header.php");
require("../db/conn.php");
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: ../login/login.php");
}
$result = mysqli_query($conn, "SELECT * FROM produk");
$rows = [];
while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
}
?>

<link rel="stylesheet" href="../asset/css/home.css">

<div class="kotak">
    <h1>Selamat Di Pusat Kuliner Kudus</h1>
    <p>Dapatkan makanan favoritmu secara mudah disini <span class="fw-bold">Pusat Kulinerku</span><br>Kulineran terbaik
        hanya ada dipusat KulinerKu
    </p>
</div>
<div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <!-- <img src="./asset/img/Kuliner.jpg" class="d-block"> -->
        </div>
        <div class="carousel-item t-1">
            <!-- <img src="./asset/img/makan.jpg" class="d-block"> -->
        </div>
        <div class="carousel-item">
            <!-- <img src="./asset/img/R.jpeg" class="d-block"> -->
        </div>
    </div>
</div>

<?php include("../templates/navbar.php"); ?>
<div class="container">
    <div class="row mt-3 ">
        <h4 class="text-secondary text-center ">Kategori</h4>
        <div class="col mt-3 ">
            <div class="d-flex flex-wrap justify-content-center gap-2">
                <button value="Semua" class="filter btn btn-primary" style="border-radius: 24px;">Semua</button>
                <button value="Bento" class="filter btn btn-primary" style="border-radius: 24px;">Bento</button>
                <button value="Kue" class="filter btn btn-primary" style="border-radius: 24px;">Kue</button>
                <button value="Nasi" class="filter btn btn-primary" style="border-radius: 24px;">Nasi</button>
            </div>
        </div>
    </div>
    <hr>
    <div class="row mt-5">
        <div class="col">
            <h4 class="fw-bold text-secondary text-center">Rekomendasi Makanan</h4>
        </div>
    </div>
    <div class="productBarang row mt-3">
        <div class="row" id="produkList">
            <?php foreach($rows as $produk): ?>
                <div class="col-md-3 mb-4">
                    <div class="card">
                        <div class="imgCont">
                            <img src="admin/asset/img/produk/<?= $produk['gambar']; ?>" class="card-img-top">
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                <?= $produk['nama_produk']; ?>
                            </p>
                            <div class="row">
                                <div class="col-md-8 ">
                                    <small class="text-danger">Rp.
                                        <?= $produk['harga'] ?>
                                    </small>
                                </div>
                                <div class="col-md-4  justify-conten-center">
                                    <p class="text-secondary"><small>Stock:
                                            <?= $produk['stok'] ?>
                                        </small></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="fetch_product.php?id_produk=<?= $produk['id_produk']; ?>"
                                        class="seeDetail btn btn-success btn-sm d-flex align-items-center justify-content-center"
                                        data-id="<?= $produk['id_produk']; ?>" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">Details</a>
                                </div>
                                <div class="col-md-6 ">
                                    <a href="user/index.php"
                                        class="btn btn-primary btn-sm d-flex align-items-center justify-content-center"><span
                                            class="text-center">Beli</span> <span
                                            class="material-symbols-outlined fs-5 inline text-center">
                                            shopping_cart
                                        </span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Details Produk</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?php include("../templates/footer.php"); ?>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"
    integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src="../asset/js/script.js"></script>
<script src="../asset/js/script.js"></script>