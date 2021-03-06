<?php

class sfWidgetFormInputDelete extends sfWidgetForm {

    protected function configure($options = array(), $attributes = array()) {

        $this->addRequiredOption('url');

        $this->addRequiredOption('model_id');

        $this->addOption('confirm', null);

        $this->addOption('icon', null);

        parent::configure($options, $attributes);
    }

    public function render($name, $value = null, $attributes = array(), $errors = array()) {

        $ctx = sfContext::getInstance();

        $request = $ctx->getRequest();

        $controller = $ctx->getController();

        if (is_null($this->getOption('confirm'))) {

            $this->setOption('confirm', __('Are you sure you want to delete this item?'));
        }

        if (is_null($this->getOption('icon'))) {

            $this->setOption('icon', sprintf('http://%s%s/sfDoctrinePlugin/images/delete.png', $request->getHost(), $request->getRelativeUrlRoot()));
        } else {
            $this->setOption('icon', sprintf('http://%s%s/images/%s', $request->getHost(), $request->getRelativeUrlRoot(), $this->getOption('icon')));
        }

        $html = ''; //parent::render($name, $value, $attributes, $errors);

        $img = $this->renderTag('img', array('src' => $this->getOption('icon')));

        // this link was modifier by Pierre
        $url = $this->getOption('url') ? url_for($this->getOption('url') . '/?id=' . $this->getOption('model_id')) : '#';
        $link = "<a href='{$url}' class='sf_widget_form_input_delete'>{$img}</a>";
        
        $html .= $link;

        return $html;
    }

}
