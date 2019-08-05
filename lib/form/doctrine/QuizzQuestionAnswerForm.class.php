<?php

/**
 * QuizzQuestionAnswer form.
  sfDoctrineFormGenerator *
 * @package    cms
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class QuizzQuestionAnswerForm extends BaseQuizzQuestionAnswerForm {

	public function configure() {
		$this->widgetSchema['quizz_question_id'] = new sfWidgetFormInputHidden;
		if (!$this->isNew()) {
			$this->widgetSchema['delete'] = new sfWidgetFormInputDelete(array(
						'url' => 'quizz_question/deleteQuestionAnswer',
						'model_id' => $this->getObject()->getId(),
						'confirm' => 'Are you sure?'
					));
			$this->widgetSchema->setLabel('delete', 'Delete');
		}
		$this->widgetSchema->setLabel('name', 'Answer');
		$this->widgetSchema->setFormFormatterName('table');
		$this->validatorSchema['name']->setOption('required', false);
	}

}
