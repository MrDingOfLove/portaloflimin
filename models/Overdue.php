<?php  
	namespace app\models;
	use yii\db\ActiveRecord;

	class Overdue extends ActiveRecord{
		public static function tableName(){
			return "{{tb_overdue}}";
		}
		public static function getOverdue($user_id){
			$data = self::find()->where('client_id = :user',[':user'=>$user_id]);
			return $data;
		}
	}