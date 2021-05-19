<?php

namespace frontend\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $imageFile;

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
        ];
    }
    
    public function upload_model($model) {

        /**
        * If the $model->image field is not empty, proceed to uploading.
        */
        if ($model->image) {

            /**
            * Assign current time.
            */
            $time = time();

            /**
            * Create the basePath for the image to be uploaded at @root/uploads.
            * Create the image name.
            * Create the database model.
            */
            $imageBasePath = dirname(Yii::$app->basePath, 1) . '\uploads\\';
            $imageData = 'img' . $model->image->baseName . '.' . $model->image->extension;
            $imageDatabaseEntryPath = '../../../uploads/';

            $modelImageDatabaseEntry = $imageDatabaseEntryPath . $time . $imageData;

            $model->image->saveAs($imageBasePath . $time . $imageData);

            $model->image = $modelImageDatabaseEntry;

            /**
            * If the model can be saved into the database, return true; else return false.
            * Further handling will be done in the controller.
            */
            if ($model->save(false)) {
                return true;
            } else {
                return false;
            }

        }

    }

    public function upload()
    {
        if ($this->validate()) {
            $this->imageFile->saveAs('../web/uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            //$this->imageFile->saveAs('@frontend/web/img/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            
            return true;
        } else {
            return false;
        }
    }
}