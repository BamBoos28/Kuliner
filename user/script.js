$(document).ready(function () {
  $(".seeDetail").click(function () {
    var productId = $(this).attr("href").split("=")[1];
    $.ajax({
      url: "fetch_product.php",
      method: "GET",
      dataType: "json",
      data: {
        id: productId,
      },
      success: function (response) {
        // console.log(response, "responnn");
        var product = response.product;
        if (response.Response == "True") {
          $(".modal-body").html(`
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="../admin/asset/img/produk/${product.gambar}" alt="" class="img-fluid">
                                </div>
                                <div class="col-md-8">
                                    <ul class="list-group">
                                        <li class="list-group-item"><h3>${product.nama_produk}</h3></li>
                                        <li class="list-group-item">Judul Produk : ${product.jenis_produk} </li>
                                        <li class="list-group-item">Stock : ${product.stok} </li>
                                        <li class="list-group-item">Harga : ${product.harga} </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    `);
        }
      },
      error: function (xhr, status, error) {
        console.log(error);
      },
    });
  });

  $(".filter").click(function () {
    var productId = $(this).attr("value").split("=")[0];
    console.log(productId);
    var menus = "";
    $.ajax({
      url: "fetch_menu.php",
      method: "GET",
      dataType: "json",
      data: {
        filter: productId,
      },
      success: function (response) {
        // console.log(response, "responnn");
        var product = response.product;
        console.log(product);
        product.forEach((product) => {
          menus += `<div class="col-md-6 col-xl-3 mb-4">
          <div class="card">
              <div class="imgCont">
                <img src="../admin/asset/img/produk/${product.gambar}" class="card-img-top" style="">
              </div>
              <div class="card-body">
                  <p class="card-text">${product.nama_produk}</p>
                  <div class="row">
                      <div class="col-md-8 ">
                          <small class="text-danger">Rp.${product.harga}</small>
                      </div>
                      <div class="col-md-4  justify-conten-center">
                          <p class="text-secondary"><small>Stock: ${product.stok}</small></p>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-6">
                          <a href="fetch_product.php?id_produk=${product.id_produk}" class="seeDetail btn btn-success btn-sm d-flex align-items-center justify-content-center" data-id="${product.id_produk}" data-bs-toggle="modal" data-bs-target="#exampleModal">Details</a>
                      </div>
                      <div class="col-md-6 ">
                          <a href="beli-produk.php?id_produk=${product.id_produk}" class="btn btn-primary btn-sm d-flex align-items-center justify-content-center"><span class="text-center">Beli</span> <span class="material-symbols-outlined fs-5 inline text-center">
                                  shopping_cart
                              </span></a>
                      </div>
                  </div>
              </div>
          </div>
      </div>`;
        });
        $("#produkList").html(menus);
        $(".seeDetail").click(function () {
          var productId = $(this).attr("href").split("=")[1];
          $.ajax({
            url: "fetch_product.php",
            method: "GET",
            dataType: "json",
            data: {
              id: productId,
            },
            success: function (response) {
              // console.log(response, "responnn");
              var product = response.product;
              console.log(product);
              if (response.Response == "True") {
                $(".modal-body").html(`
                              <div class="container-fluid">
                                  <div class="row">
                                      <div class="col-md-4">
                                          <img src="../admin/asset/img/produk/${product.gambar}" alt="" class="img-fluid">
                                      </div>
                                      <div class="col-md-8">
                                          <ul class="list-group">
                                              <li class="list-group-item"><h3>${product.nama_produk}</h3></li>
                                              <li class="list-group-item">Judul Produk : ${product.jenis_produk} </li>
                                              <li class="list-group-item">Stock : ${product.stok} </li>
                                              <li class="list-group-item">Harga : ${product.harga} </li>
                                          </ul>
                                      </div>
                                  </div>
                              </div>
                          `);
              }
            },
            error: function (xhr, status, error) {
              console.log(error);
            },
          });
        });
      },
      error: function (xhr, status, error) {
        console.log(error);
      },
    });
  });
});
