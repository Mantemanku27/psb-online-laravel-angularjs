<?php

namespace App\Http\Requests\DataUmum;

use App\Http\Requests\Request;
use Illuminate\Contracts\Validation\Validator;

/**
 * Class DataPemdaFormRequest
 * @package App\Http\Requests\DataUmum
 */
class LogoFormRequest extends Request
{
    /**
     * @var array
     */
    protected $attrs = [
        'logo'  => 'Logo',
    ];

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'logo'  => 'mimes:png|max:200',
        ];
    }

    /**
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
                'logo'  => $message->first('logo'),
            ]
        ];
    }
}
