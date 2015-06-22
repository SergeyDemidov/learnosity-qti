<?php

namespace Learnosity\Tests\Unit\Mappers\QtiV2\Import\MergedInteractions;

use Learnosity\Mappers\QtiV2\Import\MergedInteractions\MergedInlineChoiceInteraction;
use Learnosity\Mappers\QtiV2\Import\ResponseProcessingTemplate;
use Learnosity\Tests\Unit\Mappers\QtiV2\Import\Fixtures\InlineChoiceInteractionBuilder;
use Learnosity\Tests\Unit\Mappers\QtiV2\Import\Fixtures\ResponseDeclarationBuilder;
use Learnosity\Tests\Unit\Mappers\QtiV2\Import\Interactions\AbstractInteractionTest;
use qtism\data\content\BlockCollection;
use qtism\data\content\InlineCollection;
use qtism\data\content\ItemBody;
use qtism\data\content\TextRun;
use qtism\data\content\xhtml\text\P;
use qtism\data\QtiComponentCollection;

class MergedInlineChoiceInteractionTest extends AbstractInteractionTest
{
    public function testSimpleCaseWithNoValidation()
    {
        $itemBody = $this->buildItemBodyTestCase();
        $mapper = new MergedInlineChoiceInteraction('dummyQuestionReference', $itemBody, null, null);
        $question = $mapper->getQuestionType();

        // Should map question correctly with no `validation` object
        $this->assertNotNull($question);
        $this->assertEquals('<p>The Matrix movie is filmed at {{response}}, and starring {{response}}</p>', $question->get_template());
        $this->assertEquals('clozedropdown', $question->get_type());
        $this->assertNull($question->get_validation());
    }

    public function testSimpleCaseWithMatchCorrectValidation()
    {
        $itemBody = $this->buildItemBodyTestCase();
        $responseDeclarations = new QtiComponentCollection();
        $responseDeclarations->attach(ResponseDeclarationBuilder::buildWithCorrectResponse('testIdentifierOne', ['sydney']));
        $responseDeclarations->attach(ResponseDeclarationBuilder::buildWithCorrectResponse('testIdentifierTwo', ['keanu', 'gloria']));
        $mapper = new MergedInlineChoiceInteraction('dummyQuestionReference', $itemBody, $responseDeclarations, ResponseProcessingTemplate::matchCorrect());
        $question = $mapper->getQuestionType();

        // Should map question correctly with `validation` object of `exactMatch` scoring type
        $this->assertNotNull($question);
        $this->assertEquals('<p>The Matrix movie is filmed at {{response}}, and starring {{response}}</p>', $question->get_template());
        $this->assertEquals('clozedropdown', $question->get_type());

        // Should set both `valid_response` and `alt_responses` for multiple correct values
        $validation = $question->get_validation();
        $this->assertNotNull($validation);
        $this->assertEquals('exactMatch', $validation->get_scoring_type());

        $validResponse = $validation->get_valid_response();
        $this->assertNotNull($validResponse);
        $this->assertEquals(1, $validResponse->get_score());
        $this->assertEquals(["Sydney", "Keanu Reeves"], $validResponse->get_value());

        $altResponses = $validation->get_alt_responses();
        $this->assertNotNull($altResponses);
        $this->assertCount(1, $altResponses);
        $this->assertEquals(1, $altResponses[0]->get_score());
        $this->assertEquals(["Sydney", "Gloria Foster"], $altResponses[0]->get_value());
    }

    private function buildItemBodyTestCase()
    {
        $interactionOne = InlineChoiceInteractionBuilder::buildSimple('testIdentifierOne', [
            'sydney' => 'Sydney',
            'melbourne' => 'Melbourne',
            'canberra' => 'Canberra',
        ]);
        $interactionTwo = InlineChoiceInteractionBuilder::buildSimple('testIdentifierTwo', [
            'hugh' => 'Hugh Jackman',
            'keanu' => 'Keanu Reeves',
            'gloria' => 'Gloria Foster',
        ]);
        $itemBody = new ItemBody();
        $itemBodyCollection = new BlockCollection();

        // Build `<p>The Matrix .... <inlineChoiceInteraction...></inlineChoiceInteraction>.</p>`
        $p = new P();
        $pCollection = new InlineCollection();
        $pCollection->attach(new TextRun('The Matrix movie is filmed at '));
        $pCollection->attach($interactionOne);
        $pCollection->attach(new TextRun(', and starring '));
        $pCollection->attach($interactionTwo);
        $p->setContent($pCollection);
        // Build the <itemBody>
        $itemBodyCollection->attach($p);
        $itemBody->setContent($itemBodyCollection);

        return $itemBody;
    }
} 
