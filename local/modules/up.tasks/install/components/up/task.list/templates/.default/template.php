<?php

use Bitrix\Main\Localization\Loc;

?>

<h3><?= Loc::getMessage('UP_TASK_LIST_LOGO') ?></h3>


<form style="margin: 16px;" name="form-text-btn" method="post">
	<input name="text" type="text" style="width: 200px;" placeholder="Введите текст">
	<button type="submit">Добавить</button>
</form>
<div class="task-list">
	<?php
	foreach ($arResult['TASKS'] as $task): ?>

		<div class="task-card">
			<p class="task-id">
				<?= Loc::getMessage('UP_TASK_LIST_ID') ?>: <?= $task['ID'] ?>
			</p>

			<p class="task-text">
				<?= Loc::getMessage('UP_TASK_LIST_TEXT') ?>: <b><?= $task['TEXT'] ?></b>
			</p>

			<p class="task-date">
				<?= Loc::getMessage('UP_TASK_LIST_DATE') ?>: <?= $task['DATE'] ?>
			</p>
			<form method="post">
				<div class="task-buttons">
					<button name="delete" value="<?= $task['ID'] ?>" style="margin: 8px;">Удалить!!</button>
				</div>
			</form>
		</div>


	<?php endforeach; ?>

</div>