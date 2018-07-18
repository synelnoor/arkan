@role(['superadministrator','administrator','user','kasir'])

<li class="header">TRANSAKSI</li>
<li class="{{ Request::is('orders*') ? 'active' : '' }}">
    <a href="{!! route('orders.index') !!}"><i class="fa fa-edit"></i><span>Pemesanan</span></a>
</li>

<li class="{{ Request::is('pembayarans*') ? 'active' : '' }}">
    <a href="{!! route('pembayarans.index') !!}"><i class="fa fa-edit"></i><span>Pembayaran</span></a>
</li>

<li class="{{ Request::is('purchases*') ? 'active' : '' }}">
    <a href="{!! route('purchases.index') !!}"><i class="fa fa-edit"></i><span>Pengeluaran</span></a>
</li>
@endrole

@role(['superadministrator','administrator'])
<li class="header">MASTER DATA</li>
<li class="{{ Request::is('barangs*') ? 'active' : '' }}">
    <a href="{!! route('barangs.index') !!}"><i class="fa fa-edit"></i><span>Barang</span></a>
</li>
<li class="{{ Request::is('categories*') ? 'active' : '' }}">
    <a href="{!! route('categories.index') !!}"><i class="fa fa-edit"></i><span>Kategori</span></a>
</li>

<li class="{{ Request::is('tokos*') ? 'active' : '' }}">
    <a href="{!! route('tokos.index') !!}"><i class="fa fa-edit"></i><span>Toko</span></a>
</li>


<li class="header">LAPORAN</li>
<li class="{{ Request::is('reports*') ? 'active' : '' }}">
    <a href="{!! route('reports.index') !!}"><i class="fa fa-edit"></i><span>Laporan</span></a>
</li>
<li class="header">USER DATA</li>
<li class="{{ Request::is('admin/users*') ? 'active' : '' }}">
    <a href="{!! route('users.index') !!}"><i class="fa fa-users"></i><span>Users</span></a>
</li>

<li class="{{ Request::is('admin/roles*') ? 'active' : '' }}">
    <a href="{!! route('roles.index') !!}"><i class="fa fa-road"></i><span>Roles</span></a>
</li>
<li class="header">INVENTORY MASTER DATA</li>

<li class="{{ Request::is('itemStocks*') ? 'active' : '' }}">
    <a href="{!! route('itemStocks.index') !!}"><i class="fa fa-edit"></i><span>Item Stocks</span></a>
</li>

<li class="{{ Request::is('stockIns*') ? 'active' : '' }}">
    <a href="{!! route('stockIns.index') !!}"><i class="fa fa-edit"></i><span>Stock Ins</span></a>
</li>

<li class="{{ Request::is('stockOuts*') ? 'active' : '' }}">
    <a href="{!! route('stockOuts.index') !!}"><i class="fa fa-edit"></i><span>Stock Outs</span></a>
</li>
<li class="{{ Request::is('stocks*') ? 'active' : '' }}">
    <a href="{!! route('stocks.index') !!}"><i class="fa fa-edit"></i><span>Stocks</span></a>
</li>


@endrole