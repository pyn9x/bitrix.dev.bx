<?php

namespace Up\Tasks\model;

use Bitrix\Main\Localization\Loc, Bitrix\Main\ORM\Data\DataManager, Bitrix\Main\ORM\Fields\IntegerField, Bitrix\Main\ORM\Fields\StringField, Bitrix\Main\ORM\Fields\Validators\LengthValidator;

Loc::loadMessages(__FILE__);

/**
 * Class TaskTable
 *
 * Fields:
 * <ul>
 * <li> ID int mandatory
 * <li> TEXT string(600) mandatory
 * <li> DATE int mandatory
 * </ul>
 *
 * @package Bitrix\Tasks
 **/
class TaskTable extends DataManager
{
	/**
	 * Returns DB table name for entity.
	 *
	 * @return string
	 */
	public static function getTableName()
	{
		return 'up_tasks_task';
	}

	/**
	 * Returns entity map definition.
	 *
	 * @return array
	 */
	public static function getMap()
	{
		return [
			new IntegerField('ID', [
				'primary' => true,
				'autocomplete' => true,
				'title' => Loc::getMessage('TASK_ENTITY_ID_FIELD'),
			]),
			new StringField('TEXT', [
				'required' => true,
				'validation' => [__CLASS__, 'validateText'],
				'title' => Loc::getMessage('TASK_ENTITY_TEXT_FIELD'),
			]),
			new IntegerField('DATE', [
				'required' => true,
				'title' => Loc::getMessage('TASK_ENTITY_DATE_FIELD'),
			]),
		];
	}

	/**
	 * Returns validators for TEXT field.
	 *
	 * @return array
	 */
	public static function validateText()
	{
		return [
			new LengthValidator(null, 600),
		];
	}

	public static function getAllTasks()
	{
		return self::getList(['select' => ['*']])->fetchAll();
	}

	public static function addTask($text)
	{
		$result = self::add([
								'TEXT' => $text,
								'DATE' => date('Y-m-d H:i:s'),
							]);

	}

	public static function deleteTask($id)
	{
		$result = self::delete([
								   'ID' => (int)$id,
							   ]);

	}
}
