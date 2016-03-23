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
use TodoBundle\Entity\Tasks;
use TodoBundle\Form\Type\TaskType;

class TaskController extends Controller
{
    /**
     * @Route("/task/create", name ="create_task")
     */
    public function createAction(Request $request){

        $em = $this ->getDoctrine()->getManager();
        $task = new Tasks($this->getUser());
        $form = $this -> createForm(TaskType::class, $task);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em->persist($task);
            $em->flush();

            $this -> addFlash(
                'notice',
                'Task added with success'
            );

            return $this ->redirect('/');
        } else {
            $this -> addFlash(
                'warning',
                'Error while adding task '
            );
        }

        return $this -> render('TodoBundle:Task:create.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/task/list", name="list_task")
     */
    public function listAction(){
        $tasks = $this->getDoctrine()
            ->getRepository('TodoBundle:Tasks')
            ->findByUser(
                $this->getUser()
            );
           /* ->findAll();
            ->findByLibelle('task 1');*/

      /*  foreach($tasks as$task){
            echo $task->getLabel();
        }*/

       /* VarDumper::dump($tasks);die;*/
        return $this->render('TodoBundle:Task:list.html.twig', array( 'tasks' => $tasks));
    }
}