<?php

namespace Hearthstone\Form;

use Hearthstone\Model\CardTypeTable;
use Laminas\Form\Element;
use Laminas\Form\Form;
use Hearthstone\Model\CardType;

class CardForm extends Form
{
    public function __construct($name = null)
    {
        // We will ignore the name provided to the constructor
        parent::__construct('card');

        $this->add([
            'name' => 'id',
            'type' => 'text',
            'options' => [
                'label' => 'Идентификатор карты',
            ],
        ]);
        $this->add([
            'name' => 'name',
            'type' => 'text',
            'options' => [
                'label' => 'Наименование карты',
            ],
        ]);
        $this->add([
            'name' => 'text',
            'type' => 'text',
            'options' => [
                'label' => 'Описание способностей карты',
            ],
        ]);
        $this->add([
            'name' => 'flavor_text',
            'type' => 'text',
            'options' => [
                'label' => 'Слоган',
            ],
        ]);
        $this->add([
            'name' => 'artist_name',
            'type' => 'text',
            'options' => [
                'label' => 'Имя художника карты',
            ],
        ]);
        $this->add([
            'name' => 'card_type_id',
            'type' => 'text',
            'options' => [
                'label' => 'Идентификатор типа карты',
            ],
        ]);
        $this->add([
            'name' => 'minion_type_id',
            'type' => 'text',
            'options' => [
                'label' => 'Идентификатор типа существа',
            ],
        ]);
        $this->add([
            'name' => 'spell_school_id',
            'type' => 'text',
            'options' => [
                'label' => 'Идентификатор школы заклинаний',
            ],
        ]);
        $this->add([
            'name' => 'rarity_id',
            'type' => 'text',
            'options' => [
                'label' => 'Идентификатор редкости карты',
            ],
        ]);
        $this->add([
            'name' => 'card_set_id',
            'type' => 'text',
            'options' => [
                'label' => 'Идентификатор набора карт',
            ],
        ]);
        $this->add([
            'name' => 'class_id',
            'type' => 'text',
            'options' => [
                'label' => 'Идентификатор класса героя',
            ],
        ]);
        $this->add([
            'name' => 'health',
            'type' => 'text',
            'options' => [
                'label' => 'Показатель здоровья карты',
            ],
        ]);
        $this->add([
            'name' => 'attack',
            'type' => 'text',
            'options' => [
                'label' => 'Показатель атаки карты',
            ],
        ]);
        $this->add([
            'name' => 'durability',
            'type' => 'text',
            'options' => [
                'label' => 'Показатель прочности карты',
            ],
        ]);
        $this->add([
            'name' => 'mana_cost',
            'type' => 'text',
            'options' => [
                'label' => 'Стоимость маны',
            ],
        ]);
        $this->add([
            'name' => 'collectible',
            'type' => 'checkbox',
            'options' => [
                'label' => 'Коллекционная',
            ],
        ]);
        $this->add([
            'name' => 'slug',
            'type' => 'text',
            'options' => [
                'label' => 'slug',
            ],
        ]);
        $this->add([
            'name' => 'image',
            'type' => 'text',
            'options' => [
                'label' => 'Имя файла с изображением карты',
            ],
        ]);
        $this->add([
            'name' => 'crop_image',
            'type' => 'text',
            'options' => [
                'label' => 'Имя файла с обрезанным изображением карты',
            ],
        ]);
        $this->add([
            'name' => 'copy_of_card_id',
            'type' => 'text',
            'options' => [
                'label' => 'Идентификатор копии карты',
            ],
        ]);

        $this->add([
            'name' => 'submit',
            'type' => 'submit',
            'attributes' => [
                'value' => 'Go',
                'id' => 'submitbutton',
            ],
        ]);
    }
}