<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            'titel' => 'required',
            'locatie' => 'required',
            'datum' => 'required',
            'beschrijving' => 'required',
            'starttijd' => 'required',
            'eindtijd' => 'required',
            'prijs' => 'required',
        ];
    }
}
