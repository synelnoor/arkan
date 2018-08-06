<li class="{{ Request::is('barangs*') ? 'active' : '' }}">
    <a href="{!! route('barangs.index') !!}"><i class="fa fa-edit"></i><span>Barang</span></a>
</li>


<li class="{{ Request::is('orders*') ? 'active' : '' }}">
    <a href="{!! route('orders.index') !!}"><i class="fa fa-edit"></i><span>Orders</span></a>
</li>

<li class="{{ Request::is('orderItems*') ? 'active' : '' }}">
    <a href="{!! route('orderItems.index') !!}"><i class="fa fa-edit"></i><span>Order Items</span></a>
</li>

<li class="{{ Request::is('pembayarans*') ? 'active' : '' }}">
    <a href="{!! route('pembayarans.index') !!}"><i class="fa fa-edit"></i><span>Pembayarans</span></a>
</li>

<li class="{{ Request::is('purchasings*') ? 'active' : '' }}">
    <a href="{!! route('purchasings.index') !!}"><i class="fa fa-edit"></i><span>Purchasings</span></a>
</li>

<li class="{{ Request::is('purchases*') ? 'active' : '' }}">
    <a href="{!! route('purchases.index') !!}"><i class="fa fa-edit"></i><span>Purchases</span></a>
</li>

<li class="{{ Request::is('ajas*') ? 'active' : '' }}">
    <a href="{!! route('ajas.index') !!}"><i class="fa fa-edit"></i><span>Ajas</span></a>
</li>

<li class="{{ Request::is('categories*') ? 'active' : '' }}">
    <a href="{!! route('categories.index') !!}"><i class="fa fa-edit"></i><span>Categories</span></a>
</li>

<li class="{{ Request::is('tokos*') ? 'active' : '' }}">
    <a href="{!! route('tokos.index') !!}"><i class="fa fa-edit"></i><span>Tokos</span></a>
</li>

<li class="{{ Request::is('itemStocks*') ? 'active' : '' }}">
    <a href="{!! route('itemStocks.index') !!}"><i class="fa fa-edit"></i><span>Item Stocks</span></a>
</li>

<li class="{{ Request::is('stockIns*') ? 'active' : '' }}">
    <a href="{!! route('stockIns.index') !!}"><i class="fa fa-edit"></i><span>Stock Ins</span></a>
</li>

<li class="{{ Request::is('stockOuts*') ? 'active' : '' }}">
    <a href="{!! route('stockOuts.index') !!}"><i class="fa fa-edit"></i><span>Stock Outs</span></a>
</li>

<li class="{{ Request::is('detailStockIns*') ? 'active' : '' }}">
    <a href="{!! route('detailStockIns.index') !!}"><i class="fa fa-edit"></i><span>Detail Stock Ins</span></a>
</li>

<li class="{{ Request::is('detailStockOuts*') ? 'active' : '' }}">
    <a href="{!! route('detailStockOuts.index') !!}"><i class="fa fa-edit"></i><span>Detail Stock Outs</span></a>
</li>

<li class="{{ Request::is('stocks*') ? 'active' : '' }}">
    <a href="{!! route('stocks.index') !!}"><i class="fa fa-edit"></i><span>Stocks</span></a>
</li>

<li class="{{ Request::is('logStocks*') ? 'active' : '' }}">
    <a href="{!! route('logStocks.index') !!}"><i class="fa fa-edit"></i><span>Log Stocks</span></a>
</li>

