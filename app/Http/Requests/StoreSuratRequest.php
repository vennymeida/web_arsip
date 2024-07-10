<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSuratRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nomor_surat' => 'required|string|max:255',
            'kategori_surat' => 'required|exists:kategori_surats,id',
            'judul' => 'required|string|max:255',
            'file_surat' => 'required|mimes:pdf|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'nomor_surat.required' => 'Nomor surat harus diisi.',
            'nomor_surat.max' => 'Nomor surat tidak boleh lebih dari :max karakter.',
            'kategori_surat.required' => 'Kategori surat harus dipilih.',
            'kategori_surat.exists' => 'Kategori surat tidak valid.',
            'judul.required' => 'Judul surat harus diisi.',
            'judul.max' => 'Judul surat tidak boleh lebih dari :max karakter.',
            'file_surat.mimes' => 'File surat harus berupa file PDF.',
            'file_surat.max' => 'Ukuran file surat tidak boleh lebih dari :max KB.',
        ];
    }
}
