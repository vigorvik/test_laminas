<?php

namespace Hearthstone\Controller;

use Hearthstone\Model\CardTable;
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\Stdlib\RequestInterface as Request;
use Laminas\View\Model\ViewModel;
use Hearthstone\Form\CardForm;
use Hearthstone\Model\Card;
use Laminas\Http\Request as HttpRequest;

class CardController extends AbstractActionController
{
    private $table;

    public function __construct(CardTable $table)
    {
        $this->table = $table;
    }

    public function indexAction()
    {
        return new ViewModel([
            'cards' => $this->table->fetchAll(),
        ]);
    }

    /* Update the following method to read as follows: */
    public function addAction()
    {
        $form = new CardForm();
        $form->get('submit')->setValue('Add');

        /** @var HttpRequest $request */
        $request = $this->getRequest();

        if (!$request->isPost()) {
            return ['form' => $form];
        }

        $card = new Card();

        $test = $card->getInputFilter();

        $form->setInputFilter($card->getInputFilter());
        $form->setData($request->getPost());

        if (!$form->isValid()) {
            return ['form' => $form];
        }

        $card->exchangeArray($form->getData());
        $this->table->saveCard($card);
        return $this->redirect()->toRoute('card');
    }

    public function editAction()
    {
    }

    public function deleteAction()
    {
    }
}