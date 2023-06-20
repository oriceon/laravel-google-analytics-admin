<?php

namespace Tda\LaravelGoogleAnalyticsAdmin\Traits;

use ReflectionObject;
use ReflectionProperty;

trait encode
{
    public function encode(bool $is_json = false): array
    {
        $array = [];
        $attributes = (new ReflectionObject($this))->getProperties(ReflectionProperty::IS_PUBLIC);
        foreach($attributes as $attribute) {
            if(isset($this->{$attribute->name})) {
                $array[$attribute->name] = $this->{$attribute->name};
            }
        }

        if($is_json) {
            return json_encode($array);
        }
        return $array;
    }
}
