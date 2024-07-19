<?php

namespace App\Http\Requests;




use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class StoreItemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
        ];
    }
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'titre' => 'required',
            'Description' => 'required',
            'price' =>  'required|numeric',
            'image' => 'required|numeric',


        ]);

        // The blog post is valid...

        return redirect('/posts');
    }
}
