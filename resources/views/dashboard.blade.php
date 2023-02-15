<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Dashboard</title>
</head>
<body>

    <div class="d-flex" id="wrapper">
        <!-- Sidebar-->
        <div class="border-end bg-dark text-light" id="sidebar-wrapper" style="width: 200px; height: 700px;">
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

    <div class="card-body mt-2">
        <center><h5 class="card-text">{{ $produk }}</h5>
        <h6 class="card-text">Jumlah Total Produk</h6></center>
    </div>
</body>
</html>