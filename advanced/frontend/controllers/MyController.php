<?php
/**
 * Created by PhpStorm.
 * User: Module
 * Date: 08/12/2018
 * Time: 17:49
 */

namespace frontend\controllers;


use yii\web\Controller;
use frontend\models\Post;

class MyController extends Controller
{
    public function actionIndex()
    {
        $object = Post::findOne(1);
        return $this->render('menu', [
            'object' => $object,
        ]);
    }
}