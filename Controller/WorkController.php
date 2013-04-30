<?php

namespace Am\PresenceBundle\Controller;

use Am\PresenceBundle\Entity\Work;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\View\View;

use Symfony\Bundle\FrameworkBundle\Controller\Controller,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\Method,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\Route,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\Template,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Response;

use Am\PresenceBundle\Form\WorkType;

/**
 * @Route("/api")
 * @Cache(expires="tomorrow")
 */

class WorkController extends Controller {

    /**
     * @Route("/works", defaults={"_format"="~"})
     * @Method("GET")
     * @Rest\View()
     */
    public function allAction()
    {
        $works = $this->get('am.work.manager')->findAll();
        return ['works' => $works];
    }

    /**
     * @Route("/works", defaults={"_format"="~"}, name="create_work")
     * @Method("POST")
     */
    public function newAction()
    {
        return $this->processForm(new Work());
    }




    /**
     * @Route("/works/{id}", defaults={"_format"="~"}, name="show_work")
     * @Method("GET")
     * @Rest\View()
     */
    public function getAction($id)
    {
        $work = $this->get('am.work.manager')->find($id);

        if (!$work instanceof Work) {
            throw $this->createNotFoundException('The work does not exist');
        }

        return ['work' => $work];
    }

    /**
     * @Route("/works/{id}", defaults={"_format"="~"}, name="edit_work")
     * @Method("POST")
     * @Rest\View()
     */
    public function editAction(Work $work = null)
    {
        return $this->processForm($work);
    }

    /**
     * @Route("/works/{id}", defaults={"_format"="~"}, name="delete_work")
     * @Method("DELETE")
     * @Rest\View(statusCode=204)
     */
    public function deleteAction(Work $work)
    {
        $this->get('am.work.manager')->delete($work);
    }

    private function processForm(Work $work)
    {
        $statusCode = is_null($work) ? 201 : 204;
        $response = new Response();

        $form = $this->createForm(new WorkType(), $work);
        $form->bind($this->getRequest());

        if ($form->isValid()) {
            $this->get('am.work.manager')->save($work);

            $response->setStatusCode($statusCode);

            return $response;

        }
        $response->setStatusCode(400);

        return $response;

    }
}