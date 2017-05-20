<?php

namespace App\Http\Requests\Panitia;

use App\Http\Requests\Request;
use Illuminate\Contracts\Validation\Validator;

/**
 * Class UserCreateRequest
 *
 * @package App\Http\Requests\User
 */
class PanitiaCreateRequest extends Request
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
        'nama'    => 'Nama',
        'nip'   => 'Nip',
        'jurusan'   => 'Jurusan'
    ];

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nama'    => 'required|max:225',
            'nip'   => 'required|max:2555',
            'jurusan'   => 'required|max:255'
        ];
    }

    /**
     * Menampilkan Error (Validator).
     *
     * @param $validator
     *
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
                'nama' => $message->first('nama'),
                'nip'          => $message->first('nip')
            ]
        ];
    }

}
