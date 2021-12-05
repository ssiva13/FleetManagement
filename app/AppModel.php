<?php
	
	namespace App;
	
	use Illuminate\Database\Eloquent\Factories\HasFactory;
	use Illuminate\Database\Eloquent\Model;
	
	class AppModel extends Model
	{
		use HasFactory;
		
		public function getAllAttributes(): array
		{
			$columns = $this->getFillable();
			$attributes = $this->getAttributes();
			foreach ($columns as $column)
			{
				if (array_key_exists($column, $attributes)) {
					continue;
				}
				$attributes[$column] = null;
			}
			return $attributes;
		}
		
		/**
		 * @param $key
		 * @return mixed|string
		 */
		public function getAttributeLabel($key)
		{
			if (!$key) {
				return '';
			}
			$labels = $this->attributeLabels();
			if (array_key_exists($key, $labels) ||
				array_key_exists($key, $this->casts) ||
				$this->hasGetMutator($key) ||
				$this->isClassCastable($key)) {
				return $labels[$key];
			}
			return snakeCaseSplit($key);
		}
	}