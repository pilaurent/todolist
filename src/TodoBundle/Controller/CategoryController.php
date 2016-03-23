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
use TodoBundle\Entity\Category;
use TodoBundle\Form\Type\CategoryType;

class CategoryController extends Controller
{
    /**
     * @Route("/category/create", name ="create_category")
     */
    public function createAction(Request $request){

        $em = $this ->getDoctrine()->getManager();
        $category = new Category();
        $form = $this -> createForm(CategoryType::class, $category);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em->persist($category);
            $em->flush();

            $this -> addFlash(
                'notice',
                'Category added with success'
            );

            return $this ->redirect('/');
        } else {
            $this -> addFlash(
                'warning',
                'Error while adding category'
            );
        }

        return $this -> render('TodoBundle:Category:create.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/category/list", name ="list_category")
     */
    public function listAction(){
        $category = $this->getDoctrine()
            ->getRepository('TodoBundle:Category')
            ->findAll();

      /*  foreach($tasks as$task){
            echo $task->getLabel();
        }*/

       /* VarDumper::dump($tasks);die;*/
        return $this->render('TodoBundle:Category:list.html.twig', array( 'category' => $category));
    }
}