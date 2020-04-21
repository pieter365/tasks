<?php

namespace Task\Application\Task;

use Task\Domain\Exception\TaskNotFoundException;
use Task\Domain\Repository\TaskRepositoryInterface;
use Task\Domain\Task;

/**
 * Class Query
 *
 * Sends query into repository to get Task objects
 *
 * @category None
 * @package  Task\Application\Task
 * @author   author
 * @license  None http://
 * @link     None
 */
class Query
{
    /**
     * Task Repository
     *
     * @var TaskRepositoryInterface
     */
    protected $taskRepository;

    /**
     * Query constructor
     *
     * @param TaskRepositoryInterface $taskRepository Task Repository
     */
    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        // Inject Task repository
        $this->taskRepository = $taskRepository;
    }

    /**
     * Get tasks with remaining status
     *
     * @return array
     */
    public function getAllRemainingTasks() : array
    {
        return $this->taskRepository->findAllByStatus(Task::STATUS_REMAINING);
    }

    /**
     * Get tasks with completed status
     *
     * @return array
     */
    public function getAllCompletedTasks() : array
    {
        return $this->taskRepository->findAllByStatus(Task::STATUS_COMPLETED);
    }

    /**
     * Get task object by Id
     *
     * @param string $taskId Task ID
     *
     * @return Task
     * @throws TaskNotFoundException
     */
    public function getTaskById($taskId) : Task
    {
        try {
            $task = $this->taskRepository->find($taskId);
        } catch (TaskNotFoundException $e) {
            throw $e;
        }

        return $task;
    }
}
