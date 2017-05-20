<?php

namespace App\Http\Requests\Biodata;

use App\Http\Requests\Request;
use Illuminate\Contracts\Validation\Validator;

/**
 * Class DataPemdaFormRequest
 * @package App\Http\Requests\DataUmum
 */
class FotoFormRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    /**
     * @var array
     */
    protected $attrs = [
        'foto'  => 'Foto',
    ];

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'foto'  => 'mimes:png,jpeg|max:2000',
        ];
    }

    /**
     * Menampilkan Error (Validator).
     *
     * @param $validator
     * @return mixed
     */
    public function validator($validator)
    {
        return $validator->make($this->all(), $this->container->call([$this, 'rules']), $this->messages(), $this->attrs);
    }

    /**
     * @param Validator $validator
     * @return array
     */
    protected function formatErrors(Validator $validator)
    {
        $message = $validator->errors();

        return [
            'success'    => false,
            'validation' => [
                'foto'  => $message->first('foto'),
            ]
        ];
    }

}
