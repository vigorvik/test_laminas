<?php

namespace Hearthstone\Model;

class CardType
{
    public $id;
    public $name;

    public function exchangeArray(array $data)
    {
        $this->id     = !empty($data['id']) ? $data['id'] : null;
        $this->name = !empty($data['name']) ? $data['name'] : null;
    }
}