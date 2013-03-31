<?php

namespace Am\PresenceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;

/**
 *
 * @Route("/")
 * @Cache(expires="tomorrow")
 */

class FrontController extends Controller {
    
    /**
     * @Route("/", name="home_page")
     * @Template()
     */
    public function indexAction() { return [];}

    /**
     * @Route("/contact", name="contact_page")
     * @Template()
     */
    public function contactAction() { return [];}


}

?>
