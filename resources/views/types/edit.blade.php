@extends('layouts.admin')
@section('content')

    <div class="px-4 py-4">
        <div class="row align-items-center mb-4">
            <div class="col-6">
                <h1>{{$type->name}}</h1>
                <p style="color: #999">Редактирование</p>
            </div>
        </div>

        <form action="/types/{{$type->id}}" method="post" enctype="multipart/form-data">@csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{$type->id}}">

            <div class="row align-items-center mb-2">    
                <dt class="col-sm-3">
                    Название
                </dt>
                <dd class="col-sm-9">
                    <input type="text" class="form-control" name="name" value="{{$type->name}}">
                    @if ($errors->has('name'))
                        <div class="alert alert-danger">
                            Укажите название
                        </div>
                    @endif
                </dd>
            </div>

            <div class="row align-items-center mb-2 type type-3 type-4 type-8">
                <dt class="col-sm-3">
                    Галерея
                </dt>
                <dd class="col-sm-9">
                    <input class="gallery" type="file" name="gallery[]" multiple>
                </dd>
            </div>

            <div class="row align-items-center mb-2">    
                <dt class="col-sm-3">
                    Счёт
                </dt>
                <dd class="col-sm-9">
                    <input type="text" class="form-control" name="score" value="{{$type->score}}">
                    @if ($errors->has('score'))
                        <div class="alert alert-danger">
                            Укажите счёт
                        </div>
                    @endif
                </dd>
            </div>

            <button type="submit" class="btn btn-lg btn-success">Сохранить</button>
        </form>
    </div>

    <script>
        FilePond.registerPlugin(FilePondPluginImagePreview);

        $('.gallery').filepond({
            allowMultiple: true,
            allowReorder: true,
            imagePreviewHeight: 140,
            labelIdle: 'Нажмите для загрузки файлов',
            labelFileProcessing: 'Загрузка',
            labelFileProcessingComplete: 'Загружено',
            labelTapToCancel: '',
            labelTapToUndo: '',

            server: {
                remove: (filename, load) => {
                    load('1');
                    return  ajax_delete('deleteimage');

                },
                process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                    const formData = new FormData();
                    formData.append(fieldName, file, file.name);
                    const request = new XMLHttpRequest();
                    request.open('POST', '/types/file/upload');
                    request.upload.onprogress = (e) => {
                        progress(e.lengthComputable, e.loaded, e.total);
                    };
                    request.onload = function() {
                        if (request.status >= 200 && request.status < 300) {
                            load(request.responseText);
                        }
                        else {
                            error('oh no');
                        }
                    };
                    request.send(formData);
                    return {
                        abort: () => {
                            request.abort();
                            abort();
                        }
                    };
                },
                revert: (filename, load) => {
                    load(filename)
                },
                load: (source, load, error, progress, abort, headers) => {
                    var myRequest = new Request(source);
                    fetch(myRequest).then(function(response) {
                        response.blob().then(function(myBlob) {
                            load(myBlob)
                        });
                    });
                },
            },

            files: [
            @if(isset($type->gallery))
              @foreach($type->gallery as $image)
                {
                    source: '{{ $image }}',
                    options: {
                        type: 'local',
                    }
                },
            @endforeach
            @endif
            ]

        });


        function ajax_delete(methos){
            $.ajax({
               url:'/types/file/'+methos,
                method:'POST'
            });
        }
    </script>

@endsection