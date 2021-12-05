<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCarRequest extends FormRequest
{
//	protected $stopOnFirstFailure = true;
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
    public function rules(): array
    {
        return [
	        'plate_number' => 'required|string|unique:cars|max:12',
	        'make' => 'required|string',
	        'color' => 'required|string',
	        'owner' => 'required|integer',
	        'model' => 'required|string',
        ];
    }
	/**
	 * Custom message for validation
	 *
	 * @return array
	 */
	public function messages() : array
	{
		return [
			'plate_number.required' => 'Plate Number is required!',
			'plate_number.string' => 'Plate Number must be alphanumeric!',
			'plate_number.max' => 'Plate Number must be a max of 12 characters!',
			'plate_number.unique' => 'Plate Number already registered!',
			'make.required' => 'Vehicle make is required',
			'make.string' => 'Vehicle make must be alphanumeric or alphabetical',
			'color.required' => 'Vehicle color is required',
			'color.string' => 'Vehicle color must be a valid color',
			'model.required' => 'Vehicle model is required',
			'model.string' => 'Vehicle model must be alphanumeric or alphabetical',
			'owner.required' => 'Vehicle Owner is required',
			'owner.integer' => 'Vehicle Owner must be an existing user',
		];
	}
	
}
