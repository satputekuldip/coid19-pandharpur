<?php


namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class CreateInstituteQuarantinePatientRequest extends FormRequest
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
            'patient_id' => 'required|unique:quarantine_patients',
            'quarantine_address_id' => 'required',
            'covid_status' => 'required',
            'present_at_quarantine' => 'required'

        ];
    }
}
