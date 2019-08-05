<?php

/**
 * default actions.
 *
 * @package    cms
 * @subpackage default
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class defaultActions extends myActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {
        header('Location: http://promo.quizzine.org', true, 301);
        exit;
        //$this->page = $this->pageBySpecialMark();
        $this->getUser()->forgetQuizzHost();
        // $this->setLayout('layout_index');
        $this->processPage();
    }

    public function executeTeachers(sfWebRequest $request){
        $q = Doctrine::getTable('sfGuardUser')
            ->createQuery('u')
            ->where('u.is_super_admin = ?', true)
            ->andWhere('u.is_active = ?', true)
            ->andWhere('u.username <> ?', 'admin')

        ;
        $this->pager = new sfDoctrinePager('sfGuardUser', 10);
        $this->pager->setQuery($q);
        $this->pager->setPage($request->getParameter('page', 1));
        $this->pager->init();
    }

    public function executeJoin(sfWebRequest $request){
        $this->processPage('join');

        $this->form = new ApplicationRequestForm();
        $thankyoupage = Q::c('Page', 'p')->where('p.special_mark = ?', 'thank_you')->fetchOne();
        $back_url = $this->getController()->genUrl('@page_show?slug=' . $thankyoupage->slug);
        $this->processForm2($this->form, $request, 'Thank you for your request!', $back_url);
    }

    public function executeVisit(sfWebRequest $request) {
        $url = $request->getParameter('url');
        SiteVisit::processUrl($url);

        $src = sfConfig::get('sf_web_dir') . '/images/visit.gif';
        header('Content-Type: image/jpg');
        header('Content-length: ' . filesize($src));
        readfile($src);
        die;
    }
    
    public function executeError404()
    {
        Redirect301::process();  
        Notifier::notify(404, 'Ошибка 404');
        $this->processPage('error404');
        $this->displayPage();
    }
    
    public function executeIpBanned()
    {
        $this->processPage('ip_banned');
    }

}
