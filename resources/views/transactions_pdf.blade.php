<!DOCTYPE html>
<html>

<head>
    <title>Laporan Transaksi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/styles.css">
</head>

<body>

    <center>
        <h5>Laporan Transaksi</h4>
            <h6>Toko
        </h5>
    </center>

    <table class="table table-light">
        <thead>
            <tr>
                <th scope="col">No. Nota</th>
                <th scope="col">Tgl Transaksi</th>
                <th scope="col">Nama Petugas</th>
                <th scope="col">Nama Pembeli</th>
                <th scope="col">Status</th>
                <th scope="col">Total</th>
                <th scope="col">Bayar</th>
                <th scope="col">Kembalian</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            
                @foreach ($transactions as $transaction)
                    <td>{{ $transaction->tgl_transaksi }}</td>
                    <td>{{ $transaction->user->nama }}</td>
                    <td>{{ $transaction->nama_pembeli }}</td>
                    <td>{{ $transaction->status }}</td>
                    <td>{{ $transaction->total_harga }}</td>
                    <td>{{ $transaction->bayar }}</td>
                    <td>{{ $transaction->kembalian }}</td>
                   
            </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
