<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyServiceDetailRequest;
use App\Http\Requests\StoreServiceDetailRequest;
use App\Http\Requests\UpdateServiceDetailRequest;
use App\Models\Payment;
use App\Models\Project;
use App\Models\Review;
use App\Models\ServiceDetail;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ServiceDetailController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('service_detail_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $serviceDetails = ServiceDetail::with(['projects', 'reviews', 'payments', 'media'])->get();

        return view('admin.serviceDetails.index', compact('serviceDetails'));
    }

    public function create()
    {
        abort_if(Gate::denies('service_detail_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $projects = Project::pluck('title', 'id');

        $reviews = Review::pluck('name', 'id');

        $payments = Payment::pluck('title', 'id');

        return view('admin.serviceDetails.create', compact('payments', 'projects', 'reviews'));
    }

    public function store(StoreServiceDetailRequest $request)
    {
        $serviceDetail = ServiceDetail::create($request->all());
        $serviceDetail->projects()->sync($request->input('projects', []));
        $serviceDetail->reviews()->sync($request->input('reviews', []));
        $serviceDetail->payments()->sync($request->input('payments', []));
        if ($request->input('upload_image', false)) {
            $serviceDetail->addMedia(storage_path('tmp/uploads/' . basename($request->input('upload_image'))))->toMediaCollection('upload_image');
        }

        if ($request->input('upload_file', false)) {
            $serviceDetail->addMedia(storage_path('tmp/uploads/' . basename($request->input('upload_file'))))->toMediaCollection('upload_file');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $serviceDetail->id]);
        }

        return redirect()->route('admin.service-details.index');
    }

    public function edit(ServiceDetail $serviceDetail)
    {
        abort_if(Gate::denies('service_detail_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $projects = Project::pluck('title', 'id');

        $reviews = Review::pluck('name', 'id');

        $payments = Payment::pluck('title', 'id');

        $serviceDetail->load('projects', 'reviews', 'payments');

        return view('admin.serviceDetails.edit', compact('payments', 'projects', 'reviews', 'serviceDetail'));
    }

    public function update(UpdateServiceDetailRequest $request, ServiceDetail $serviceDetail)
    {
        $serviceDetail->update($request->all());
        $serviceDetail->projects()->sync($request->input('projects', []));
        $serviceDetail->reviews()->sync($request->input('reviews', []));
        $serviceDetail->payments()->sync($request->input('payments', []));
        if ($request->input('upload_image', false)) {
            if (! $serviceDetail->upload_image || $request->input('upload_image') !== $serviceDetail->upload_image->file_name) {
                if ($serviceDetail->upload_image) {
                    $serviceDetail->upload_image->delete();
                }
                $serviceDetail->addMedia(storage_path('tmp/uploads/' . basename($request->input('upload_image'))))->toMediaCollection('upload_image');
            }
        } elseif ($serviceDetail->upload_image) {
            $serviceDetail->upload_image->delete();
        }

        if ($request->input('upload_file', false)) {
            if (! $serviceDetail->upload_file || $request->input('upload_file') !== $serviceDetail->upload_file->file_name) {
                if ($serviceDetail->upload_file) {
                    $serviceDetail->upload_file->delete();
                }
                $serviceDetail->addMedia(storage_path('tmp/uploads/' . basename($request->input('upload_file'))))->toMediaCollection('upload_file');
            }
        } elseif ($serviceDetail->upload_file) {
            $serviceDetail->upload_file->delete();
        }

        return redirect()->route('admin.service-details.index');
    }

    public function show(ServiceDetail $serviceDetail)
    {
        abort_if(Gate::denies('service_detail_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $serviceDetail->load('projects', 'reviews', 'payments');

        return view('admin.serviceDetails.show', compact('serviceDetail'));
    }

    public function destroy(ServiceDetail $serviceDetail)
    {
        abort_if(Gate::denies('service_detail_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $serviceDetail->delete();

        return back();
    }

    public function massDestroy(MassDestroyServiceDetailRequest $request)
    {
        $serviceDetails = ServiceDetail::find(request('ids'));

        foreach ($serviceDetails as $serviceDetail) {
            $serviceDetail->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('service_detail_create') && Gate::denies('service_detail_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new ServiceDetail();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
