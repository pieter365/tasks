<?php
/**
 * File: TaskNameIsAlreadyExistedException.php
 * PHP Version 7
 *
 * @category None
 * @package  Task
 * @author   author
 * @license  None http://
 * @link     None
 */

namespace Todo\Domain\Exception;

/**
 * Class TaskNameIsAlreadyExistedException
 *
 * An exception triggers when we try to have a task with the name
 * which is already used for another task
 *
 * @category None
 * @package  Task\Domain\Exception
 * @author   author
 * @license  None http://
 * @link     None
 */
class TaskNameIsAlreadyExistedException extends \Exception
{

}
