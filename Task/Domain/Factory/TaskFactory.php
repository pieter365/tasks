<?php

namespace Task\Domain\Factory;

use Task\Domain\Exception\TaskNameIsAlreadyExistedException;
use Task\Domain\Exception\TaskNameIsEmptyException;
use Task\Domain\Repository\TaskRepositoryInterface;
use Task\Domain\Service\TaskValidationService;
use Task\Domain\Specification\TaskNameIsNotEmptySpecification;
use Task\Domain\Specification\TaskNameIsUniqueSpecification;
use Task\Domain\Task;

/**
 * Class TaskFactory
 *
 * A factory to create Task object
 *
 * @category None
 * @package  Task\Domain\Factory
 * @author   author
 * @license  None http://
 * @link     None
 */
class TaskFactory
{
    /**
     * TaskRepository
     *
     * @var TaskRepositoryInterface
     */
    protected $taskRepository;

    /**
     * TaskValidationService
     *
     * @var TaskValidationService
     */
    protected $taskValidationService;

    /**
     * TaskFactory constructor
     *
     * @param TaskRepositoryInterface $taskRepository
     *
     */
    public function __construct(
        TaskRepositoryInterface $taskRepository
    ) {
        // Inject Repository
        $this->taskRepository = $taskRepository;

        // Init Validation service
        $this->taskValidationService = new TaskValidationService($this->taskRepository);
    }


    /**
     * Create Task object from name
     *
     * @param string $name Name
     *
     * @return Task
     * @throws TaskNameIsAlreadyExistedException
     * @throws TaskNameIsEmptyException
     */
    public function createFromName(string $name) : Task
    {
        // First we create a blank Task object
        $task = new Task();

        // Then we need to make sure the Task's name is not empty and not used
        // by another Task
        try {
            $this->taskValidationService->validateName($name);
        } catch (TaskNameIsEmptyException | TaskNameIsAlreadyExistedException $e) {
            throw $e;
        }

        // When we are sure the name is ok, just set the name
        $task->setName($name);

        // Return Task object
        return $task;
    }


}
