<?php

namespace App\Http\Requests;

use App\Models\ServiceDetail;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateServiceDetailRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('service_detail_edit');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'nullable',
            ],
            'projects.*' => [
                'integer',
            ],
            'projects' => [
                'array',
            ],
            'reviews.*' => [
                'integer',
            ],
            'reviews' => [
                'array',
            ],
            'payments.*' => [
                'integer',
            ],
            'payments' => [
                'array',
            ],
        ];
    }
}
