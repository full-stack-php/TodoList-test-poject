<?php

namespace App\Http\Resources;

class TaskResource
{
    public function toArray($request){

        return [
            'id' => $this->id,
            'name' => $this->name,
            'categories' => $this->categories,
            'flags' => $this->flags,
            'date' => $this->due_date,
            'time' => $this->due_time,
        ];
    }
}