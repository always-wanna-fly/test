<?php

namespace app\modules\news;

use Yii;


class Module extends \yii\base\Module
{

    public $controllerNamespace = 'app\modules\news\controllers';


    public function init()
    {
        parent::init();
        $this->registerTranslations();
    }

    public function registerTranslations()
    {
        if (!isset(Yii::$app->i18n->translations['news'])) {
            Yii::$app->i18n->translations['news'] = [
                'class' => 'yii\i18n\PhpMessageSource',
                'sourceLanguage' => 'en',
                'basePath' => '@app/modules/news/messages'
            ];
        }


    }
}