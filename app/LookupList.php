<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property int $id
 * @property LookupValue $fkLookupValue
 */
class LookupList extends AppModel
{
	/**
	 * @var array
	 */
	protected $fillable = [
		'id', 'type_name', 'name_format', 'data_type', 'required', 'created_at', 'updated_at'
	];
	
	public function attributeLabels(): array
	{
		return [
			'id' => 'ID',
			'type_name' => 'Type Name',
			'name_format' => 'Name Format',
			'data_type' => 'Data Type',
			'required' => 'Required?',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At'
		];
	}
	
	/**
	 * @return HasMany
	 */
	public function fkLookupValue(): HasMany
	{
		return $this->hasMany(LookupValue::class, 'fk_lookup_list', 'id');
	}
	
}
