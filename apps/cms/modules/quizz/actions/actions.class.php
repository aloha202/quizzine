<?php

require_once dirname(__FILE__).'/../lib/quizzGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/quizzGeneratorHelper.class.php';

/**
 * quizz actions.
 *
 * @package    cms
 * @subpackage quizz
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class quizzActions extends autoQuizzActions
{
	public function executeQuestions(sfWebRequest $request) {
		$quizz = $this->getRoute()->getObject();
		$filters = $this->getUser()->getAttribute('quizz_question.filters', array(), 'admin_module');
		$filters['quizz_id'] = $quizz->getId();
		$this->getUser()->setAttribute('quizz_question.filters', $filters, 'admin_module');
		return $this->redirect('quizz_question/index');
	}
	
	public function executeResults(sfWebRequest $request) {
		$quizz = $this->getRoute()->getObject();
		$filters = $this->getUser()->getAttribute('quizz_take.filters', array(), 'admin_module');
		$filters['quizz_id'] = $quizz->getId();
		$this->getUser()->setAttribute('quizz_take.filters', $filters, 'admin_module');
		return $this->redirect('quizz_take/index');
	}

	public function executeGeturl(sfWebRequest $request){
        $quizz = $this->getRoute()->getObject();
        $url = P::generateApplicationUrl('frontend', 'quizz_show', array(
           'username' => $quizz->getUsername(),
            'slug' => $quizz->getSlug(),
            'id' => $quizz->getId()
        ));
        $this->url = 'http://' . $_SERVER['HTTP_HOST'] . $url;

    }

    protected function processForm(sfWebRequest $request, sfForm $form)
    {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid())
        {
            $notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';

            try {
                $quizz = $form->save();
            } catch (Doctrine_Validator_Exception $e) {

                $errorStack = $form->getObject()->getErrorStack();

                $message = get_class($form->getObject()) . ' has ' . count($errorStack) . " field" . (count($errorStack) > 1 ?  's' : null) . " with validation errors: ";
                foreach ($errorStack as $field => $errors) {
                    $message .= "$field (" . implode(", ", $errors) . "), ";
                }
                $message = trim($message, ', ');

                $this->getUser()->setFlash('error', $message);
                return sfView::SUCCESS;
            }

            $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $quizz)));

            foreach($request->getPostParameters() as $key => $value){
                if(preg_match('/^__/', $key)){
                    $method = 'process' . sfInflector::camelize(preg_replace('/^__/', '', $key));
                    if(method_exists($this, $method)){
                        $this->{$method}($quizz);
                    }
                }
            }

            if ($request->hasParameter('_save_and_add'))
            {
                $this->getUser()->setFlash('notice', $notice.' You can add another one below.');

                $this->redirect('quizz/questions?id=' . $quizz->getId());
            }
            else
            {
                $this->getUser()->setFlash('notice', $notice);
                if ($request->hasParameter('_save_and_list')){
                    $this->redirect('@quizz');
                }else{
                    $this->redirect(array('sf_route' => 'quizz_edit', 'sf_subject' => $quizz));
                }
            }
        }
        else
        {
            $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
        }
    }
}
