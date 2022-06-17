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
        <?php $__currentLoopData = $transaction; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <h5>NOTA <?php echo e($transaction->no_nota); ?></h4>
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

                <td><?php echo e($transaction->tgl_transaksi); ?></td>
                <td><?php echo e($transaction->user->nama); ?></td>
                <td><?php echo e($transaction->nama_pembeli); ?></td>
                <td><?php echo e($transaction->status); ?></td>
                <td><?php echo e($transaction->total_harga); ?></td>
                <td><?php echo e($transaction->bayar); ?></td>
                <td><?php echo e($transaction->kembalian); ?></td>

            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <td><?php echo e($order->no_nota); ?></td>
                    <td><?php echo e($order->good->nama); ?></td>
                    <td><?php echo e($order->price); ?></td>
                    <td><?php echo e($order->qty); ?></td>
                    <td><?php echo e($order->subtotal); ?></td>

            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</body>

</html>
<?php /**PATH C:\laragon\www\kasirku\resources\views/nota_pdf.blade.php ENDPATH**/ ?>