<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
{
	die();
}

use Bitrix\Main\Loader;
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\Context;
use Up\Tasks\model\TaskTable;

Loader::includeModule('up.tasks');

class UpTaskList extends CBitrixComponent
{
	public function executeComponent()
	{
		$request = Context::getCurrent()->getRequest();
		if ($request->isPost())
		{
			TaskTable::addTask($request['text']);
			TaskTable::deleteTask($request['delete']);
		}

		$this->arResult = [
			'TASKS' => TaskTable::getAllTasks()
		];

		$this->includeComponentTemplate();
	}
}
