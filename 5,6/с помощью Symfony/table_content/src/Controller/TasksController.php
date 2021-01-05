<?php

namespace App\Controller;

use App\Repository\TaskRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Knp\Component\Pager\PaginatorInterface;

/**
 * Class TasksController
 * @package App\Controller
 */
class TasksController extends AbstractController
{

    /**
     * @var TaskRepository
     */
    private $taskRepository;
    /**
     * @var UserRepository
     */
    private $userRepository;
    /**
     * @var PaginatorInterface
     */
    private $paginator;

    public function __construct(
        TaskRepository $taskRepository,
        UserRepository $userRepository,
        PaginatorInterface $paginator
    )
    {
        $this->taskRepository = $taskRepository;
        $this->userRepository = $userRepository;
        $this->paginator = $paginator;
    }

    /**
     * @Route("/one-table", name="oneTable")
     */
    public function oneTable(Request $request)
    {
        $tasks = $this->taskRepository->findAll();
        $pagination = $this->paginator->paginate($tasks, $request->query->getInt('page', 1), 5);

        return $this->render('tasks/one-table.html.twig', [ 'pagination' => $pagination ]);
    }

    /**
     * @Route("/two-table", name="twoTable")
     */
    public function index(Request $request)
    {
        $tasks = $this->taskRepository->findAllWithJoin();
        $pagination = $this->paginator->paginate($tasks, $request->query->getInt('page', 1), 5);

        return $this->render('tasks/two-table.html.twig', [ 'pagination' => $pagination ]);
    }

}
