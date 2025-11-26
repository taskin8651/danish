@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.serviceDetail.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.service-details.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">{{ trans('cruds.serviceDetail.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', '') }}">
                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.serviceDetail.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="short_description">{{ trans('cruds.serviceDetail.fields.short_description') }}</label>
                <textarea class="form-control {{ $errors->has('short_description') ? 'is-invalid' : '' }}" name="short_description" id="short_description">{{ old('short_description') }}</textarea>
                @if($errors->has('short_description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('short_description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.serviceDetail.fields.short_description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.serviceDetail.fields.description') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{!! old('description') !!}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.serviceDetail.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="upload_image">{{ trans('cruds.serviceDetail.fields.upload_image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('upload_image') ? 'is-invalid' : '' }}" id="upload_image-dropzone">
                </div>
                @if($errors->has('upload_image'))
                    <div class="invalid-feedback">
                        {{ $errors->first('upload_image') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.serviceDetail.fields.upload_image_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="projects">{{ trans('cruds.serviceDetail.fields.project') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('projects') ? 'is-invalid' : '' }}" name="projects[]" id="projects" multiple>
                    @foreach($projects as $id => $project)
                        <option value="{{ $id }}" {{ in_array($id, old('projects', [])) ? 'selected' : '' }}>{{ $project }}</option>
                    @endforeach
                </select>
                @if($errors->has('projects'))
                    <div class="invalid-feedback">
                        {{ $errors->first('projects') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.serviceDetail.fields.project_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="reviews">{{ trans('cruds.serviceDetail.fields.review') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('reviews') ? 'is-invalid' : '' }}" name="reviews[]" id="reviews" multiple>
                    @foreach($reviews as $id => $review)
                        <option value="{{ $id }}" {{ in_array($id, old('reviews', [])) ? 'selected' : '' }}>{{ $review }}</option>
                    @endforeach
                </select>
                @if($errors->has('reviews'))
                    <div class="invalid-feedback">
                        {{ $errors->first('reviews') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.serviceDetail.fields.review_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="payments">{{ trans('cruds.serviceDetail.fields.payment') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('payments') ? 'is-invalid' : '' }}" name="payments[]" id="payments" multiple>
                    @foreach($payments as $id => $payment)
                        <option value="{{ $id }}" {{ in_array($id, old('payments', [])) ? 'selected' : '' }}>{{ $payment }}</option>
                    @endforeach
                </select>
                @if($errors->has('payments'))
                    <div class="invalid-feedback">
                        {{ $errors->first('payments') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.serviceDetail.fields.payment_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="upload_file">{{ trans('cruds.serviceDetail.fields.upload_file') }}</label>
                <div class="needsclick dropzone {{ $errors->has('upload_file') ? 'is-invalid' : '' }}" id="upload_file-dropzone">
                </div>
                @if($errors->has('upload_file'))
                    <div class="invalid-feedback">
                        {{ $errors->first('upload_file') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.serviceDetail.fields.upload_file_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection

@section('scripts')
<script>
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('admin.service-details.storeCKEditorImages') }}', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $serviceDetail->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

<script>
    Dropzone.options.uploadImageDropzone = {
    url: '{{ route('admin.service-details.storeMedia') }}',
    maxFilesize: 20, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 20,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="upload_image"]').remove()
      $('form').append('<input type="hidden" name="upload_image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="upload_image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($serviceDetail) && $serviceDetail->upload_image)
      var file = {!! json_encode($serviceDetail->upload_image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="upload_image" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}

</script>
<script>
    Dropzone.options.uploadFileDropzone = {
    url: '{{ route('admin.service-details.storeMedia') }}',
    maxFilesize: 200, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 200
    },
    success: function (file, response) {
      $('form').find('input[name="upload_file"]').remove()
      $('form').append('<input type="hidden" name="upload_file" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="upload_file"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($serviceDetail) && $serviceDetail->upload_file)
      var file = {!! json_encode($serviceDetail->upload_file) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="upload_file" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@endsection