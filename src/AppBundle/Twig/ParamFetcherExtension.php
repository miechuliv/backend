<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ParamFetcher
 *
 * @author miechuliv
 */
namespace AppBundle\Twig;

use Symfony\Component\DependencyInjection\ContainerInterface as Container;

class ParamFetcherExtension extends \Twig_Extension
{
    private $container;

    public function __construct(Container $container) {
        $this->container = $container;
    }
    
    public function getFunctions()
    {
        return array(
         
            'getParam' => new \Twig_Function_Method($this, 'getParam')
        );
    }

    public function getParam($param)
    {
        

        return $this->container->getParameter($param);
    }

    public function getName()
    {
        return 'app_extension';
    }
}