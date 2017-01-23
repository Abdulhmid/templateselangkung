@extends('layouts.admin')

@section('style')

@stop

@section('content')
<div class="box box-default">
  <div class="box-header with-border">
    <h3 class="box-title">{!! AppDefaultHelper::dynamicTitle() !!} {!! $title !!}</h3>
    <div class="box-tools pull-right">
      <a href="{!! url(GlobalHelper::indexUrl())!!}" class="btn btn-default"> 
        <i class="fa fa-arrow-left"></i> Kembali 
      </a>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    {{-- Form --}}
    {!! form_start($form) !!}
    {!! form_rest($form) !!}

    @include('partials.formButton')
    {!! form_end($form) !!}
  </div>
</div>
@endsection

@section('scripts')

@stop