<?php

namespace Hearthstone;


use Laminas\Db\Adapter\AdapterInterface;
use Laminas\Db\ResultSet\ResultSet;
use Laminas\Db\TableGateway\TableGateway;
use Laminas\ModuleManager\Feature\ConfigProviderInterface;
use Laminas\ServiceManager\ServiceManager;

class Module implements ConfigProviderInterface
{
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }

    public function getServiceConfig()
    {
        return [
            'factories' => [
                Model\CardTable::class => function(ServiceManager $container) {
                    $tableGateway = $container->get(Model\CardTableGateway::class);
                    return new Model\CardTable($tableGateway);
                },
                Model\CardTableGateway::class => function ($container) {
                    $dbAdapter = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\Card());
                    return new TableGateway('card', $dbAdapter, null, $resultSetPrototype);
                },
                Model\CardTypeTable::class => function($container) {
                    $tableGateway = $container->get(Model\CardTypeTableGateway::class);
                    return new Model\CardTypeTable($tableGateway);
                },
                Model\CardTypeTableGateway::class => function ($container) {
                    $dbAdapter = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\CardType());
                    return new TableGateway('card_type', $dbAdapter, null, $resultSetPrototype);
                },
            ],
        ];
    }

    public function getControllerConfig()
    {
        return [
            'factories' => [
                Controller\CardController::class => function($container) {
                    return new Controller\CardController(
                        $container->get(Model\CardTable::class)
                    );
                },
            ],
        ];
    }
}