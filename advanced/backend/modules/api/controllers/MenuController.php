<?php
/**
 * Created by PhpStorm.
 * User: Utilizador
 * Date: 31/12/2018
 * Time: 10:00
 */

namespace backend\modules\api\controllers;

use yii\rest\ActiveController;

class MenuController extends ActiveController
{
    public $modelClass = 'backend\models\Menu';
}