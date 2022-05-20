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

    'accepted' => 'de-> The :attribute must be accepted.',
    'active_url' => 'de-> The :attribute is not a valid URL.',
    'after' => 'de-> The :attribute must be a date after :date.',
    'after_or_equal' => 'de-> The :attribute must be a date after or equal to :date.',
    'alpha' => 'de-> The :attribute may only contain letters.',
    'alpha_dash' => 'de-> The :attribute may only contain letters, numbers, dashes and underscores.',
    'alpha_num' => 'de-> The :attribute may only contain letters and numbers.',
    'array' => 'de-> The :attribute must be an array.',
    'before' => 'de-> The :attribute must be a date before :date.',
    'before_or_equal' => 'de-> The :attribute must be a date before or equal to :date.',
    'between' => [
        'numeric' => 'de-> The :attribute must be between :min and :max.',
        'file' => 'de-> The :attribute must be between :min and :max kilobytes.',
        'string' => 'de-> The :attribute must be between :min and :max characters.',
        'array' => 'de-> The :attribute must have between :min and :max items.',
    ],
    'boolean' => 'de-> The :attribute field must be true or false.',
    'confirmed' => 'de-> The :attribute confirmation does not match.',
    'date' => 'de-> The :attribute is not a valid date.',
    'date_equals' => 'de-> The :attribute must be a date equal to :date.',
    'date_format' => 'de-> The :attribute does not match the format :format.',
    'different' => 'de-> The :attribute and :other must be different.',
    'digits' => 'de-> The :attribute must be :digits digits.',
    'digits_between' => 'de-> The :attribute must be between :min and :max digits.',
    'dimensions' => 'de-> The :attribute has invalid image dimensions.',
    'distinct' => 'de-> The :attribute field has a duplicate value.',
    'email' => 'de-> The :attribute must be a valid email address.',
    'ends_with' => 'de-> The :attribute must end with one of the following: :values.',
    'exists' => 'de-> The selected :attribute is invalid.',
    'file' => 'de-> The :attribute must be a file.',
    'filled' => 'de-> The :attribute field must have a value.',
    'gt' =>  [
        'numeric' => 'de-> The :attribute must be greater than :value.',
        'file' => 'de-> The :attribute must be greater than :value kilobytes.',
        'string' => 'de-> The :attribute must be greater than :value characters.',
        'array' => 'de-> The :attribute must have more than :value items.',
    ],
    'gte' => [
        'numeric' => 'de-> The :attribute must be greater than or equal :value.',
        'file' => 'de-> The :attribute must be greater than or equal :value kilobytes.',
        'string' => 'de-> The :attribute must be greater than or equal :value characters.',
        'array' => 'de-> The :attribute must have :value items or more.',
    ],
    'image' => 'de-> The :attribute must be an image.',
    'in' => 'de-> The selected :attribute is invalid.',
    'in_array' => 'de-> The :attribute field does not exist in :other.',
    'integer' => 'de-> The :attribute must be an integer.',
    'ip' => 'de-> The :attribute must be a valid IP address.',
    'ipv4' => 'de-> The :attribute must be a valid IPv4 address.',
    'ipv6' => 'de-> The :attribute must be a valid IPv6 address.',
    'json' => 'de-> The :attribute must be a valid JSON string.',
    'lt' => [
        'numeric' => 'de-> The :attribute must be less than :value.',
        'file' => 'de-> The :attribute must be less than :value kilobytes.',
        'string' => 'de-> The :attribute must be less than :value characters.',
        'array' => 'de-> The :attribute must have less than :value items.',
    ],
    'lte' => [
        'numeric' => 'de-> The :attribute must be less than or equal :value.',
        'file' => 'de-> The :attribute must be less than or equal :value kilobytes.',
        'string' => 'de-> The :attribute must be less than or equal :value characters.',
        'array' => 'de-> The :attribute must not have more than :value items.',
    ],
    'max' => [
        'numeric' => 'de-> The :attribute may not be greater than :max.',
        'file' => 'de-> The :attribute may not be greater than :max kilobytes.',
        'string' => 'de-> The :attribute may not be greater than :max characters.',
        'array' => 'de-> The :attribute may not have more than :max items.',
    ],
    'mimes' => 'de-> The :attribute must be a file of type: :values.',
    'mimetypes' => 'de-> The :attribute must be a file of type: :values.',
    'min' => [
        'numeric' => 'de-> The :attribute must be at least :min.',
        'file' => 'de-> The :attribute must be at least :min kilobytes.',
        'string' => 'de-> The :attribute must be at least :min characters.',
        'array' => 'de-> The :attribute must have at least :min items.',
    ],
    'multiple_of' => 'de-> The :attribute must be a multiple of :value',
    'not_in' => 'de-> The selected :attribute is invalid.',
    'not_regex' => 'de-> The :attribute format is invalid.',
    'numeric' => 'de-> The :attribute must be a number.',
    'password' => 'de-> The password is incorrect.',
    'present' => 'de-> The :attribute field must be present.',
    'regex' => 'de-> The :attribute format is invalid.',
    'required' => 'de-> The :attribute field is required.',
    'required_if' => 'de-> The :attribute field is required when :other is :value.',
    'required_unless' => 'de-> The :attribute field is required unless :other is in :values.',
    'required_with' => 'de-> The :attribute field is required when :values is present.',
    'required_with_all' => 'de-> The :attribute field is required when :values are present.',
    'required_without' => 'de-> The :attribute field is required when :values is not present.',
    'required_without_all' => 'de-> The :attribute field is required when none of :values are present.',
    'same' => 'de-> The :attribute and :other must match.',
    'size' => [
        'numeric' => 'de-> The :attribute must be :size.',
        'file' => 'de-> The :attribute must be :size kilobytes.',
        'string' => 'de-> The :attribute must be :size characters.',
        'array' => 'de-> The :attribute must contain :size items.',
    ],
    'starts_with' => 'de-> The :attribute must start with one of the following: :values.',
    'string' => 'de-> The :attribute must be a string.',
    'timezone' => 'de-> The :attribute must be a valid zone.',
    'unique' => 'de-> The :attribute has already been taken.',
    'uploaded' => 'de-> The :attribute failed to upload.',
    'url' => 'de-> The :attribute format is invalid.',
    'uuid' => 'de-> The :attribute must be a valid UUID.',

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
            'rule-name' => 'de-> custom-message',
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
