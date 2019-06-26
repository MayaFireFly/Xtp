<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\XmlToPhp;
use yii\data\ArrayDataProvider;
use yii\filters\VerbFilter;

class XtpController extends Controller{

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $model = new XmlToPhp("@app/../../models/categories.xml");
        $data = $model->getArrData();

        $result = [];        
        for($i = 0; $i < count($data); $i++){
            $result[$i + 1] = $data[$i];
        }

        $dataProvider = new ArrayDataProvider([
            'allModels' => $result,
            'pagination' => [
                'pageSize' => 10,
            ],            
        ]);

        return $this->render('index', [            
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
    }

    public function actionView($id)
    {
        $model = new XmlToPhp("@app/../../models/products.xml");
        $data = $model->getArrDataFromId($id);

        $dataProvider = new ArrayDataProvider([
            'allModels' => $data,
            'pagination' => [
                'pageSize' => 10,
            ],
            'sort' => [
                'attributes' => ['id', 'categoryId'],
            ],
        ]);

        return $this->render('view', [
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
    }  
}
?>