@section('css')
    @include('layouts.datatables_css')
@endsection
<div class="table-responsive">
  
{!! $dataTable->table(['width' => '100%','class'=>'display responsive nowrap']) !!}
</div>
@section('scripts')
    @include('layouts.datatables_js')
    {!! $dataTable->scripts() !!}
@endsection