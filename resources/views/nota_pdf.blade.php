<!DOCTYPE html>
<html>

<head>
    <title>NOTA TOKO</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/styles.css">
</head>

<body>

    <center>
        @foreach ($transaction as $transaction)
            <h5>NOTA {{ $transaction->no_nota }}</h4>
                <h6>Toko</h6>
            </h5>
    </center>
    <table class="table table-light">
        <thead>
            <tr>
                <th scope="col-1">Tgl Transaksi</th>
                <th scope="col-2">Nama Petugas</th>
                <th scope="col-2">Nama Pembeli</th>
                <th scope="col-1">Status</th>
                <th scope="col-1">Total</th>
                <th scope="col-1">Bayar</th>
                <th scope="col-1">Kembalian</th>
            </tr>
        </thead>
        <tbody>
            <tr>

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

    <h5>Daftar Pesanan</h5>
    <table class="table table-light" id="table" aria-required="true">
        <thead>
            <tr>

                <th scope="col">Nomor Nota</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Price</th>
                <th scope="col">Qty</th>
                <th scope="col">Subtotal</th>

            </tr>
        </thead>
        <tbody>
            <tr>

                @foreach ($orders as $order)
                    <td>{{ $order->no_nota }}</td>
                    <td>{{ $order->good->nama }}</td>
                    <td>{{ $order->price }}</td>
                    <td>{{ $order->qty }}</td>
                    <td>{{ $order->subtotal }}</td>

            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
