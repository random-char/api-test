<?php

namespace api\models;

use yii\base\Model;

class SumEvenForm extends Model
{
    public mixed $numbers = [];

    public function rules(): array
    {
        return [
            // it wasn't specified that only integers are expected
            ['numbers', 'each', 'rule' => ['number'],],
        ];
    }

    public function formName(): string
    {
        return '';
    }
}
