<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
	public function authorize()
	{
		if($this->user_id == auth()->user()->id)
		{
			return true;
		}
		return false;
	}

	public function rules()
	{
		$rules = [
			'name' => 'required',
			'slug' => 'required|unique:posts',
			'status' => 'required|in:1,2',
      'file' => 'image'
		];

		if($this->status == 2) {
			$rules = array_merge($rules, [
				'category_id' => 'required',
				'tags' => 'required',
				'stract' => 'required',
				'body' => 'required'
			]);
		}

		return $rules;
	}
}
