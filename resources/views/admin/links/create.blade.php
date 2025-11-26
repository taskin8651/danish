@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.link.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.links.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="facebook">{{ trans('cruds.link.fields.facebook') }}</label>
                <textarea class="form-control {{ $errors->has('facebook') ? 'is-invalid' : '' }}" name="facebook" id="facebook">{{ old('facebook') }}</textarea>
                @if($errors->has('facebook'))
                    <div class="invalid-feedback">
                        {{ $errors->first('facebook') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.link.fields.facebook_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="instragram">{{ trans('cruds.link.fields.instragram') }}</label>
                <textarea class="form-control {{ $errors->has('instragram') ? 'is-invalid' : '' }}" name="instragram" id="instragram">{{ old('instragram') }}</textarea>
                @if($errors->has('instragram'))
                    <div class="invalid-feedback">
                        {{ $errors->first('instragram') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.link.fields.instragram_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="youtube">{{ trans('cruds.link.fields.youtube') }}</label>
                <textarea class="form-control {{ $errors->has('youtube') ? 'is-invalid' : '' }}" name="youtube" id="youtube">{{ old('youtube') }}</textarea>
                @if($errors->has('youtube'))
                    <div class="invalid-feedback">
                        {{ $errors->first('youtube') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.link.fields.youtube_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="linkedin">{{ trans('cruds.link.fields.linkedin') }}</label>
                <textarea class="form-control {{ $errors->has('linkedin') ? 'is-invalid' : '' }}" name="linkedin" id="linkedin">{{ old('linkedin') }}</textarea>
                @if($errors->has('linkedin'))
                    <div class="invalid-feedback">
                        {{ $errors->first('linkedin') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.link.fields.linkedin_helper') }}</span>
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