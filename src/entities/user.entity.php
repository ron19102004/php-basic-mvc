<?php
require($_SERVER['DOCUMENT_ROOT'] . "/src/configs/db/baseModel.db.php");

class User extends BaseModel
{
    const TABLE = "users";
}
echo json_encode(User::all(User::TABLE));
