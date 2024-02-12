<?php
require($_SERVER['DOCUMENT_ROOT'] . "/src/configs/db/query.db.php");
$sql = file_get_contents('./create_user_table.sql');
BaseQuery::exec($sql);
