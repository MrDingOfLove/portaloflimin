<?php
namespace app\modules\models;
use yii\db\ActiveRecord;
use yii;
use yii\web\UploadedFile; 

class Information extends ActiveRecord
{
	public static function tableName(){
		return "{{information}}";
	}
	public function rules(){
		return[
			['address','required','message'=>'请填写地址'],
			['username','required','message'=>'请填写您的名字'],
			['phone','required','message'=>'请填写您的联系电话'],
			['category','required','message'=>'请选择问题类别'],
			['detial','required','message'=>'请填写咨询或投诉内容'],
		];
	}
	public function commit($data){
		if ($this->load($data)&&$this->validate()) {
			switch ($this->category) {
				case '1':
					$this->category = '用户无水';
					break;
				case '2':
					$this->category = '管道漏水';
					break;
				case '3':
					$this->category = '设施故障';
					break;
				case '4':
					$this->category = '水质问题';
					break;
				case '5':
					$this->category = '举报违章';
					break;
				case '6':
					$this->category = '文明施工';
					break;
				case '7':
					$this->category = '服务投诉';
					break;
				case '8':
					$this->category = '营业抄收';
					break;
				case '9':
					$this->category = '信息咨询';
					break;
				case '10':
					$this->category = '用户修改';
					break;
				case '11':
					$this->category = '其他问题';
					break;
				default:
					yii::$app->getSession()->setFlash('no-category', '请选择问题类别');
					return false;
					break;
			}
			if ($this->save()) {
				return true;
			}
		}
		return false;
	}
}
?>