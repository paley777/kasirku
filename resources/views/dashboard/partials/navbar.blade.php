<style>
    .navbar {
        background-image: linear-gradient(to right, #fe8c00, #f83600);
    }
</style>

<nav class="navbar navbar-dark navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand " href="#">KasirKu</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                <li class="nav-item">
                    <a class="nav-link  {{ $active === 'beranda' ? 'active' : '' }}" aria-current="page"
                        href="/dashboard">Beranda</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ $active === 'data' ? 'active' : '' }}" href="#"
                        id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Manajemen Data
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="/dashboard/customers">Data Pelanggan</a></li>
                        <li><a class="dropdown-item" href="/dashboard/goods">Data Barang</a></li>
                        <li><a class="dropdown-item" href="/dashboard/users">Data User</a></li>
                        <li><a class="dropdown-item" href="/dashboard/transactions">Data Transaksi</a></li>
                        <li><a class="dropdown-item" href="/dashboard/categories">Data Kategori Barang</a></li>
                        <li><a class="dropdown-item" href="/dashboard/hutang">Data Hutang</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $active === 'cashier' ? 'active' : '' }}" href="/dashboard/cashier">Sistem
                        Kasir</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $active === 'rekap' ? 'active' : '' }}"
                        href="/dashboard/rekapitulasi">Rekapitulasi</a>
                </li>

            </ul>
            <div class="btn-group">
                <button type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Hai, {{ auth()->user()->nama }}
                </button>
                <ul class="dropdown-menu">
                    <form action="/logout" method="post">
                        @csrf
                        <li><button type="submit" class="dropdown-item">
                                Keluar
                            </button></li>
                    </form>
                </ul>
            </div>

        </div>
    </div>
</nav>
