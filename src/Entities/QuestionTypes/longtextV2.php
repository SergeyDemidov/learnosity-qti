<?php

namespace LearnosityQti\Entities\QuestionTypes;

use LearnosityQti\Entities\BaseQuestionType;

/**
* This class is auto-generated based on Schemas API and you should not modify its content
* Metadata: {"responses":"v2.108.0","feedback":"v2.71.0","features":"v2.107.0"}
*/
class longtextV2 extends BaseQuestionType {
    protected $is_math;
    protected $metadata;
    protected $stimulus;
    protected $stimulus_review;
    protected $instructor_stimulus;
    protected $type;
    protected $ui_style;
    protected $validation;
    protected $description;
    protected $formatting_options;
    protected $max_length;
    protected $character_map;
    protected $spellcheck;
    protected $submit_over_limit;
    protected $placeholder;
    protected $show_word_limit;
    protected $show_word_count;
    
    public function __construct(
                    $type
                        )
    {
                $this->type = $type;
            }

    /**
    * Get Contains math \
    * Set to <strong>true</strong> to have LaTeX or MathML contents to be rendered with mathjax. \
    * @return boolean $is_math \
    */
    public function get_is_math() {
        return $this->is_math;
    }

    /**
    * Set Contains math \
    * Set to <strong>true</strong> to have LaTeX or MathML contents to be rendered with mathjax. \
    * @param boolean $is_math \
    */
    public function set_is_math ($is_math) {
        $this->is_math = $is_math;
    }

    /**
    * Get metadata \
    *  \
    * @return longtextV2_metadata $metadata \
    */
    public function get_metadata() {
        return $this->metadata;
    }

    /**
    * Set metadata \
    *  \
    * @param longtextV2_metadata $metadata \
    */
    public function set_metadata (longtextV2_metadata $metadata) {
        $this->metadata = $metadata;
    }

    /**
    * Get Stimulus \
    * The question stimulus. Can include text, tables, images. \
    * @return string $stimulus \
    */
    public function get_stimulus() {
        return $this->stimulus;
    }

    /**
    * Set Stimulus \
    * The question stimulus. Can include text, tables, images. \
    * @param string $stimulus \
    */
    public function set_stimulus ($stimulus) {
        $this->stimulus = $stimulus;
    }

    /**
    * Get Stimulus (review only) \
    * <a data-toggle="modal" href="#supportedTags">HTML</a>/Text content displayed <strong>only</strong> in review state rende
	red <strong>above</strong> the response area. Supports embedded <a href="http://docs.learnosity.com/questionsapi/feature
	types.php" target="_blank">Feature &lt;span&gt; tags</a>. Will override stimulus in review state. \
    * @return string $stimulus_review \
    */
    public function get_stimulus_review() {
        return $this->stimulus_review;
    }

    /**
    * Set Stimulus (review only) \
    * <a data-toggle="modal" href="#supportedTags">HTML</a>/Text content displayed <strong>only</strong> in review state rende
	red <strong>above</strong> the response area. Supports embedded <a href="http://docs.learnosity.com/questionsapi/feature
	types.php" target="_blank">Feature &lt;span&gt; tags</a>. Will override stimulus in review state. \
    * @param string $stimulus_review \
    */
    public function set_stimulus_review ($stimulus_review) {
        $this->stimulus_review = $stimulus_review;
    }

    /**
    * Get Instructor stimulus \
    * <a data-toggle="modal" href="#supportedTags">HTML</a>/Text content displayed when <code>showInstructorStimulus</code> is
	 set to <code>true</code> on the activity. Supports embedded <a href="http://docs.learnosity.com/questionsapi/featuretyp
	es.php" target="_blank">Feature &lt;span&gt; tags</a>. \
    * @return string $instructor_stimulus \
    */
    public function get_instructor_stimulus() {
        return $this->instructor_stimulus;
    }

    /**
    * Set Instructor stimulus \
    * <a data-toggle="modal" href="#supportedTags">HTML</a>/Text content displayed when <code>showInstructorStimulus</code> is
	 set to <code>true</code> on the activity. Supports embedded <a href="http://docs.learnosity.com/questionsapi/featuretyp
	es.php" target="_blank">Feature &lt;span&gt; tags</a>. \
    * @param string $instructor_stimulus \
    */
    public function set_instructor_stimulus ($instructor_stimulus) {
        $this->instructor_stimulus = $instructor_stimulus;
    }

    /**
    * Get Question type \
    *  \
    * @return string $type \
    */
    public function get_type() {
        return $this->type;
    }

    /**
    * Set Question type \
    *  \
    * @param string $type \
    */
    public function set_type ($type) {
        $this->type = $type;
    }

    /**
    * Get ui_style \
    *  \
    * @return longtextV2_ui_style $ui_style \
    */
    public function get_ui_style() {
        return $this->ui_style;
    }

    /**
    * Set ui_style \
    *  \
    * @param longtextV2_ui_style $ui_style \
    */
    public function set_ui_style (longtextV2_ui_style $ui_style) {
        $this->ui_style = $ui_style;
    }

    /**
    * Get Validation \
    * In this section, configure the correct answer(s) for the question. \
    * @return longtextV2_validation $validation \
    */
    public function get_validation() {
        return $this->validation;
    }

    /**
    * Set Validation \
    * In this section, configure the correct answer(s) for the question. \
    * @param longtextV2_validation $validation \
    */
    public function set_validation (longtextV2_validation $validation) {
        $this->validation = $validation;
    }

    /**
    * Get Description (deprecated) \
    * <span class="label label-danger">Deprecated</span> See <em>stimulus_review</em>. <br />
Description of the question and
	 its context to be displayed. 
It <a data-toggle="modal" href="#supportedTags">supports HTML entities</a>. \
    * @return string $description \
    */
    public function get_description() {
        return $this->description;
    }

