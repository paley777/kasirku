<!DOCTYPE html>
<html>

<head>
    <title>Laporan Barang</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/styles.css">
</head>

<body>

    <center>
        <h5>Laporan Barang</h4>
            <h6>Toko
        </h5>
    </center>

    <table class="table table-light">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tanggal Masuk</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Kategori</th>
                <th scope="col">Stok</th>
                <th scope="col">Harga</th>
             
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php $a = 1; ?>
                @foreach ($goods as $good)
                    <td>{{ $a++ }}</td>
                    <td>{{ $good->tgl_masuk }}</td>
                    <td>{{ $good->nama }}</td>
                    <td>{{ $good->category->nama }}</td>
                    <td>{{ $good->stok }}</td>
                    <td>{{ $good->harga }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
