<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreServiceDetailRequest;
use App\Http\Requests\UpdateServiceDetailRequest;
use App\Http\Resources\Admin\ServiceDetailResource;
use App\Models\ServiceDetail;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ServiceDetailApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('service_detail_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ServiceDetailResource(ServiceDetail::with(['projects', 'reviews', 'payments'])->get());
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

        return (new ServiceDetailResource($serviceDetail))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ServiceDetail $serviceDetail)
    {
        abort_if(Gate::denies('service_detail_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ServiceDetailResource($serviceDetail->load(['projects', 'reviews', 'payments']));
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

        return (new ServiceDetailResource($serviceDetail))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ServiceDetail $serviceDetail)
    {
        abort_if(Gate::denies('service_detail_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $serviceDetail->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
