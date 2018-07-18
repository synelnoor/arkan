@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Roles</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('roles.create') !!}">Add New</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('admin.roles.table')
            </div>
        </div>
    </div>
@endsection

<!-- Modal -->
<div class="modal fade" id="myModalPermissions" tabindex="-1" role="dialog" aria-labelledby="myModalPermissionsLabel">
    <div class="modal-dialog" role="document">
        <form class="modal-content" action="{!! url('setPermissions') !!}" method="post">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalPermissionsLabel">Attach Permissions</h4>
            </div>
            <div class="modal-body row">
                {{ csrf_field() }}
                <div id="permission-container" class="form-group"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>