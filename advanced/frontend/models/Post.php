<?php
/**
 * Created by PhpStorm.
 * User: Module
 * Date: 08/12/2018
 * Time: 17:50
 */

namespace frontend\models;

use yii\db\ActiveRecord;

class Post extends ActiveRecord{

    public static function tableName(){
        return 'prato';
    }
}