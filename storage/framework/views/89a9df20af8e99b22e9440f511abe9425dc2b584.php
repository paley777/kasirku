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
                <?php $__currentLoopData = $goods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $good): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <td><?php echo e($a++); ?></td>
                    <td><?php echo e($good->tgl_masuk); ?></td>
                    <td><?php echo e($good->nama); ?></td>
                    <td><?php echo e($good->category->nama); ?></td>
                    <td><?php echo e($good->stok); ?></td>
                    <td><?php echo e($good->harga); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

</body>

</html>
<?php /**PATH C:\laragon\www\kasirku\resources\views/good_pdf.blade.php ENDPATH**/ ?>