<?php
/**
 * File: TaskNotFoundException.php - todo
 * PHP Version 7
 *
 * @category None
 * @package  Task
 * @author   author
 * @license  None http://
 * @link     None
 */

namespace Task\Domain\Exception;

/**
 * Class TaskNotFoundException
 *
 * An exception triggers when we try to find a Task which is not existed
 * in Task repository
 *
 * @category None
 * @package  Task\Domain\Exception
 * @author   author
 * @license  None http://
 * @link     None
 */
class TaskNotFoundException extends \Exception
{

}
