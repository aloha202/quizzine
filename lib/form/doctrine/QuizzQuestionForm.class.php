<?php

/**
 * QuizzQuestion form.
  sfDoctrineFormGenerator *
 * @package    cms
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class QuizzQuestionForm extends BaseQuizzQuestionForm {

	public function configure() {

	    unset($this['answer_mode']);
        $this->widgetSchema['quizz_id']->setOption('query', Q::c('Quizz', 'q')
            ->where('q.user_id = ?', $this->getUser()->getGuardUser()->getId()))
            ->setOption('add_empty', false);
		if (!$this->isNew()) {
			$this->embedForm('answers', new EmbeddedCollectionForm(null, array(
						'parent' => $this->getObject(),
						'objects' => $this->getObject()->getAnswers(),
						'model_class' => 'QuizzQuestionAnswer',
						'validator_schema' => new EmbeddedCollectionValidatorSchema(array(
						)),
						'new_label' => 'New answer'
					)));
            $this->widgetSchema->moveField('comment', sfWidgetFormSchema::AFTER, 'answers');
		}
        $this->noEditor(array('name'));
	}

	public function saveEmbeddedForms($con = null, $forms = null) {

		if (null === $forms) {
			$answers = $this->getValue('answers');
			$forms = $this->embeddedForms;
			foreach ($this->embeddedForms['answers'] as $name => $form) {
				if (!isset($answers[$name]) || !trim($answers[$name]['name'])) {
					unset($forms['answers'][$name]);
				}
			}
		}
		return parent::saveEmbeddedForms($con, $forms);
	}

}
