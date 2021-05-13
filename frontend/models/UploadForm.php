<?php

namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $imageFile;
    public $description;

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg,doc,docx,xls,xlsx,pdf'],
            [['description'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
//            [['type', 'name', 'path'], 'string', 'max' => 255],
        ];
    }

    public function upload($id, $timestamp)
    {
        if ($this->validate()) {

            $this->imageFile->saveAs('uploads/freight-rate/' . $id . '_' . $timestamp . '.' . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }
    }
}

?>