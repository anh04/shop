@extends('layouts.frontendLayout')

  <style type="text/css">
      .list-images {
          width: 50%;
          margin-top: 20px;
          display: inline-block;
      }
      .hidden { display: none; }
      .box-image {
          width: 100px;
          height: 108px;
          position: relative;
          float: left;
          margin-left: 5px;
      }
      .box-image img {
          width: 100px;
          height: 100px;
      }
      .wrap-btn-delete {
          position: absolute;
          top: -8px;
          right: 0;
          height: 2px;
          font-size: 20px;
          font-weight: bold;
          color: red;
      }
      .btn-delete-image {
          cursor: pointer;
      }
      .table {
          width: 15%;
      }
  </style>

@section('content')
<div class="container lst">
    <div class="card bg-white">
        <div class="card-header">
            Library
        </div>
        <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Sorry!</strong> There were more problems with your HTML input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            @if (isset($list_images))
            <form method="post" action="{{url('edit')}}" enctype="multipart/form-data">
                @else
                <form method="post" action="{{url('create')}}" enctype="multipart/form-data">
                    @endif
                    @csrf
                    <div class="input-group hdtuto control-group lst increment" >
                        <div class="list-input-hidden-upload">
                            <input type="file" name="filenames[]" id="file_upload" class="myfrm form-control hidden">
                        </div>
                        <div class="input-group-btn">
                            <button class="btn btn-success btn-add-image" type="button"><i class="fldemo glyphicon glyphicon-plus"></i>+Add image</button>
                        </div>
                    </div>
                    <div class="list-images">
                        @if (isset($list_images) && !empty($list_images))

                        <div class="box-image">
                            <input type="hidden" name="images_uploaded[]" value="{{ $list_images }}" id="img-{{ $id }}">
                            <img src="{{ asset('images/'.$list_images) }}" class="picture-box">
                            <div class="wrap-btn-delete"><span data-id="img-{{ $id }}" class="btn-delete-image">x</span></div>
                        </div>

                        <input type="hidden" name="images_uploaded_origin" value="{{ $list_images }}">
                        <input type="hidden" name="id" value="{{ $id }}">
                        @endif
                    </div>
                    <div class="button-submit">
                        <button type="submit" class="btn btn-success" style="margin-top:10px">
                            @if (isset($list_images))
                            Update
                            @else
                            Submit
                            @endif
                        </button>
                    </div>
                </form>
                @if (isset($files) && $files->count() > 0)
                <fieldset class="border p-4">
                    <legend class="float-none w-auto f-16 bold">Library</legend>
                    <div class="row -mt-15">
                            <div class="row row-cols-xs-1 row-cols-sm-1 row-cols-md-4 ">
                                @foreach($files as $el)
                                    <div class="col mx-3 my-2">
                                        <img src="{{ asset('images/'.$el->filenames) }}" style="width:60px">
                                    </div>
                                @endforeach
                            </div>
                        
                    </div>
                </fieldset>
                @endif
           <!---------------------->
        </div>

            <button class="btn btn-primary" id="show-modal-library">Show modal</button>
    </div>
</div>

<script type="text/javascript">
    $( document ).ready(function() {
        $(".btn-add-image").click(function(){
            $('#file_upload').trigger('click');
        });
        $('.list-input-hidden-upload').on('change', '#file_upload', function(event){
            let today = new Date();
            let time = today.getTime();
            let image = event.target.files[0];
            let file_name = event.target.files[0].name;
            let box_image = $('<div class="box-image"></div>');
            box_image.append('<img src="' + URL.createObjectURL(image) + '" class="picture-box">');
            box_image.append('<div class="wrap-btn-delete"><span data-id='+time+' class="btn-delete-image">x</span></div>');
            $(".list-images").append(box_image);

            $(this).removeAttr('id');
            $(this).attr( 'id', time);
            let input_type_file = '<input type="file" name="filenames[]" id="file_upload" class="myfrm form-control hidden">';
            $('.list-input-hidden-upload').append(input_type_file);
        });

        $(".list-images").on('click', '.btn-delete-image', function(){
            let id = $(this).data('id');
            $('#'+id).remove();
            $(this).parents('.box-image').remove();
        });

        $('#show-modal-library').unbind('click').bind('click', function(){
            console.log("testt")
            var link3 ='libraries';
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                "async": true,
                "crossDomain": true,
                "url": link3,
                "method": "POST",
                dataType: 'json',
                data:{},
                //contentType: 'application/json',
                error : function (status,xhr,error) {

                },
                success: function (res) {
                    if(res.files.length > 0){
                        var rows =''
                        var cols =''
                        res.files.forEach(function(item){
                            cols +='<div class="col mx-3 my-2">' +
                                ' <img src="/images/'+item.filenames+'" img_name="'+item.filenames+'" style="width:60px; cursor:pointer" class="img-selected">' +
                                '</div>'
                        })

                        rows +='<div class="row">' +
                            '<div class="row row-cols-xs-1 row-cols-sm-1 row-cols-md-4 ">' +
                            cols +
                            '</div>'
                    }
                    $('#library-modal .modal-body').html(rows)
                    $('#library-modal').modal('show')
                    //event
                    $('.img-selected').unbind('click').bind('click',function(){

                    })
                }
            });
        })
    });

</script>

@endsection


