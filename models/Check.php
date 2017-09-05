<?php  
	namespace app\models;
	use yii\db\ActiveRecord;

	class Check extends ActiveRecord{
		public static function tableName(){
			return "{{tb_copy}}";
		}
		public static function filter($start_time,$end_time,$user_id){
			$data = self::find()->where('client_id = :user and copy_lasttime >= :start_time and copy_lasttime <= :end_time',[':user'=>$user_id,':start_time'=>$start_time,':end_time'=>$end_time]);
			return $data;
		}
		public static function getAll($user_id){
			$data = self::find()->where('client_id = :user',[':user'=>$user_id]);
			return $data;
		}
	}