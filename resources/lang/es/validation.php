<?php
return [
    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */
    'accepted'              => 'El campo :Attribute debe ser aceptado.',
    'active_url'            => 'El campo :Attribute no es una URL válida.',
    'after'                 => 'El campo :Attribute debe ser una fecha después de :date.',
    'alpha'                 => 'El campo :Attribute sólo puede contener letras.',
    'alpha_dash'            => 'El campo :Attribute sólo puede contener letras, números y guiones.',
    'alpha_num'             => 'El campo :Attribute sólo puede contener letras y números.',
    'array'                 => 'El campo :Attribute debe ser un arreglo.',
    'before'                => 'El campo :Attribute debe ser una fecha antes :date.',
    'between'               => [
        'numeric' => 'El campo :Attribute debe estar entre :min - :max.',
        'file'    => 'El campo :Attribute debe estar entre :min - :max kilobytes.',
        'string'  => 'El campo :Attribute debe estar entre :min - :max caracteres.',
        'array'   => 'El campo :Attribute debe tener entre :min y :max elementos.',
    ],
    'boolean'               => 'El campo :Attribute debe ser verdadero o falso.',
    'confirmed'             => 'El campo de confirmación de :Attribute no coincide.',
    'date'                  => 'El campo :Attribute no es una fecha válida.',
    'date_format'           => 'El campo :Attribute no corresponde con el formato :format.',
    'different'             => 'Los campos :Attribute y :other deben ser diferentes.',
    'digits'                => 'El campo :Attribute debe ser de :digits dígitos.',
    'digits_between'        => 'El campo :Attribute debe tener entre :min y :max dígitos.',
    'dimensions'            => 'El campo :Attribute no tiene una dimensión válida.',
    'distinct'              => 'El campo :Attribute tiene un valor duplicado.',
    'email'                 => 'El formato del :Attribute es inválido.',
    'exists'                => 'El campo :Attribute seleccionado es inválido.',
    'file'                  => 'El campo :Attribute debe ser un archivo.',
    'filled'                => 'El campo :Attribute es requerido.',
    'image'                 => 'El campo :Attribute debe ser una imagen.',
    'in'                    => 'El campo :Attribute seleccionado es inválido.',
    'in_array'              => 'El campo :Attribute no existe en :other.',
    'integer'               => 'El campo :Attribute debe ser un entero.',
    'ip'                    => 'El campo :Attribute debe ser una dirección IP válida.',
    'json'                  => 'El campo :Attribute debe ser una cadena JSON válida.',
    'max'                   => [
        'numeric' => 'El campo :Attribute debe ser menor que :max.',
        'file'    => 'El campo :Attribute debe ser menor que :max kilobytes.',
        'string'  => 'El campo :Attribute debe ser menor que :max caracteres.',
        'array'   => 'El campo :Attribute debe tener al menos :min elementos.',
    ],
    'mimes'                 => 'El campo :Attribute debe ser un archivo de tipo: :values.',
    'mimetypes'             => 'El campo :Attribute debe ser un archivo de tipo: :values.',
    'min'                   => [
        'numeric' => 'El campo :Attribute debe tener al menos :min.',
        'file'    => 'El campo :Attribute debe tener al menos :min kilobytes.',
        'string'  => 'El campo :Attribute debe tener al menos :min caracteres.',
        'array'   => 'El campo :Attribute debe tener al menos :min items.',
    ],
    'not_in'                => 'El campo :Attribute seleccionado es invalido.',
    'numeric'               => 'El campo :Attribute debe ser un número.',
    'present'               => 'El campo :Attribute debe estar presente.',
    'regex'                 => 'El formato del campo :Attribute es inválido.',
    'required'              => 'El campo :Attribute es requerido.',
    'required_if'           => 'El campo :Attribute es requerido cuando el campo :other es :value.',
    'required_unless'       => 'El campo :Attribute es requerido a menos que :other esté presente en :values.',
    'required_with'         => 'El campo :Attribute es requerido cuando :values está presente.',
    'required_with_all'     => 'El campo :Attribute es requerido cuando :values está presente.',
    'required_without'      => 'El campo :Attribute es requerido cuando :values no está presente.',
    'required_without_all'  => 'El campo :Attribute es requerido cuando ningún :values está presente.',
    'same'                  => 'El campo :Attribute y :other debe coincidir.',
    'size'                  => [
        'numeric' => 'El campo :Attribute debe ser :size.',
        'file'    => 'El campo :Attribute debe tener :size kilobytes.',
        'string'  => 'El campo :Attribute debe tener :size caracteres.',
        'array'   => 'El campo :Attribute debe contener :size elementos.',
    ],
    'string'                => 'El campo :Attribute debe ser sólo letras.',
    'timezone'              => 'El campo :Attribute debe ser una zona válida.',
    'unique'                => 'El campo :Attribute ya ha sido tomado.',
    'url'                   => 'El formato de :Attribute es inválido.',
    'uploaded'              => 'El campo :Attribute no ha podido ser cargado.',
    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "Attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given Attribute rule.
    |
    */
    'custom' => [
        'Attribute-name' => [
            'rule-name'  => 'custom-message',
        ],
    ],
    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap Attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */
    'attributes' => [
        'username' => 'usuario',
        'password' => 'contraseña'
    ],
];