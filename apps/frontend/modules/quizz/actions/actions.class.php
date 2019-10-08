<?php

/**
 * quizz actions.
 *
 * @package    cms
 * @subpackage quizz
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class quizzActions extends myActions {

	/**
	 * Executes index action
	 *
	 * @param sfRequest $request A request object
	 */
	public function preExecute()
    {
        parent::preExecute();
        $user = Q::c('sfGuardUser', 'u')
            ->where('u.username = ?', $this->getRequest()->getParameter('username'))
            ->fetchOne();
        $this->forward404Unless($user && $user->is_active && $user->is_super_admin);
        $this->getUser()->setQuizzHost($user);
        $this->quizzHost = $user;
        $this->setLayout('layout_user');
    }


	public function executeShow(sfWebRequest $request) {
		$this->Quizz = $this->getRoute()->getObject();

		$this->forward404Unless($this->Quizz->user_id == $this->quizzHost->id);
		$this->getResponse()->setTitle($this->Quizz->name);

		$this->setLayout('layout_new');
		$this->setTemplate('show2');
		
	}
	
	public function executeAnswer(sfWebRequest $request) {
		$this->Quizz = Q::f('Quizz', $request->getParameter('quizz_id'));
		$this->forward404Unless($this->Quizz);
		if($this->Quizz->isPassed()){
			$this->getUser()->setFlash('error', "You have already taken this quizz");
		}
		$answers = $request->getParameter('question');

		$count_questions = 0;
		$count_correct_answers = 0;
		try{
			foreach($answers as $quest_id => $answ){
				$Answer = array();
				$Question= Q::f('QuizzQuestion', $quest_id);
				$Answer['question'] = $Question->name;
				if($Question->answer_mode == 'other'){
					$Answer['answer'] = $answ;
				}else{
					$QuestionAnswer = Q::f('QuizzQuestionAnswer', $answ);
					$Answer['answer'] = $QuestionAnswer->name;
					$Answer['answer_id'] = $answ;
					if($Question->hasCorrectAnswer()){
					    $Answer['correct_answer'] = $Question->getCorrectAnswer()->name;
					    $Answer['is_correct'] = $QuestionAnswer->is_correct;
					    if($QuestionAnswer->is_correct){
					        $count_correct_answers++;
                        }
                    }
                    $Answer['question_comment'] = $Question->comment;
				}
				$answers[$quest_id] = $Answer;
				$count_questions++;
			}
		}catch(Exception $e){
			$this->getUser()->setFlash('error', 'An error occurred, please, contact the website administration');
			return $this->redirect($request->getReferer());
		}
		$QuizzTake = new QuizzTake;
		$QuizzTake->quizz_id = $this->Quizz->id;
		$QuizzTake->info = serialize($answers);
		$QuizzTake->correct_answers_count = $count_correct_answers;
		$QuizzTake->questions_count = $count_questions;
		$QuizzTake->percentage = round(($count_correct_answers / $count_questions) * 100);
		$QuizzTake->save();

		$this->getUser()->setFlash('notice', 'Thank you for answering the quiestions!');
        $url = $this->getContext()->getRouting()->generate('quizz_show', array('sf_subject' => $this->Quizz));
		return $this->redirect($url);
	}

	public function executeHome(){

    }

    public function executeUserQuizzes(){
        $this->Quizzes = Q::c('Quizz', 'q')
            ->where('q.is_active = ?', true)
            ->andWhere('q.user_id = ?', $this->quizzHost->id)
            ->execute()
        ;
    }

	/* --- ACTIONS --- */
}
