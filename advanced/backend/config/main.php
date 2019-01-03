<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'name' => 'C.D.R.',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'api' => [
            'class' => 'backend\modules\api\Module',
        ],
    ],
    'components' => [
        'request' => [
            //'csrfParam' => '_csrf-backend',
            'cookieValidationKey' => 'Km1b7NlL-xtVxYKBXSb0NIdMuEmnWgoQ',
            'parsers' => [
                'application/json' => 'yii\web\JsonParser', //PARSER DO JSON
            ],
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

        'urlManager' => [
            'enablePrettyUrl' => true,
            //'showScriptName' => false,
            'rules' => [
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/utilizador',
                    'pluralize' => false,
                    'extraPatterns' => [
                        'GET total' => 'total', // 'total' é 'actionTotal'
                        'GET ativos' => 'ativos', // 'ativos' é 'actionAtivos'
                        'GET set/{id}' => 'set', // 'set' é 'actionSet'
                        'POST criar' => 'criar', // 'criar' é 'actionCriar'
                        'PUT atualizar/{id}' => 'atualizar', // 'atualizar' é 'actionAtualizar'
                        'DELETE apagar/{id}' => 'apagar', // 'apagar' é 'actionApagar'
                    ],
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/prato',
                    'pluralize' => false,
                    'extraPatterns' => [
                        'GET total' => 'total', // 'total' é 'actionTotal
                        'GET tipo/{id}' => 'tipo', // 'tipo' é 'actionTipo'
                        'GET semana/{id}' => 'semana', // 'semana' é 'actionSemana'
                        'GET set/{id}' => 'set', // 'set' é 'actionSet'
                        'POST criar' => 'criar', // 'criar' é 'actionCriar'
                        'PUT atualizar/{id}' => 'atualizar', // 'atualizar' é 'actionAtualizar'
                        'DELETE apagar/{id}' => 'apagar', // 'apagar' é 'actionApagar'
                    ],
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/bebida',
                    'pluralize' => false,
                    'extraPatterns' => [
                        'GET total' => 'total', // 'total' é 'actionTotal
                        'GET tipo/{id}' => 'tipo', // 'tipo' é 'actionTipo'
                        'GET set/{id}' => 'set', // 'set' é 'actionSet'
                        'POST criar' => 'criar', // 'criar' é 'actionCriar'
                        'PUT atualizar/{id}' => 'atualizar', // 'atualizar' é 'actionAtualizar'
                        'DELETE apagar/{id}' => 'apagar', // 'apagar' é 'actionApagar'
                    ],
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/sobremesa',
                    'pluralize' => false,
                    'extraPatterns' => [
                        'GET total' => 'total', // 'total' é 'actionTotal
                        'GET barato' => 'barato', // 'barato' é 'actionBarato
                        'GET set/{id}' => 'set', // 'set' é 'actionSet'
                        'POST criar' => 'criar', // 'criar' é 'actionCriar'
                        'PUT atualizar/{id}' => 'atualizar', // 'atualizar' é 'actionAtualizar'
                        'DELETE apagar/{id}' => 'apagar', // 'apagar' é 'actionApagar'
                    ],
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/menu',
                    'pluralize' => false,
                    'extraPatterns' => [
                        'GET total' => 'total', // 'total' é 'actionTotal
                        'GET set/{id}' => 'set', // 'set' é 'actionSet'
                        'POST criar' => 'criar', // 'criar' é 'actionCriar'
                        'PUT atualizar/{id}' => 'atualizar', // 'atualizar' é 'actionAtualizar'
                        'DELETE apagar/{id}' => 'apagar', // 'apagar' é 'actionApagar'
                    ],
                ],
            ],
        ],

    ],
    'params' => $params,
];
