<?php

namespace App\Http\Requests\Biodata;

use App\Http\Requests\Request;
use Illuminate\Contracts\Validation\Validator;

/**
 * Class UserCreateRequest
 *
 * @package App\Http\Requests\User
 */
class BiodataEditRequest extends Request
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
        'nama_lengkap'    => 'Nama_lengkap',
        'foto'    => 'Foto',
        'email'    => 'Email',
        'telepon'    => 'Telepon',
        'jk'    => 'Jk',
        'agama'    => 'Agama',
        'tempat_lahir'    => 'Tempat_lahir',
        'tanggal_lahir'    => 'Tanggal_lahir',
        'alamat'    => 'Alamat',
        'desa'    => 'Desa',
        'kecamatan'    => 'Kecamatan',
        'kabupaten'    => 'Kabupaten',
        'provinsi'    => 'Provinsi',
        'jurusan'   => 'Jurusan',
        'users_id'   => 'users_id'
    ];

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nama_lengkap'    => 'required|max:225',
            'foto'    => 'required|max:225',
            'email'    => 'required|email|unique:contacts,email|max:225',
            'telepon'    => 'required|max:225',
            'jk'    => 'required|max:225',
            'agama'    => 'required|max:225',
            'tempat_lahir'    => 'required|max:225',
            'tanggal_lahir'    => 'required|max:225',
            'alamat'    => 'required|max:225',
            'desa'    => 'required|max:225',
            'kecamatan'    => 'required|max:225',
            'kabupaten'    => 'required|max:225',
            'provinsi'    => 'required|max:225',
            'jurusan'   => 'required|max:255',
            'users_id'   => 'required|max:255'
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
                'nama_lengkap' => $message->first('nama_lengkap'),
                'foto' => $message->first('foto'),
                'email' => $message->first('email'),
                'agama' => $message->first('agama'),
                'tempat_lahir'          => $message->first('tempat_lahir'),
                'tanggal_lahir'          => $message->first('tanggal_lahir'),
                'alamat'          => $message->first('alamat'),
                'desa'          => $message->first('desa'),
                'kecamatan'          => $message->first('kecamatan'),
                'kabupaten'          => $message->first('kabupaten'),
                'provinsi'          => $message->first('provinsi'),
                'jurusan'          => $message->first('jurusan')

            ]
        ];
    }

}
