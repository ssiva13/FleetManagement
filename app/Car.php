<?php

namespace App;

use Illuminate\Database\Eloquent\Concerns\HasAttributes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Car extends AppModel
{
	/**
	 * @var array
	 */
	protected $fillable = [
		'id', 'plate_number', 'make', 'model', 'transmission', 'fuel',
		'year_of_manufacture', 'engine_size', 'color', 'owner', 'created_at', 'updated_at'
	];
	
	public function attributeLabels(): array
	{
		return [
			'id' => 'ID',
			'plate_number' => 'Plate Number',
			'make' => 'Car Make',
			'model' => 'Car Model',
			'transmission' => 'Transmission',
			'fuel' => 'Fuel',
			'year_of_manufacture' => 'Year of Manufacture',
			'engine_size' => 'Engine Size',
			'color' => 'Color',
			'owner' => 'Vehicle Owner',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At'
		];
	}

	/**
	 * @return HasOne
	 */
	public function fkCarOwner(): HasOne
	{
		return $this->hasOne(User::class, 'id', 'owner');
	}
}
