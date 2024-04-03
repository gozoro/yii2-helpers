# yii2-helpers
Helpers for Yii2 Framework as static functions.

## HTML helpers

```php

Html::rus2translit("привет мир"); // privet mir

Html::str2url("привет мир!") // privet-mir

Html::text("это ссылка http://example.com") // это ссылка <a href="http://example.com">http://example.com</a>

Html::csrfHiddenInput(); //  Return string with CSRF hidden input

Html::video("./example.mp4") // Returns string with video tag or youtube-iframe.

```


## JSON helpers

```php
$options = [
	'valueString' => 'string',
	'valueInt'    => 5,
	'valueFloat'  => 4.3,
	'valueNull'   => null,
	'valueBool'   => true,
	'valArray'    => ['a', 'b', 'c'],
	'valAssoc'    => ['a'=>'apple', 'b'=>2, 'c'=>1],
	'func'        => 'function(val){return val;}',
];

Json::optionsEncode($options);

```
Returns string with JavaScript code:
```javascript
 
 {
 	"valueString": "string",
 	"valueInt": 5,
 	"valueFloat": 4.3,
 	"valueNull": null,
 	"valueBool": true,
 	"valArray": ["a", "b", "c"],
 	"valAssoc": {"a":"apple", "b":2, "c":1},
 	"func": function(val){return val;},
 }
```


## URL helper


Now you can parse and edit URLs
```php
$url = new Url("https://example.com/my-path");
echo $url->getScheme(); // https
echo $url->getHost(); // example.com
echo $url->getPath(); // /my-path
// etc

```