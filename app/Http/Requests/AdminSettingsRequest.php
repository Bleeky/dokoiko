<?php

namespace Dokoiko\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminSettingsRequest extends FormRequest {

	public function rules()
	{
		return [
			'author-username'     => 'required|min:3',
			'author-password'     => 'required|min:2',
			'author-password-two' => 'required',
		];
	}

	public function authorize()
	{
		return true;
	}
}