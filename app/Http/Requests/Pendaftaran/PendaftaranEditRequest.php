<?php

namespace App\Http\Requests\Pendaftaran;

use App\Http\Requests\Request;

/**
 * Class UserCreateRequest
 *
 * @package App\Http\Requests\User
 */
class PendaftaranEditRequest extends Request
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
     * Declaration an attributes
     *
     * @var array
     */
    protected $attrs = [
        'no_pilihan'    => 'No_pilihan',
        'status'   => 'status',
        'jurusans_id'   => 'jurusans_id',
        'formulirs_id'   => 'formulirs_id'
    ];

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'no_pilihan'    => 'required|max:225',
            'status'   => 'required|max:2555',
            'jurusans_id'   => 'required|max:2555',
            'formulirs_id'   => 'required|max:2555'
        ];
    }

    /**
     * @param $validator
     *
     * @return mixed
     */
    public function validator($validator)
    {
        return $validator->make($this->all(), $this->container->call([$this, 'rules']), $this->messages(), $this->attrs);
    }

}