    /**
    * Set Description (deprecated) \
    * <span class="label label-danger">Deprecated</span> See <em>stimulus_review</em>. <br />
Description of the question and
	 its context to be displayed. 
It <a data-toggle="modal" href="#supportedTags">supports HTML entities</a>. \
    * @param string $description \
    */
    public function set_description ($description) {
        $this->description = $description;
    }

    /**
    * Get Text formatting options \
    * An array containing strings of text formatting options to make available. \
    * @return array $formatting_options \
    */
    public function get_formatting_options() {
        return $this->formatting_options;
    }

    /**
    * Set Text formatting options \
    * An array containing strings of text formatting options to make available. \
    * @param array $formatting_options \
    */
    public function set_formatting_options (array $formatting_options) {
        $this->formatting_options = $formatting_options;
    }

    /**
    * Get Word limit \
    * Maximum number of words that can be entered in the field. Maximum: 100,000 chars ~ 10,000 words \
    * @return number $max_length \
    */
    public function get_max_length() {
        return $this->max_length;
    }

    /**
    * Set Word limit \
    * Maximum number of words that can be entered in the field. Maximum: 100,000 chars ~ 10,000 words \
    * @param number $max_length \
    */
    public function set_max_length ($max_length) {
        $this->max_length = $max_length;
    }

    /**
    * Get Special characters \
    * The character map will display the <a data-toggle="modal" href="#charMapDefault">default set of special characters</a>.<
	br/>
If an Array, the character map button will show and display only the array of characters.<br><span class="label la
	bel-important">IMPORTANT</span>The HTML document will require a charset of utf-8: <code>&lt;meta charset="utf-8"&gt;</co
	de> \
    * @return charmapArray $character_map \
    */
    public function get_character_map() {
        return $this->character_map;
    }

    /**
    * Set Special characters \
    * The character map will display the <a data-toggle="modal" href="#charMapDefault">default set of special characters</a>.<
	br/>
If an Array, the character map button will show and display only the array of characters.<br><span class="label la
	bel-important">IMPORTANT</span>The HTML document will require a charset of utf-8: <code>&lt;meta charset="utf-8"&gt;</co
	de> \
    * @param charmapArray $character_map \
    */
    public function set_character_map ($character_map) {
        $this->character_map = $character_map;
    }

    /**
    * Get Browser spellcheck \
    * Control the input/textarea attribute spellcheck. See <a href="http://dev.w3.org/html5/spec/single-page.html?utm_source=d
	lvr.it&utm_medium=feed#attr-spellcheck">"W3C article"</a>. Note this is a browser feature and may not always be availabl
	e. \
    * @return boolean $spellcheck \
    */
    public function get_spellcheck() {
        return $this->spellcheck;
    }

    /**
    * Set Browser spellcheck \
    * Control the input/textarea attribute spellcheck. See <a href="http://dev.w3.org/html5/spec/single-page.html?utm_source=d
	lvr.it&utm_medium=feed#attr-spellcheck">"W3C article"</a>. Note this is a browser feature and may not always be availabl
	e. \
    * @param boolean $spellcheck \
    */
    public function set_spellcheck ($spellcheck) {
        $this->spellcheck = $spellcheck;
    }

    /**
    * Get Submit over limit \
    * Determines if the user is able to save/submit when the word limit has been exceeded. \
    * @return boolean $submit_over_limit \
    */
    public function get_submit_over_limit() {
        return $this->submit_over_limit;
    }

    /**
    * Set Submit over limit \
    * Determines if the user is able to save/submit when the word limit has been exceeded. \
    * @param boolean $submit_over_limit \
    */
    public function set_submit_over_limit ($submit_over_limit) {
        $this->submit_over_limit = $submit_over_limit;
    }

    /**
    * Get Placeholder \
    * Default text that can be added into the response entry area. \
    * @return string $placeholder \
    */
    public function get_placeholder() {
        return $this->placeholder;
    }

    /**
    * Set Placeholder \
    * Default text that can be added into the response entry area. \
    * @param string $placeholder \
    */
    public function set_placeholder ($placeholder) {
        $this->placeholder = $placeholder;
    }

    /**
    * Get Word limit \
    * Determines how the word limit UI will display. Options are the following strings: <br /><strong>"always"</strong>: Word 
	limit is always shown and updated as the user types <br /> <strong>"on-limit"</strong>: Word limit is only displayed whe
	n the word limit is exceeded <br /> <strong>"off"</strong>: No word limit it shown. \
    * @return string $show_word_limit ie. always, on-limit, off  \
    */
    public function get_show_word_limit() {
        return $this->show_word_limit;
    }

    /**
    * Set Word limit \
    * Determines how the word limit UI will display. Options are the following strings: <br /><strong>"always"</strong>: Word 
	limit is always shown and updated as the user types <br /> <strong>"on-limit"</strong>: Word limit is only displayed whe
	n the word limit is exceeded <br /> <strong>"off"</strong>: No word limit it shown. \
    * @param string $show_word_limit ie. always, on-limit, off  \
    */
    public function set_show_word_limit ($show_word_limit) {
        $this->show_word_limit = $show_word_limit;
    }

    /**
    * Get Show word count \
    *  \
    * @return boolean $show_word_count \
    */
    public function get_show_word_count() {
        return $this->show_word_count;
    }

    /**
    * Set Show word count \
    *  \
    * @param boolean $show_word_count \
    */
    public function set_show_word_count ($show_word_count) {
        $this->show_word_count = $show_word_count;
    }

    
    public function get_widget_type() {
    return 'response';
    }
}

