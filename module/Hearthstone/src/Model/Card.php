<?php

namespace Hearthstone\Model;

class Card
{
    public $id;
    public $name;
    public $text;
    public $flavorText;
    public $artistName;
    public $cardTypeId;
    public $minionTypeId;
    public $spellSchoolId;
    public $rarityId;
    public $cardSetId;
    public $classId;
    public $health;
    public $attack;
    public $durability;
    public $manaCost;
    public $collectible;
    public $image;
    public $cropImage;
    public $copyOfCardId;

    public function exchangeArray(array $data)
    {
        $this->id     = !empty($data['id']) ? $data['id'] : null;
        $this->name = !empty($data['name']) ? $data['name'] : null;
        $this->text  = !empty($data['text']) ? $data['text'] : null;
        $this->flavorText  = !empty($data['flavor_text']) ? $data['flavor_text'] : null;
        $this->artistName  = !empty($data['artist_name']) ? $data['artist_name'] : null;
        $this->cardTypeId  = !empty($data['card_type_id']) ? $data['card_type_id'] : null;
        $this->minionTypeId  = !empty($data['minion_type_id']) ? $data['minion_type_id'] : null;
        $this->spellSchoolId  = !empty($data['spell_school_id']) ? $data['spell_school_id'] : null;
        $this->rarityId  = !empty($data['rarity_id']) ? $data['rarity_id'] : null;
        $this->cardSetId  = !empty($data['card_set_id']) ? $data['card_set_id'] : null;
        $this->classId  = !empty($data['class_id']) ? $data['class_id'] : null;
        $this->health  = !empty($data['health']) ? $data['health'] : null;
        $this->attack  = !empty($data['attack']) ? $data['attack'] : null;
        $this->durability  = !empty($data['durability']) ? $data['durability'] : null;
        $this->manaCost  = !empty($data['mana_cost']) ? $data['mana_cost'] : null;
        $this->collectible  = !empty($data['collectible']) ? $data['collectible'] : 0;
        $this->image  = !empty($data['image']) ? $data['image'] : null;
        $this->cropImage  = !empty($data['crop_image']) ? $data['crop_image'] : null;
        $this->copyOfCardId  = !empty($data['copy_of_card_id']) ? $data['copy_of_card_id'] : null;
    }
}