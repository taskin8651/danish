<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyEnquiryRequest;
use App\Http\Requests\StoreEnquiryRequest;
use App\Http\Requests\UpdateEnquiryRequest;
use App\Models\Enquiry;
use App\Models\ServiceDetail;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class EnquiryController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('enquiry_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $enquiries = Enquiry::with(['service_type'])->get();

        return view('admin.enquiries.index', compact('enquiries'));
    }

    public function create()
    {
        abort_if(Gate::denies('enquiry_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $service_types = ServiceType::pluck('service_type', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.enquiries.create', compact('service_types'));
    }

    public function store(StoreEnquiryRequest $request)
    {
        $enquiry = Enquiry::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $enquiry->id]);
        }

        return redirect()->route('admin.enquiries.index');
    }

    public function edit(Enquiry $enquiry)
    {
        abort_if(Gate::denies('enquiry_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $service_types = ServiceType::pluck('service_type', 'id')->prepend(trans('global.pleaseSelect'), '');

        $enquiry->load('service_type');

        return view('admin.enquiries.edit', compact('enquiry', 'service_types'));
    }

    public function update(UpdateEnquiryRequest $request, Enquiry $enquiry)
    {
        $enquiry->update($request->all());

        return redirect()->route('admin.enquiries.index');
    }

    public function show(Enquiry $enquiry)
    {
        abort_if(Gate::denies('enquiry_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $enquiry->load('service_type');

        return view('admin.enquiries.show', compact('enquiry'));
    }

    public function destroy(Enquiry $enquiry)
    {
        abort_if(Gate::denies('enquiry_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $enquiry->delete();

        return back();
    }

    public function massDestroy(MassDestroyEnquiryRequest $request)
    {
        $enquiries = Enquiry::find(request('ids'));

        foreach ($enquiries as $enquiry) {
            $enquiry->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('enquiry_create') && Gate::denies('enquiry_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Enquiry();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
