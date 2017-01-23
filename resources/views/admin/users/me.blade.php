@extends('layouts.admin')

@section('style')
  <link href="{!! asset('plugins/iCheck/all.css') !!} " rel="stylesheet" type="text/css"/>
  <link href="{!! asset('plugins/iCheck/square/green.css') !!}" rel="stylesheet" type="text/css"/>
  <link href="{!! asset('plugins/ezdz/jquery.ezdz.min.css') !!}" rel="stylesheet" type="text/css"/>
@stop

@section('content')
<div class="box box-default">
  <div class="box-header with-border">
    <h3 class="box-title">{!! AppDefaultHelper::dynamicTitle() !!} {!! $title !!}</h3>
    <div class="box-tools pull-right">
      <a href="{!! url('/')!!}" class="btn btn-default"> 
        <i class="fa fa-arrow-left"></i> Kembali 
      </a>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">

  </div>
</div>
@endsection

@section('scripts')
  <script type="text/javascript" src="{!! asset('plugins/iCheck/icheck.min.js') !!}"></script>
  <script src="{!! asset('plugins/ezdz/jquery.ezdz.min.js') !!}" type="text/javascript"></script> 
    <script type="text/javascript">
        $(document).ready(function(){
            $('input[type="radio"]').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green'
            });
            
            $('input[type="file"]').ezdz({
                text: 'drop or select a picture',
                validators: {
                    maxSize: 2000000
                },
                reject: function (file, errors) {
                    if (errors.mimeType) {
                        $("#error-foto").text("Ektenstion must in .png or .jpg");
                        $('#alert-foto').show().delay(5000).fadeOut('slow');
                    }
                    if (errors.maxSize) {
                        $("#error-foto").text("File can't more than 2 MB");
                        $('#alert-foto').show().delay(5000).fadeOut('slow');
                    }
                }
            });

            @if(isset($row))
                $('[type="file"]').ezdz('preview', "{!! asset($row->photo) !!}");
            @endif
        });

        function readUrl(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.readAsDataURL(input.files[0]);
            }
        }

        function chooseFile()
        {
            $('#file').click();
        }

    </script>
@stop