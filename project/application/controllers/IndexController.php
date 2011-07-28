<?php

class IndexController extends Controller
{

    public function indexAction() { }

    public function questionAction() { }

    public function newanswerAction()
    {
	$question = $this->getHelper('question')->get();
        $answer   = $question->getNewAnswer();
        if (isset($_POST['save'])) {
            unset($_POST['save']);
            $answer->updateData($_POST); // obviously this is not a good idea, but with little time ...
            $answer->save();
            $this->redirect("/question/id/{$question->id}");
        }
        $this->view->answer = $answer;
    }

    public function newquestionAction()
    {
        $questionGateway = new App_Model_DbTable_Question();
	$question = $questionGateway->getNew();
        if (isset($_POST['save'])) {
            unset($_POST['save']);
            $question->updateData($_POST); // obviously this is not a good idea, but with little time ...
            $question->save();
            $this->redirect("/question/id/{$question->id}");
        }
        $this->view->question = $question;
    }

    public function dumpAction()
    {
        echo '<pre>';
        print_r($_SESSION);
        echo '</pre>';
        die;
    }

}

