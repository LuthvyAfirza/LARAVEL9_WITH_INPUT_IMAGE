<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Data Produk</title>
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

<center style="position: relative; left: 205px;">
    <h2 class="me-2">Halaman Kelola Data Produk</h2>

    <a href="/produk/create" class="btn btn-dark" style="position: relative; right: 334px;">Tambah Produk</a>

    <div class="container mt-2">
        <table class="table table-dark" style="width: 800px;">
            <thead class="table-dark">
              <tr>
                <td>Id</td>
                <td>Judul</td>
                <td>Deskripsi</td>
                <td>Harga</td>
                <td>Gambar</td>
                <td>Aksi</td>
              </tr>
            </thead>
            <tbody>
                @foreach($produk as $p)
                <tr>
                    <td>{{ $p->id }}</td>
                    <td>{{ $p->judulProduk }}</td>
                    <td>{{ $p->deskripsi }}</td>
                    <td>{{ $p->harga }}</td>
                    <td><img src="{{ asset('foto/'.$p->gambar) }}" width="90px"></td>
                    <td> <a href="/produk/{{ $p->id }}/edit" class="btn btn-dark">Ubah</a>
                        <form action="/produk/{{ $p->id }}" method="POST">
                            @csrf
                            @method('delete')
                        <input class="btn btn-dark mt-2" type="submit" value="Hapus">
                        </form>
                        </td>
                </tr>
                @endforeach
            </tbody>
          </table>
    </div>
</center>
    
</body>
</html>