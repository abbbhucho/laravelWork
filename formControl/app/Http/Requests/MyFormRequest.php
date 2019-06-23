<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MyFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;//for anyone to be able to enter his name,email and his current pincode
    }
    // Redirect to a given route
    public $redirectRoute;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
   
}
