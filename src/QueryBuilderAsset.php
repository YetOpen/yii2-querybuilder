<?php

namespace leandrogehlen\querybuilder;

use yii\web\AssetBundle;

/**
 * This asset bundle provides the [jquery QueryBuilder library](https://github.com/mistic100/jQuery-QueryBuilder)
 *
 * @author Leandro Gehlen <leandrogehlen@gmail.com>
 */
class QueryBuilderAsset extends AssetBundle {

    public $sourcePath = '@bower/jquery-querybuilder/dist';

    public $js = [
        YII_DEBUG ? 'js/query-builder.standalone.js' : 'js/query-builder.standalone.min.js',
    ];

    public $css = [
        'css/query-builder.default.min.css',
    ];

    public $depends = [
        'yii\web\JqueryAsset'
    ];

    public function init()
    {
        parent::init();
        $language = \Yii::$app->language;
        // Check if the language file exists, if not use the abbreviated version, if it exists
        if (file_exists(\Yii::getAlias($this->sourcePath . "/i18n/query-builder.{$language}.js"))) {
            $this->js[] = "i18n/query-builder.{$language}.js";
        } elseif (file_exists(\Yii::getAlias($this->sourcePath . "/i18n/query-builder.{$language}.min.js"))) {
            $this->js[] = "i18n/query-builder.{$language}.min.js";
        }
    }

}
