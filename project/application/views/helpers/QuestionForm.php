<?php

class App_ViewHelper_QuestionForm extends ViewHelper_Form
{

    protected $_labels = array(
	'nickname' => 'Your nickname',
	'email' => 'Your email',
	'title' => 'Question',
	'description' => 'Description',
	);

    protected $_dontRenderFields = array('id', 'created_on');

    protected $_types = array(
	'description' => 'textarea',
	);

}

