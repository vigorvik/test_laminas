<?php

namespace Hearthstone\Model;

use RuntimeException;
use Laminas\Db\TableGateway\TableGatewayInterface;

class CardTypeTable
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

    public function getCardType($id)
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

    public function saveCardType(CardType $card)
    {
        $data = [
            'name' => $card->name
        ];

        $id = (int) $card->id;

        if ($id === 0) {
            $this->tableGateway->insert($data);
            return;
        }

        try {
            $this->getCardType($id);
        } catch (RuntimeException $e) {
            throw new RuntimeException(sprintf(
                'ошибка при обновлении типа карт с идентификатором %d; отсутствует такой идентификатор',
                $id
            ));
        }

        $this->tableGateway->update($data, ['id' => $id]);
    }

    public function deleteCardType($id)
    {
        $this->tableGateway->delete(['id' => (int) $id]);
    }
}