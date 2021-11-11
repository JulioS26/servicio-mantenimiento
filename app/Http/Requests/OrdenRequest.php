<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrdenRequest extends FormRequest
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
        return [
            'formulario'=>'required',
            'mantenimiento'=>'required',
            'equipo'=>'required',
            'codigo'=>'required',
            'frecuencia'=>'required',
            'mes'=>'required',
            'horaInicio'=>'required',
            'horaFinal'=>'required',
            'tiempoTotal'=>'required',
            'actividades'=>'required',
            'observaciones'=>'required',
            'materiales'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'formulario.required'=>'El campo es requerido para seguir',
            'mantenimiento.required'=>'El campo es requerido para seguir',
            'equipo.required'=>'El campo es requerido para seguir',
            'codigo.required'=>'El campo es requerido para seguir',
            'frecuencia.required'=>'El campo es requerido para seguir',
            'mes.required'=>'El campo es requerido para seguir',
            'horaInicio.required'=>'El campo es requerido para seguir',
            'horaFinal.required'=>'El campo es requerido para seguir',
            'tiempoTotal.required'=>'El campo es requerido para seguir',
            'actividades.required'=>'El campo es requerido para seguir',
            'observaciones.required'=>'El campo es requerido para seguir',
            'materiales.required'=>'El campo es requerido para seguir',
        ];
    }
}
