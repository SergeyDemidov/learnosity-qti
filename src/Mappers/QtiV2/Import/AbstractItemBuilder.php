<?php

namespace Learnosity\Mappers\QtiV2\Import;

use Learnosity\Entities\Item\item;
use qtism\data\content\ItemBody;
use qtism\data\QtiComponentCollection;

abstract class AbstractItemBuilder
{
    protected $assessmentItemIdentifier;
    protected $questions = [];
    protected $exceptions = [];
    protected $content = '';

    public function getItem()
    {
        $item = new item($this->assessmentItemIdentifier, array_keys($this->questions), $this->content);
        $item->set_status('published');
        return $item;
    }

    public function getQuestions()
    {
        return $this->questions;
    }

    public function getExceptions()
    {
        return $this->exceptions;
    }

    protected function getMapperInstance($interactionType, $params){
        $reflectionClass = new \ReflectionClass(static::MAPPER_CLASS_BASE.  ucfirst($interactionType));
        return $reflectionClass->newInstanceArgs($params);
    }

    abstract public function map($assessmentItemIdentifier,
                                 ItemBody $itemBody,
                                 QtiComponentCollection $interactionComponents,
                                 QtiComponentCollection $responseDeclarations = null,
                                 ResponseProcessingTemplate $responseProcessingTemplate = null);
}