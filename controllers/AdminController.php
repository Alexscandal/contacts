<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\LoginModel;
use app\models\Users;
use yii\bootstrap\ActiveForm;
use yii\data\ArrayDataProvider;

class AdminController extends Controller
{
     
    public function actionLogin()
    {

        $model = new LoginModel();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $this->redirect('/admin/');
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }
     
     public function actionIndex()
     {
          $session = Yii::$app->session;
          $auth = $session->get('auth');
          $model=new LoginModel();
          if (!$auth) return $this->render('login',['model' => $model]);
          $model = new Users();
        $items=$model::find()->orderBy('name')->asArray()->all();
        $searchModel = [
            'name' => trim(Yii::$app->request->getQueryParam('filter_name', '')),
            'email' => trim(Yii::$app->request->getQueryParam('filter_email', '')),
            'phone' => trim(Yii::$app->request->getQueryParam('filter_phone', ''))
        ];
        $filteredData = array_filter($items, function($item) use ($searchModel) {
            if (!empty($searchModel['name'])) {
               return strpos(strtolower($item['name']),strtolower($searchModel['name'])) ? true : false;
            } elseif (!empty($searchModel['email'])) {
               return strpos(strtolower($item['email']),strtolower($searchModel['email'])) ? true : false;
            } elseif (!empty($searchModel['phone'])) {
               return strpos(strtolower($item['phone']),strtolower($searchModel['phone'])) ? true : false;
            }
            return true;
        });

        $rows = new ArrayDataProvider([
            'key' => 'id',
            'allModels' => $filteredData
        ]);
          Yii::$app->view->title = 'Список пользователей';
          return $this->render('index',['rows' => $rows, 'searchModel' => $searchModel]);
     }
     
     public function actionUpdate()
     {
          $session = Yii::$app->session;
          $auth = $session->get('auth');
          if (!$auth) $this->redirect('/admin/');
          $id = Yii::$app->request->get('id');
          $user = Users::findOne($id);
        Yii::$app->view->title = 'Изменить пользователя';
        return $this->render('view', [
            'user' => $user,
            'message' => $message
        ]);
     }
     
     public function actionEdit()
     {
          $session = Yii::$app->session;
          $auth = $session->get('auth');
          if (!$auth) $this->redirect('/admin/');
          $data = Yii::$app->request->post();
          $user = Users::findOne($data['Users']['id']);
          $user->name=$data['Users']['name'];
          $user->email=$data['Users']['email'];
          $user->phone=$data['Users']['phone'];
          $user->save();
          $this->redirect('/admin/');
     }
     
     public function actionDelete()
     {
          $session = Yii::$app->session;
          $auth = $session->get('auth');
          if (!$auth) $this->redirect('/admin/');
          $id = Yii::$app->request->get('id');
          $user = Users::findOne($id);
          $user->delete();
          $this->redirect('/admin/');
     }
     
}