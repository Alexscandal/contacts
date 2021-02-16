<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\Users;
use yii\bootstrap\ActiveForm;

class SiteController extends \yii\web\Controller
{

     public function actionIndex()
     {
        $model = new Users();
        $message= '';
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            $message = 'Данные отправлены.';
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
        Yii::$app->view->title = 'Добавить пользователя';
        return $this->render('index', [
            'model' => $model,
            'message' => $message
        ]);
     }

     public function actionSave()
     {
         $model = new Users();
         Yii::$app->response->format = Response::FORMAT_JSON;
         if (Yii::$app->request->isAjax) {
             $data = Yii::$app->request->post();
             if ($model->load($data)) {
             $model->save(false);
                 return [
                     "message" => 'Данные отправлены',
                     "error" => null
                 ];
             } else {
                 return false;
             }
         } else {
             return $this->render('index', [
                 'model' => $model,
                 'message' => $message
             ]);
         }
     }
     
}
