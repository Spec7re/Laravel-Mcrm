<?php
/**
 * Created by PhpStorm.
 * User: specter
 * Date: 22.03.18
 * Time: 20:22
 */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyValidation extends FormRequest
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

                'name'=>'required|min:3',

                'email'=>'required|email',

                'password' => 'required|string|min:3|confirmed',

                'logo' => 'dimensions:min_width=100,min_height=100'
        ];
    }
}
