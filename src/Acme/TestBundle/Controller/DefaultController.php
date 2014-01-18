<?php

namespace Acme\TestBundle\Controller;

use Acme\TestBundle\Domain\Data\Member;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $form = $this->getInputForm();

        return array('form'=>$form->createView());
    }

    /**
     * @Route("/")
     * @Method("POST")
     * @Template("AcmeTestBundle:Default:index.html.twig")
     */
    public function indexPostAction(Request $request)
    {
        $form = $this->getInputForm();

        $form->handleRequest($request);
        if ($form->isValid()) {
            return $this->redirect($this->generateUrl('acme_test_default_complete'));
        }

        return array('form'=>$form->createView());
    }

    /**
     * @Route("/complete")
     * @Method("GET")
     * @Template()
     */
    public function completeAction()
    {
        return array();
    }

    private function getInputForm()
    {
        return $this->createFormBuilder(new Member())
            ->add('name')
            ->add('submit', 'submit')
            ->getForm();
    }
}
