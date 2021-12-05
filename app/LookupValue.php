<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property integer $fk_lookup_list
 * @property LookupList $fkLookupList
 */
class LookupValue extends AppModel
{
	public const ACTIVE = 1;
	public const INACTIVE = 0;
	public const YES = 1;
	public const NO = 0;
	/**
	 * @var array
	 */
	protected $fillable = [
		'id', 'fk_lookup_list', 'option_key', 'option_value', 'status', 'has_children', 'fk_parent_value', 'created_at', 'updated_at'
	];
	
	/**
	 * @return string[]
	 */
	public function attributeLabels(): array
	{
		return [
			'id' => 'ID',
			'fk_lookup_list' => 'Lookup Type',
			'option_key' => 'Option Key',
			'option_value' => 'Option Value',
			'status' => 'Status',
			'fk_parent_value' => 'Parent Value',
			'has_children' => 'Has Children',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At'
		];
	}
	
	/**
	 * @return HasOne
	 */
	public function fkLookupList(): HasOne
	{
		return $this->hasOne(LookupList::class, 'id', 'fk_lookup_list');
	}
	
	/**
	 * @return HasOne
	 */
	public function fkParentValue(): HasOne
	{
		return $this->hasOne(self::class, 'id', 'fk_parent_value');
	}
	
	/**
	 * @return HasMany
	 */
	public function fkChildrenValues(): HasMany
	{
		return $this->hasMany(self::class, 'fk_parent_value', 'id');
	}
	
	public static function getLookupValues($optionType): array
	{
		$vehicleMakes = [];
		if($lookUpType = LookupList::where(['type_name' => $optionType])->first()){
			$lookUpValues = self::where('fk_lookup_list', $lookUpType->id)->where('status', self::ACTIVE)->get();
			if($lookUpValues){
				$vehicleMakes = mapObjectToArray($lookUpValues, 'option_key', 'option_value', 'id');
			}
		}
		return $vehicleMakes;
	}

}
