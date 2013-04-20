<?php

namespace Am\PresenceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;

use JMS\SecurityExtraBundle\Annotation\Secure;

/* should be removed ... */
use Am\PresenceBundle\Entity\Work;
use Am\PresenceBundle\Form\WorkType;

/**
 * @Route("/admin")
 */

class AdminController extends Controller {

    /**
     * @Route("/", name="admin_page")
     * @Template()
     */
    public function indexAction() {
        return [];
    }

    /**
     * @Route("/works/{id}", name="admin_works_page", defaults={"id" = null})
     * @Template()
     */
    public function worksAction(Work $work = null) {
        if(is_null($work)) {
            $work = new Work();
        }
        $form = $this->createForm(new WorkType(), $work);
        $works = $this->get('am.work.manager')->findAll();
        return ['form' => $form->createView(), 'works' => $works];
    }

    /**
     * @Route("/works/delete/{id}", name="admin_delete_work")
     *
     */
    public function deleteAction(Work $work) {
        $this->get('am.work.manager')->delete($work);
        return $this->redirect($this->generateUrl('admin_page'));
    }

}

?>
