<?php

namespace Dokoiko\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class MailSendingRequest extends FormRequest {
	public function rules()
	{
		return [
			'name'     => 'required|min:3',
			'email'     => 'required|email',
			'message' => 'required|max:1500',
		];
	}

	public function authorize()
	{
		return true;
	}
}