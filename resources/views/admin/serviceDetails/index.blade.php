@extends('layouts.admin')
@section('content')
@can('service_detail_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.service-details.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.serviceDetail.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'ServiceDetail', 'route' => 'admin.service-details.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.serviceDetail.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-ServiceDetail">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.serviceDetail.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.serviceDetail.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.serviceDetail.fields.short_description') }}
                        </th>
                        <th>
                            {{ trans('cruds.serviceDetail.fields.upload_image') }}
                        </th>
                        <th>
                            {{ trans('cruds.serviceDetail.fields.project') }}
                        </th>
                        <th>
                            {{ trans('cruds.serviceDetail.fields.review') }}
                        </th>
                        <th>
                            {{ trans('cruds.serviceDetail.fields.payment') }}
                        </th>
                        <th>
                            {{ trans('cruds.serviceDetail.fields.upload_file') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($serviceDetails as $key => $serviceDetail)
                        <tr data-entry-id="{{ $serviceDetail->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $serviceDetail->id ?? '' }}
                            </td>
                            <td>
                                {{ $serviceDetail->title ?? '' }}
                            </td>
                            <td>
                                {{ $serviceDetail->short_description ?? '' }}
                            </td>
                            <td>
                                @if($serviceDetail->upload_image)
                                    <a href="{{ $serviceDetail->upload_image->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $serviceDetail->upload_image->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                @foreach($serviceDetail->projects as $key => $item)
                                    <span class="badge badge-info">{{ $item->title }}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach($serviceDetail->reviews as $key => $item)
                                    <span class="badge badge-info">{{ $item->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach($serviceDetail->payments as $key => $item)
                                    <span class="badge badge-info">{{ $item->title }}</span>
                                @endforeach
                            </td>
                            <td>
                                @if($serviceDetail->upload_file)
                                    <a href="{{ $serviceDetail->upload_file->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endif
                            </td>
                            <td>
                                @can('service_detail_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.service-details.show', $serviceDetail->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('service_detail_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.service-details.edit', $serviceDetail->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('service_detail_delete')
                                    <form action="{{ route('admin.service-details.destroy', $serviceDetail->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('service_detail_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.service-details.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-ServiceDetail:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection