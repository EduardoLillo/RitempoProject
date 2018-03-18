<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProductoEditFormRequest extends Request
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
     return ['nombre'=>'required|max:60',
        'descripcion'=>'required|max:5000',
       'marca'=>'|max:20',
       'id_subcategoria'=>''];
    }
}
