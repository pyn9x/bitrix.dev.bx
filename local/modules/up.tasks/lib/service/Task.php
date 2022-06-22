<?php
namespace Up\Tasks\Service;

use Bitrix\Main\Context;
use Bitrix\Main\Error;
use Bitrix\Main;
use Bitrix\Main\Engine\ActionFilter;

use Up\Tasks\model\TaskTable;

class Task
{
	public static function showTask($textPost, $deletePost)
	{
		TaskTable::addTask($textPost);
		TaskTable::deleteTask((int)$deletePost);

		return TaskTable::getAllTasks();
	}
}