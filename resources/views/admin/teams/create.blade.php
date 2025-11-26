@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.team.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.teams.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">{{ trans('cruds.team.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', '') }}">
                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.team.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="degination">{{ trans('cruds.team.fields.degination') }}</label>
                <input class="form-control {{ $errors->has('degination') ? 'is-invalid' : '' }}" type="text" name="degination" id="degination" value="{{ old('degination', '') }}">
                @if($errors->has('degination'))
                    <div class="invalid-feedback">
                        {{ $errors->first('degination') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.team.fields.degination_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.team.fields.description') }}</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{{ old('description') }}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.team.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="upload_file">{{ trans('cruds.team.fields.upload_file') }}</label>
                <div class="needsclick dropzone {{ $errors->has('upload_file') ? 'is-invalid' : '' }}" id="upload_file-dropzone">
                </div>
                @if($errors->has('upload_file'))
                    <div class="invalid-feedback">
                        {{ $errors->first('upload_file') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.team.fields.upload_file_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="facebook">{{ trans('cruds.team.fields.facebook') }}</label>
                <textarea class="form-control {{ $errors->has('facebook') ? 'is-invalid' : '' }}" name="facebook" id="facebook">{{ old('facebook') }}</textarea>
                @if($errors->has('facebook'))
                    <div class="invalid-feedback">
                        {{ $errors->first('facebook') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.team.fields.facebook_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="linkedin">{{ trans('cruds.team.fields.linkedin') }}</label>
                <textarea class="form-control {{ $errors->has('linkedin') ? 'is-invalid' : '' }}" name="linkedin" id="linkedin">{{ old('linkedin') }}</textarea>
                @if($errors->has('linkedin'))
                    <div class="invalid-feedback">
                        {{ $errors->first('linkedin') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.team.fields.linkedin_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="instagram">{{ trans('cruds.team.fields.instagram') }}</label>
                <textarea class="form-control {{ $errors->has('instagram') ? 'is-invalid' : '' }}" name="instagram" id="instagram">{{ old('instagram') }}</textarea>
                @if($errors->has('instagram'))
                    <div class="invalid-feedback">
                        {{ $errors->first('instagram') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.team.fields.instagram_helper') }}</span>
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
    Dropzone.options.uploadFileDropzone = {
    url: '{{ route('admin.teams.storeMedia') }}',
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
@if(isset($team) && $team->upload_file)
      var file = {!! json_encode($team->upload_file) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
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