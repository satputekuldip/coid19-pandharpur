<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\QuarantinePatient;

class CreateQuarantinePatientRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'patient_id' => 'required',
            'covid_status' => 'required',
            'present_at_quarantine' => 'required',

            'type' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'state_id' => 'required',
            'district_id' => 'required',
            'tahasil_id' => 'required',
            'address' => 'required',
            'pincode' => 'required'
        ];
    }
}
