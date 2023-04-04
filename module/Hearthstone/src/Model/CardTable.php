<?php

namespace Hearthstone\Model;

use Laminas\Db\ResultSet\ResultSetInterface;
use Laminas\Db\ResultSet\Iterator;
use RuntimeException;
use Laminas\Db\TableGateway\TableGatewayInterface;
use Traversable;

class CardTable
{
    private $tableGateway;

    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        return $this->tableGateway->select();
    }

    public function getCard($id)
    {
        $id = (int) $id;
        $rowset = $this->tableGateway->select(['id' => $id]);
        $row = $rowset->current();
        if (! $row) {
            throw new RuntimeException(sprintf(
                'Could not find row with identifier %d',
                $id
            ));
        }

        return $row;
    }

    public function saveCard(Card $card)
    {
        $data = [
            'name' => $card->name,
            'text'  => $card->text,
            'flavorText'  => $card->flavorText,
            'artistName'  => $card->artistName,
            'cardTypeId'  => $card->cardTypeId,
            'minionTypeId'  => $card->minionTypeId,
            'spellSchoolId'  => $card->spellSchoolId,
            'rarityId'  => $card->rarityId,
            'cardSetId'  => $card->cardSetId,
            'classId'  => $card->classId,
            'health'  => $card->health,
            'durability'  => $card->durability,
            'manaCost'  => $card->manaCost,
            'collectible'  => $card->collectible,
            'image'  => $card->image,
            'cropImage'  => $card->cropImage,
            'copyOfCardId'  => $card->copyOfCardId
        ];

        $id = (int) $card->id;

        if ($id === 0) {
            $this->tableGateway->insert($data);
            return;
        }

        try {
            $this->getCard($id);
        } catch (RuntimeException $e) {
            throw new RuntimeException(sprintf(
                'Cannot update album with identifier %d; does not exist',
                $id
            ));
        }

        $this->tableGateway->update($data, ['id' => $id]);
    }

    public function deleteCard($id)
    {
        $this->tableGateway->delete(['id' => (int) $id]);
    }
}