<?php

require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php';

$APPLICATION->IncludeComponent(
	'up:task.list',
	'.default',
	[

	]
);

require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php';