<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Edit Data</title>
</head>
<body>

  <div class="d-flex" id="wrapper">
    <!-- Sidebar-->
    <div class="border-end bg-dark text-light" id="sidebar-wrapper" style="width: 200px; height: 800px; min-height: 100vh;">
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
    <form action="/produk/{{ $produk->id }}/proses" method="POST" enctype="multipart/form-data"  style=" margin-top: 25px; margin-left: 20px;">
        @csrf
        <h2>Edit Data Produk</h2>
        <label>Nama</label><br>
        <input type="text" name="judulProduk" class="form-control" value="{{ $produk->judulProduk }}" required><br>

        <label>Deskripsi</label><br>
        <input type="text" name="deskripsi" class="form-control" value="{{ $produk->deskripsi }}" required><br>

        <label>Harga</label><br>
        <input type="text" name="harga" class="form-control" value="{{ $produk->harga }}" required><br>

         <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Gambar Produk</label>
    <input type="file" name="gambar" class="form-control" placeholder="Post Title">
                @error('gambar')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
               @enderror
            </div>
            <div class="form-group">
              <img src="{{ asset('foto/'.$produk->gambar) }}" height="200" width="200" alt="" />
            </div>

            <button type="submit" class="btn btn-primary mt-2" value="Simpan">Simpan</button>
  </div>
 </form>
</body>
</html>