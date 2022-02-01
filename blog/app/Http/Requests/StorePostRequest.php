<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\User;


class StorePostRequest extends FormRequest
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
        $use=new User();
        $allUsers=$use->all();
        $ids=[];
        foreach($allUsers as $user){
            array_push($ids,$user->id);
        }
        
        return [
            'title'=>['required','min:3','unique:App\Models\Post,title'],
            'description'=>['required','min:10'],
            'post_creator'=>['required',Rule::in($ids)]

        ];
    }
}
