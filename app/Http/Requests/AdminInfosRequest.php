<?php

namespace Dokoiko\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminInfosRequest extends FormRequest {

	public function rules()
	{
		return [
			'author-name'        => 'required|min:3',
			'author-description' => 'required',
		];
	}

	public function authorize()
	{
		return true;
	}
}