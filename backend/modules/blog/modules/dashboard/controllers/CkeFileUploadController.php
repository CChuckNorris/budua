<?php

namespace backend\modules\blog\modules\dashboard\controllers;

use backend\modules\blog\modules\dashboard\managers\FileUploaderManager;
use yii\helpers\BaseFileHelper;
use yii\web\Controller;
use yii\web\UploadedFile;
use Yii;

/**
 * Class CkeFileUploadController
 * @package backend\modules\blog\modules\dashboard\controllers
 */
class CkeFileUploadController extends Controller
{

    public function beforeAction($action)
    {
        if ($action->id == 'upload') {
            $this->enableCsrfValidation = false;
        }

        return parent::beforeAction($action);
    }

    public function actionUpload()
    {
        $uploadFileManager = new FileUploaderManager();

        if ($file = UploadedFile::getInstancesByName('upload')) {
        $links = $uploadFileManager
            ->setFileNamePattern("content")
            ->setSizes(["small" => [320, 240], "medium" => [640, 480], "large" => [800, 600], "x-large" => [960, 720]])
            ->setTargetDirectory("ckeditor_images")
            ->bulkUpload($file);
        $funcNum = Yii::$app->request->get("CKEditorFuncNum");
        $url = \Yii::$app->request->getHostInfo().$links[0]['origin_path'];
        $message = "";

        echo '<script type="text/javascript">window.parent.CKEDITOR.tools.callFunction("'
                .$funcNum.'", "'.$url.'", "'.$message.'" );</script>';
        }

    }
}