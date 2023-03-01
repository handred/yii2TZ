<?php

namespace app\controllers;

use app\models\Polls;
use Yii;
use yii\web\Controller;

/**
 * PollsController implements the CRUD actions for Polls model.
 */
class EnterController extends Controller {

    public function actionIndex() {
        $model = new Polls();
        $post = Yii::$app->request->post();
        if ($model->load($post) && $model->save()) {
            return $this->render('success', ['model' => $model]);
        }
        return $this->render('index', ['model' => $model]);
    }

}
