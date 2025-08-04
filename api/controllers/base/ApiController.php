<?php

namespace api\controllers\base;

use yii\filters\ContentNegotiator;
use yii\rest\Controller;
use yii\web\Response;

abstract class ApiController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'contentNegotiator' => [
                'class' => ContentNegotiator::class,
                'formats' => [
                    'application/json' => Response::FORMAT_JSON,
                ],
            ],
        ];
    }
}
