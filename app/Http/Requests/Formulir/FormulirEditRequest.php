<?php

namespace App\Http\Requests\Formulir;

use App\Http\Requests\Request;
use Illuminate\Contracts\Validation\Validator;

/**
 * Class UserCreateRequest
 *
 * @package App\Http\Requests\User
 */
class FormulirEditRequest extends Request
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
        'asal_sekolah'    => 'Asal_sekolah',
        'n_bi'    => 'N_bi',
        'n_mtk'    => 'N_mtk',
        'n_ipa'    => 'N_ipa',
        'n_ing'   => 'N_ing',
        'foto_ijazah'   => 'Foto_ijazah',
    ];

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'asal_sekolah'    => 'required|max:225',
            'n_bi'    => 'required|max:225',
            'n_mtk'    => 'required|max:225',
            'n_ipa'    => 'required|max:225',
            'n_ing'   => 'required|max:255',
            'foto_ijazah'   => 'required|max:255',
        ];
    }

    /**
     * @param $validator
     *
     * @return mixed
     */
     /* Menampilkan error */
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
                'asal_sekolah' => $message->first('asal_sekolah'),
                'n_bi' => $message->first('n_bi'),
                'n_mtk' => $message->first('n_mtk'),
                'n_ipa'          => $message->first('n_ipa'),
                'n_ing'          => $message->first('n_ing'),
                'foto_ijazah'          => $message->first('foto_ijazah')
            ]
        ];
    }
}
