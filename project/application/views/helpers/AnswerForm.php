<?php

class App_ViewHelper_AnswerForm extends ViewHelper_Form
{

    protected $_labels = array(
	'nickname' => 'Your nickname',
	'email' => 'Your email',
	'answer' => 'Answer',
	);

    protected $_dontRenderFields = array('id', 'question_id', 'created_on', 'votes');

    protected $_types = array(
        'answer' => 'textarea',
	);

}

