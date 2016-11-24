<?php
/**
 * Created by PhpStorm.
 * User: Marc
 * Date: 22/11/2016
 * Time: 20:37
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Usuario;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bridge\Doctrine\Tests\Fixtures\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class UsuarioController extends Controller
{

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/", name="app_usuario_index")
     */
    public function indexAction()
    {
        $m = $this->getDoctrine()->getManager();

        $user1 = new Usuario();
        $user1
            ->setCorreo('user1@gmail.com')
            ->setPassword('user1')
            ->setUsername('user1')
            ;
        $m->persist('user1');

        $user2 = new Usuario();

        $user2->setCorreo('user2@gmail.com');
        $user2->setPassword('user2');
        $user2->setUsername('user2');

        $m->persist($user2);

        $user3 = new Usuario();

        $user3->setCorreo('user3@gmail.com');
        $user3->setPassword('user3');
        $user3->setUsername('user3');

        $m->persist($user3);

        return new Response($user1);

    }



}