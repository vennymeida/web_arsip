<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSuratRequest extends FormRequest
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
            'file_surat' => 'nullable|file|mimes:pdf|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'nomor_surat.required' => 'Nomor surat wajib diisi.',
            'nomor_surat.string' => 'Nomor surat harus berupa teks.',
            'nomor_surat.max' => 'Nomor surat tidak boleh lebih dari 255 karakter.',

            'kategori_surat.required' => 'Kategori surat wajib dipilih.',
            'kategori_surat.exists' => 'Kategori surat yang dipilih tidak valid.',

            'judul.required' => 'Judul surat wajib diisi.',
            'judul.string' => 'Judul surat harus berupa teks.',
            'judul.max' => 'Judul surat tidak boleh lebih dari 255 karakter.',

            'file_surat.file' => 'File surat harus berupa file.',
            'file_surat.mimes' => 'File surat harus berformat PDF.',
            'file_surat.max' => 'File surat tidak boleh lebih dari 2MB.',
        ];
    }
}
