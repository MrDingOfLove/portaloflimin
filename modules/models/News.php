<?php
namespace app\modules\models;
use yii\db\ActiveRecord;
use yii;
use yii\web\UploadedFile; 

class News extends ActiveRecord
{
	public static function tableName(){
		return "{{news}}";
	}
	public function rules(){
		return[
			['title','required','message'=>'文章标题不能为空'],
			['brief','required','message'=>'文章简介不能为空'],
			['detial','required','message'=>'文章内容不能为空'],
		];
	}
	public function add($data,$filePath){
		if($this->load($data)){
			if (isset($data['detial'])) {
				$this->detial = $data['detial'];
			}
			if (isset($filePath)) {
				$this->cover = $filePath;
			}
			if ($this->save()) {
				return true;
			}
			return false;
		}	
	}
	public function updatedata($data,$filePath,$id){
		if($this->load($data)){
			$rows = 0;
			if ($this->validate()) {
				if (isset($data['detial'])) {
					$this->detial = $data['detial'];
				}
				if (isset($filePath)) {
					$this->cover = $filePath;
					$rows = $this->updateAll(['title' => $this->title,'time' => $this->time,'brief' => $this->brief,'cover' => $this->cover,'detial' => $this->detial], "id = $id");
				}else{
					$rows = $this->updateAll(['title' => $this->title,'time' => $this->time,'brief' => $this->brief,'detial' => $this->detial], "id = $id");
				}
				if ($rows>0) {
					return true;
				}
			}
			return false;
		}	
	}
}
?>