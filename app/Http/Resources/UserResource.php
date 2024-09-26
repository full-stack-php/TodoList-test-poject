<?php

namespace App\Http\Resources;

class UserResource
{

    public static function toArray($resource){
        return [
            'id' => $resource->id,
            'name' => $resource->name,
            'email' => $resource->email
        ];
    }
}