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

    'accepted' => 'Должно быть принято.',
    'accepted_if' => 'Должно быть принято, когда :other соответствует :value.',
    'active_url' => 'Значение поля должно быть действительным URL адресом.',
    'after' => 'Дата должна быть после :date.',
    'after_or_equal' => 'Дата должна быть после или равной :date.',
    'alpha' => 'Здесь могут быть только буквы.',
    'alpha_dash' => 'Здесь могут быть только буквы, цифры, дефис и нижнее подчеркивание.',
    'alpha_num' => 'Здесь могут быть только буквы и цифры.',
    'array' => 'Здесь должен быть массив.',
    'ascii' => 'Значение поля должно содержать только однобайтовые цифро-буквенные символы.',
    'attached' => 'Уже прикреплено.',
    'before' => 'Дата должна быть до :date.',
    'before_or_equal' => 'Дата должна быть до или равной :date.',
    'between.array' => 'Количество элементов должно быть между :min и :max.',
    'between.file' => 'Размер файла должен быть между :min и :max Кб.',
    'between.numeric' => 'Значение должно быть между :min и :max.',
    'between.string' => 'Количество символов должно быть между :min и :max.',
    "boolean" => "Значение должно быть логического типа.",
    "can"=> "Значение должно быть авторизованным.",
    "confirmed"=> "Значение не совпадает с подтверждением.",
    "country"=> "Значение должно содержать название настоящей страны.",
    "date"=> "Значение должно быть корректной датой.",
    "date_equals"=> "Дата должна быть равной :date.",
    "date_format"=> "Дата должна соответствовать формату :format.",
    "decimal"=> "Значение должно содержать :decimal цифр десятичных разрядов.",
    "declined"=> "Должно быть отклонено.",
    "declined_if"=> "Должно быть отклонено, когда :other равно :value.",
    "different"=> "Значение должно отличаться от :other",
    "digits"=> "Количество символов должно быть равным :digits.",
    "digits_between"=> "Количество символов должно быть между :min и :max.",
    "dimensions"=> "Изображение имеет недопустимые размеры.",
    "distinct"=> "Поле содержит повторяющееся значение.",
    "doesnt_end_with"=> "Значение не должно заканчиваться одним из следующих: :values.",
    "doesnt_start_with"=> "Значение не должно начинаться с одного из следующих: :values.",
    "email"=> "Такого электронного адреса не найдено",
    "ends_with"=> "Должно заканчиваться одним из следующих значений: :values",
    "enum"=> "Значение некорректно.",
    "exists"=> "Значение не существует.",
    "file"=> "Содержимое должно быть файлом.",
    "filled"=> "Обязательно для заполнения.",
    "gt.array"=> "Количество элементов должно быть больше :value.",
    "gt.file"=> "Размер файла должен быть больше :value Кб.",
    "gt.numeric"=> "Значение должно быть больше :value.",
    "gt.string"=> "Количество символов должно быть больше :value.",
    "gte.array"=> "Количество элементов должно быть :value или больше.",
    "gte.file"=> "Размер файла должен быть :value Кб или больше.",
    "gte.numeric"=> "Значение должно быть :value или больше.",
    "gte.string"=> "Количество символов должно быть :value или больше.",
    "image"=> "Содержимое должно быть изображением.",
    "in"=> "Значение некорректно.",
    "in_array"=> "Значение должно присутствовать в :other.",
    "integer"=> "В значении должно быть целое число.",
    "ip"=> "В значении должен быть действительный IP-адрес.",
    "ipv4"=> "В значении должен быть действительный IPv4-адрес.",
    "ipv6"=> "В значении должен быть действительный IPv6-адрес.",
    "json"=> "Значение должно быть JSON строкой.",
    "lowercase"=> "Значение этого поля должно быть в нижнем регистре.",
    "lt.array"=> "Количество элементов должно быть меньше :value.",
    "lt.file"=> "Размер файла должен быть меньше :value Кб.",
    "lt.numeric"=> "Значение должно быть меньше :value.",
    "lt.string"=> "Количество символов должно быть меньше :value.",
    "lte.array"=> "Количество элементов должно быть :value или меньше.",
    "lte.file"=> "Размер файла должен быть :value Кб или меньше.",
    "lte.numeric"=> "Значение должно быть равным :value или меньше.",
    'required' => 'Поле :attribute является обязательным.',
    'required_if' => 'Поле :attribute является обязательным, если :other равно :value.',
    'size' => [
        'array' => ':attribute должен содержать элементы :size.',
        'file' => ':attribute должен быть :size килобайт.',
        'numeric' => 'Атрибут : должен быть :size.',
        'string' => ':attribute должен состоять из символов :size.',
    ],
    'string' => ':attribute должен быть из буквенных значений.',
    'password' => [
        'letters' => ':attribute должен содержать хотя бы одну букву.',
        'mixed' => ':attribute должен содержать как минимум одну прописную и одну строчную букву.',
        'numbers' => ':attribute должен содержать хотя бы одно число.',
        'symbols' => ':attribute должен содержать хотя бы один символ',
        'uncompromised' => 'Данный :attribute появился в утечке данных. Пожалуйста, выберите другой :attribute.',
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
