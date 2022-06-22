<?php

// config
$moduleName = 'up.tasks';

// updater initialize
global $DB, $DBType;

include_once($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/classes/general/update_class.php');

$updater = new CUpdater();
$updater->Init(
	$_SERVER['DOCUMENT_ROOT'].'/local/modules/'.$moduleName.'/',
	$DBType,
	'',
	$_SERVER['DOCUMENT_ROOT'].'/local/modules/'.$moduleName.'/module_updater.php',
	$moduleName
);

$current_version = (int)\Bitrix\Main\Config\Option::get($moduleName, '~database_schema_version', -1);


// local updaters
if($current_version <= 0)
{
	if (!$updater->TableExists('up_tasks_task'))
	{
		$updater->Query('
		CREATE TABLE up_tasks_task
			(
				ID int not null auto_increment,
				TEXT varchar(600) not null,
				DATE int not null,
			
				PRIMARY KEY(ID)
			);
		');
	}

	\Bitrix\Main\Config\Option::set($moduleName, '~database_schema_version', 1);
}