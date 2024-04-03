<?php

namespace gozoro\yii2\helpers;

use yii\helpers\ArrayHelper;

/**
 * Json helper
 */
class Json extends \yii\helpers\Json
{

	/**
	 * Encodes the given options into a JSON string.
	 *
	 * Input php array:
	 * ```php
	 * $options = [
	 * 		'valueString' => 'string',
	 * 		'valueInt'    => 5,
	 * 		'valueFloat'  => 4.3,
	 * 		'valueNull'   => null,
	 * 		'valueBool'   => true,
	 * 		'valArray'    => ['a', 'b', 'c'],
	 * 		'valAssoc'    => ['a'=>'apple', 'b'=>2, 'c'=>1],
	 * 		'func'        => 'function(val){return val;}',
	 * ];
	 * ```
	 *
	 * Output string with JavaScript:
	 * ```javascript
	 *
	 * {
	 * 		"valueString": "string",
	 * 		"valueInt": 5,
	 * 		"valueFloat": 4.3,
	 * 		"valueNull": null,
	 * 		"valueBool": true,
	 * 		"valArray": ["a", "b", "c"],
	 * 		"valAssoc": {"a":"apple", "b":2, "c":1},
	 * 		"func": function(val){return val;},
	 * }
	 *
	 * ```
	 *
	 * @param array $options
	 * @return string
	 */
	public static function optionsEncode(array $options)
	{
		$jsOptions = [];

		foreach($options as $key => $val)
		{
			if(is_string($val) and strpos($val, 'function')===0)
			{
				$jsOptions[$key] = $key.':'.$val;
			}
			elseif(ArrayHelper::isAssociative($val))
			{
				$jsOptions[$key] = $key.':'.static::optionsEncode($val);
			}
			else
			{
				$jsOptions[$key] = $key.':'.static::encode($val);
			}
		}


		return '{'.implode(',', $jsOptions).'}';
	}
}
