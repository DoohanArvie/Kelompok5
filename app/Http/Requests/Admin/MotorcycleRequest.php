<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class MotorcycleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; 
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        switch($this->method()){
            case 'POST' : {
                return [
                    'nama_motor' => 'required|string|max:255|unique:motorcycles',
                    'type_id' => 'required|numeric',
                    'price' => 'required|numeric',
                    'penumpang' => 'required|numeric',
                    'description' => 'required',
                    'image' => ['required','image','mimes:jpeg,png,jpg,gif','max:4096'],
                    'status' =>  ['required']
                ];
            }
            case 'PUT' :
            case 'PATCH' : {
                return [
                    'nama_motor' => ['required', 'max:255', 'unique:motorcycles,nama_motor,'. $this->route()->motorcycle->id],
                    'type_id' => 'required|numeric',
                    'price' => 'required|numeric',
                    'penumpang' => 'required|numeric',
                    'description' => 'required',
                    'image' =>  ['image','mimes:jpeg,png,jpg,gif','max:4096'],
                    'status' =>  ['required']
                ];
            }
        }
    }
}
