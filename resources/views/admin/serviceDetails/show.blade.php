@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.serviceDetail.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.service-details.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.serviceDetail.fields.id') }}
                        </th>
                        <td>
                            {{ $serviceDetail->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.serviceDetail.fields.title') }}
                        </th>
                        <td>
                            {{ $serviceDetail->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.serviceDetail.fields.short_description') }}
                        </th>
                        <td>
                            {{ $serviceDetail->short_description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.serviceDetail.fields.description') }}
                        </th>
                        <td>
                            {!! $serviceDetail->description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.serviceDetail.fields.upload_image') }}
                        </th>
                        <td>
                            @if($serviceDetail->upload_image)
                                <a href="{{ $serviceDetail->upload_image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $serviceDetail->upload_image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.serviceDetail.fields.project') }}
                        </th>
                        <td>
                            @foreach($serviceDetail->projects as $key => $project)
                                <span class="label label-info">{{ $project->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.serviceDetail.fields.review') }}
                        </th>
                        <td>
                            @foreach($serviceDetail->reviews as $key => $review)
                                <span class="label label-info">{{ $review->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.serviceDetail.fields.payment') }}
                        </th>
                        <td>
                            @foreach($serviceDetail->payments as $key => $payment)
                                <span class="label label-info">{{ $payment->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.serviceDetail.fields.upload_file') }}
                        </th>
                        <td>
                            @if($serviceDetail->upload_file)
                                <a href="{{ $serviceDetail->upload_file->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.service-details.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection