<?php

namespace LearnosityQti\Entities\QuestionTypes;

use LearnosityQti\Entities\BaseQuestionTypeAttribute;

/**
* This class is auto-generated based on Schemas API and you should not modify its content
* Metadata: {"responses":"v2.108.0","feedback":"v2.71.0","features":"v2.107.0"}
*/
class chemistry_validation_valid_response_value_item extends BaseQuestionTypeAttribute {
    protected $method;
    
    public function __construct(
            )
    {
            }

    /**
    * Get Method \
    * The method used to compare user input against the valid response value. \
    * @return string $method ie. equivLiteral, equivValue, isUnit, stringMatch  \
    */
    public function get_method() {
        return $this->method;
    }

    /**
    * Set Method \
    * The method used to compare user input against the valid response value. \
    * @param string $method ie. equivLiteral, equivValue, isUnit, stringMatch  \
    */
    public function set_method ($method) {
        $this->method = $method;
    }

    
}

