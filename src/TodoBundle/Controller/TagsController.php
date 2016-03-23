<?php
/**
 * Created by PhpStorm.
 * User: pierre
 * Date: 16/03/2016
 * Time: 11:11
 */

namespace TodoBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\VarDumper\VarDumper;
use TodoBundle\Entity\Tags;
use TodoBundle\Form\Type\TagsType;

class TagsController extends Controller
{
    /**
     * @Route("/tags/create", name="create_tags")
     */
    public function createAction(Request $request){

        $em = $this ->getDoctrine()->getManager();
        $tags = new Tags();
        $form = $this -> createForm(TagsType::class, $tags);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em->persist($tags);
            $em->flush();

            $this -> addFlash(
                'notice',
                'Tag added with success'
            );

            return $this ->redirect('/');
        } else {
            $this -> addFlash(
                'warning',
                'Error while adding tags'
            );
        }

        return $this -> render('TodoBundle:Tags:create.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/tags/list", name="list_tags")
     */
    public function listAction(){
        $tags = $this->getDoctrine()
            ->getRepository('TodoBundle:Tags')
            ->findAll();

      /*  foreach($tasks as$task){
            echo $task->getLabel();
        }*/

       /* VarDumper::dump($tasks);die;*/
        return $this->render('TodoBundle:Tags:list.html.twig', array( 'tags' => $tags));
    }
}