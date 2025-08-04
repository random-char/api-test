<?php

namespace api\controllers;

use api\controllers\base\ApiController;
use api\models\SumEvenForm;
use common\components\Numbers\Application\SumEvenCommand\SumEvenCommand;
use common\components\Numbers\Application\SumEvenCommand\SumEvenCommandHandler;
use common\components\Numbers\Domain\ValueObject\NumbersCollection;
use yii\filters\VerbFilter;
use yii\web\BadRequestHttpException;

class SumController extends ApiController
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::class,
                    'actions' => [
                        'even' => ['post', 'get'],
                    ],
                ],
            ],
        );
    }

    public function actionEven(): mixed
    {
        $form = new SumEvenForm();
        
        if ($form->load(\Yii::$app->request->post())) {
            if (!$form->validate()) {
                throw new BadRequestHttpException(
                    implode(';', $form->getErrorSummary(true))
                );
            }

            $command = new SumEvenCommand(NumbersCollection::fromScalarsArray($form->numbers));
            //use DI if handlers have dependencies, good enough for now
            $handler = new SumEvenCommandHandler();

            $sum = $handler($command);
            return [
                'sum' => $sum,
            ];
        }

        throw new BadRequestHttpException('Please pass the numbers to process.');
    }
}
