<?php

namespace LearnosityQti\Processors\QtiV2\In\Interactions;

use LearnosityQti\Entities\QuestionTypes\mcq;
use LearnosityQti\Entities\QuestionTypes\mcq_ui_style;
use LearnosityQti\Utils\QtiMarshallerUtil;
use LearnosityQti\Processors\QtiV2\In\Validation\ChoiceInteractionValidationBuilder;
use LearnosityQti\Services\LogService;
use qtism\data\content\interactions\Orientation;
use qtism\data\content\interactions\Prompt;
use qtism\data\content\interactions\SimpleChoice;
use qtism\data\content\interactions\SimpleChoiceCollection;
use qtism\data\content\interactions\ChoiceInteraction as QtiChoiceInteraction;

class ChoiceInteractionMapper extends AbstractInteractionMapper
{
    public function getQuestionType()
    {
        /* @var QtiChoiceInteraction $interaction */
        $interaction = $this->interaction;

        $options = $this->buildOptions($interaction->getSimpleChoices());
        $mcq = new mcq('mcq', $options);

        // Support for @shuffle
        $mustShuffle = $interaction->mustShuffle();
        if ($mustShuffle) {
            $mcq->set_shuffle_options($mustShuffle);
            LogService::log('Set shuffle choices as true, however `fixed` attribute would be ignored since we don\'t support partial shuffle');
        }

        // Support for @orientation ('vertical' or 'horizontal')
        $uiStyle = new mcq_ui_style();
        if ($interaction->getOrientation() === Orientation::HORIZONTAL) {
            $uiStyle->set_type('horizontal');
            $uiStyle->set_columns(count($options));
            $mcq->set_ui_style($uiStyle);
        }

        // Support mapping for <prompt>
        if ($interaction->getPrompt() instanceof Prompt) {
            $promptContent = $interaction->getPrompt()->getContent();
            $mcq->set_stimulus(QtiMarshallerUtil::marshallCollection($promptContent));
        }

        // Partial support for @maxChoices
        // @maxChoices of 0 or more than 1 would then map to choicematrix
        $maxChoices = $interaction->getMaxChoices();
        if ($maxChoices !== 1) {
            if ($maxChoices !== 0 && $maxChoices !== count($options)) {
                // We do not support specifying amount of choices
                LogService::log(
                    "Allowing multiple responses of max " . count($options) . " options, however " .
                    "maxChoices of $maxChoices would be ignored since we can't support exact number"
                );
            }
            $mcq->set_multiple_responses(true);
        }

        // Ignoring @minChoices
        if (!empty($interaction->getMinChoices())) {
            LogService::log('Attribute minChoices is not supported. Thus, ignored');
        }

        // Build validation
        $validationBuilder = new ChoiceInteractionValidationBuilder(
            $this->responseDeclaration,
            array_column($options, 'label', 'value'),
            $maxChoices,
            $this->outcomeDeclarations
        );
        $validation = $validationBuilder->buildValidation($this->responseProcessingTemplate);
        if (!empty($validation)) {
            $mcq->set_validation($validation);
        }
        return $mcq;
    }

    private function buildOptions(SimpleChoiceCollection $simpleChoices)
    {
        /* @var $choice SimpleChoice */
        $options = [];
        foreach ($simpleChoices as $key => $choice) {
            // Store 'SimpleChoice' identifier to key for validation purposes
            $options[] = [
                'label' => trim(QtiMarshallerUtil::marshallCollection($choice->getContent())),
                'value' => $choice->getIdentifier()
            ];
        }
        return $options;
    }
}
