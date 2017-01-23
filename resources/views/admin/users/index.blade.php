@extends('layouts.admin')

@section('style')
  <link rel="stylesheet" href="{{url('/')}}/plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="{!! asset('plugins/sweet-alert/sweet-alert.css') !!}"/>
@stop

@section('content')

<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <div class="">        
          <div class="box-tools pull-right">
            <a href="{!! url(GlobalHelper::indexUrl().'/create')!!}" class="btn btn-success"> 
              <i class="fa fa-plus"></i> Tambah 
            </a>
          </div>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        {!! $dataTable->table(['class' => 'table table-bordered table-striped table-condensed']) !!}
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

  </div>
  <!-- /.col -->
</div>


@endsection

@section('scripts')
  <script src="{{url('/')}}/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="{{url('/')}}/plugins/datatables/dataTables.bootstrap.min.js"></script>
  <script src="{!! asset('plugins/sweet-alert/sweet-alert.js') !!} "></script>
  {!! $dataTable->scripts() !!}
@stop