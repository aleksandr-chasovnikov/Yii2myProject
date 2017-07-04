<?php 

namespace frontend\validators;

use yii\vallidators\Vallidator;

class NewValidator extends validator
{
	public function validateAttribute($model, $attribute)
	{
		if( !in_array( $model->$attribute, [ 'Buy', 'Rent', 'Sale'])) {
			$this->addError($model, $attribute, 'Нет таких значений');		}
	}
}