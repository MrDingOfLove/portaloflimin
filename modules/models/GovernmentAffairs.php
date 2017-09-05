<?php
namespace app\modules\models;
use yii\db\ActiveRecord;
use yii;
/**
* 
*/
class GovernmentAffairs extends ActiveRecord
{
	public static function tableName(){
		return "{{government_affairs}}";
	}
	public function rules(){
		return[
			['title','required','message'=>'文章标题不能为空'],	
		];
	}
	public function add($data,$filePath){
		if($this->load($data)){
			if ($this->validate()){
				if (isset($data['detial'])) {
					$this->detial = $data['detial'];
				}
				if ($this->save()) {
					return true;
				}
				return false;
				}
		}	
	}
	public function updatedata($data,$filePath,$id){
		if($this->load($data)){
			$rows = 0;
			if (isset($data['detial'])) {
				$this->detial = $data['detial'];
			}
			$rows = $this->updateAll(['title' => $this->title,'time' => $this->time,'detial' => $this->detial], "id = $id");
			if ($rows>0) {
				return true;
			}
			return false;
		}	
	}
}
?>