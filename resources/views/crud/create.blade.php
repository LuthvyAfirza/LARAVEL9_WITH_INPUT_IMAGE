<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Input Data</title>
</head>
<body> 

    <div class="d-flex" id="wrapper">
        <!-- Sidebar-->
        <div class="border-end bg-dark text-light" id="sidebar-wrapper" style="width: 200px; height: 600px; min-height: 100vh;">
            <h5><div class="sidebar-heading border-bottom bg-dark">Admin School Gallery</div></h5>
            <div class="list-group list-group-flush">
                <h6><a class="list-group-item list-group-item-action list-group-item-light p-3 bg-dark text-light" href="/dashboard">Dashboard</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3 bg-dark text-light" href="/produk">Kelola data produk</a></h6>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-dark" style="float: bottom;">Logout</button>
                </form>
            </div>
        </div>
    <h2 style="position: relative; left: 428px; top: 8px;">Input Data Produk</h2>
    <form action="/produk/store" method="POST" enctype="multipart/form-data" style=" margin-top: 60px; margin-left: 135px;">
        @csrf
    <div class="mb-3">
        <label>Judul Produk</label>
        <input type="text" name="judulProduk" placeholder="Masukkan judul produk" class="form-control"required>
    </div>
    <div class="mb-3">
        <label>Deskripsi</label>
        <input type="text" name="deskripsi" placeholder="Deskripsi produk" class="form-control"required>
    </div>
    <div class="mb-3">
        <label>Harga</label>
        <input type="number" name="harga" placeholder="Harga produk" class="form-control"required>
    </div>
    <div class="mb-3">
        <label>Gambar</label>
        <input type="file" name="gambar" id="gambar" placeholder="Gambar produk" class="form-control" accept="image/*" required><br>
    </div>
        <input type="submit" name="submit" value="Simpan" class="btn btn-dark">
    </form>

</body>
</html>