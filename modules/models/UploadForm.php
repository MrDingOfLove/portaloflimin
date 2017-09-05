<?php  
namespace app\modules\models;
use yii\base\Model;
use yii\web\UploadedFile; 
use yii;

class UploadForm extends Model
{
    /**
     * @var UploadedFile file attribute
     */
    public $file;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['file'], 'file','skipOnEmpty' => false],
        ];
    }
    public function upload(){
        $this->file = UploadedFile::getInstance($this, 'file');
        if ($this->file && $this->validate()) { 
            if(!file_exists('upload/cover/'.date('Y-m-d',time()))){
                mkdir('upload/cover/'.date('Y-m-d',time()));
            }
            $filePath = 'upload/cover/'.date('Y-m-d',time()).'/' . $this->file->baseName . '.' . $this->file->extension;     
            $this->file->saveAs($filePath);
            yii::$app->getSession()->setFlash('picture','图片上传成功');
            return $filePath;
        }else{
            yii::$app->getSession()->setFlash('picture','图片上传失败');
        }
    }
}
?>