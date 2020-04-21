<?php
/**
 * File: TaskValidationService.php
 * PHP Version 7
 *
 * @category None
 * @package  Task
 * @author   author
 * @license  None http://
 * @link     None
 */

namespace Task\Domain\Service;
use Task\Domain\Exception\TaskNameIsAlreadyExistedException;
use Task\Domain\Exception\TaskNameIsEmptyException;
use Task\Domain\Repository\TaskRepositoryInterface;
use Task\Domain\Specification\TaskNameIsNotEmptySpecification;
use Task\Domain\Specification\TaskNameIsUniqueSpecification;

/**
 * Class TaskValidationService
 *
 * Validates Task object to make sure we have valid Task before working
 *
 * @category None
 * @package  Task\Domain\Service
 * @author   author
 * @license  None http://
 * @link     None
 */
class TaskValidationService
{
    /**
     * TaskRepository
     *
     * @var TaskRepositoryInterface
     */
    protected $taskRepository;

    /**
     * TaskValidationService constructor
     *
     * @param TaskRepositoryInterface $taskRepository
     *
     */
    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        // Inject Repository object
        $this->taskRepository = $taskRepository;
    }

    /**
     * Validate a Task object by name
     *
     * @param string $name Name
     * @param mixed  $id   ID
     *
     * @return bool
     * @throws TaskNameIsEmptyException
     * @throws TaskNameIsAlreadyExistedException
     */
    public function validateName(string $name, $id = null): bool
    {
        // Task's name should not be empty
        $emptyNameValidator = new TaskNameIsNotEmptySpecification();
        if (!$emptyNameValidator->isSatisfiedBy($name)) {
            throw new TaskNameIsEmptyException("Task's name should not be empty.");
        }

        // Task's name should be unique
        $uniqueNameValidator = new TaskNameIsUniqueSpecification(
            $this->taskRepository
        );
        if (!$uniqueNameValidator->isSatisfiedBy($name, $id)) {
            throw new TaskNameIsAlreadyExistedException(
                "Task's name $name is already existed"
            );
        }

        return true;
    }

}
