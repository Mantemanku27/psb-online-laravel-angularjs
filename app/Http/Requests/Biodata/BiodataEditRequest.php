<?php

namespace App\Http\Requests\Biodata;

use App\Http\Requests\Request;

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
        'email'    => 'Email',
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
            'email'    => 'required|email|unique:contacts,email|max:225',
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
    public function validator($validator)
    {
        return $validator->make($this->all(), $this->container->call([$this, 'rules']), $this->messages(), $this->attrs);
    }

}
