<?php
	
	use Illuminate\Support\Arr;
	
	if (! function_exists('generate_licence')) {
		/**
		 * Generate a URL to a named route.
		 * @return string
		 * @throws Exception
		 */
		function generate_licence(): string
		{
			return random_int(1000,9999) . '-' . random_int(1000,9999) . '-' . random_int(1000,9999) . '-' . random_int(1000,9999) . '-' . random_int(1000,9999);
		}
	}
	if (! function_exists('snakeCaseSplit')) {
		/**
		 * Generate a URL to a named route.
		 * @param $string
		 * @return string
		 */
		function snakeCaseSplit($string): string
		{
			return ucwords(str_replace('_', ' ', $string));
		}
	}
	
	if (! function_exists('mapObjectToArray')) {
		function mapObjectToArray($array, $from, $to, $join = null, $group = null): array
		{
			$result = [];
			foreach ($array as $element) {
				$key = Arr::get($element, $from);
				$value = Arr::get($element, $to);
				if ($group !== null) {
					$result[Arr::get($element, $group)][$key] = $value;
				}
				if ($join !== null) {
					$extraCol = Arr::get($element, $join);
					$result[$key] = [$value, $extraCol];
				} else {
					$result[$key] = $value;
				}
			}
			return $result;
		}
	}
	
	if (! function_exists('concatArrayElements')) {
		function concatArrayElements($array): string
		{
			return implode(' ', $array);
		}
	}
	
	if (! function_exists('convertStringToArray')) {
		function convertStringToArray($string): string
		{
			return explode(' ', $string);
		}
	}

	
	if (! function_exists('simpleFunction')) {
		function simpleFunction(){
		
		}
	}

