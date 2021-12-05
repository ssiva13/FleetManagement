<?php
	
	namespace App\Helpers;
	
	use App\LookupValue;
	use Psy\Util\Json;
	
	class FormsHelper
	{
		public static function generateSelectOptions($optionType): string
		{
			$fieldOptions = LookupValue::getLookupValues($optionType);
			$options = "";
			foreach ($fieldOptions as $fieldOptionKey => $fieldOption){
				$options .= "<option value='".$fieldOptionKey."' data-option-id='".$fieldOption[1]."'> " .$fieldOption[1]. ' - ' .$fieldOption[0] ." </option>";
			}
			return $options;
		}
	}