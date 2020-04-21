<?php
/**
 * File: TaskController.php
 * PHP Version 7
 *
 * @category None
 * @package  Task
 * @author   author
 * @license  None http://
 * @link     None
 */

namespace App\Http\Controllers;

use Task\Application\Task\Command;
use Task\Application\Task\Query;

/**
 * Class TaskController
 *
 * @category None
 * @package  App\Http\Controllers
 * @author   author
 * @license  None http://
 * @link     None
 */
class TaskController extends Controller
{
    public function listAction(
        Query $taskQuery
    ) {
        return view('task.list', [
            'remaining_tasks' => $taskQuery->getAllRemainingTasks(),
            'completed_tasks' => $taskQuery->getAllCompletedTasks()
        ]);
    }
}
