<?php
namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class AvatarUpload extends Model
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
    
    public function upload($idSistema)
    {  
        $path = $idSistema . '_' . md5(date('d-m-Y H:i:s')) . '.' . $this->imageFile->extension;
        if ($this->validate()) {
            $this->imageFile->saveAs('../web/imgs/system/avatar/' . $path , false);
            return $path;
        } else {
            return false;
        }
    }
}