<?php

class myActionsModel extends Model
{
    public function index()
    {
		$sql = "SELECT * FROM LNK_actions_users ln
				JOIN actions ac ON ac.id = ln.actions_id
				JOIN users us ON us.id = ln.users_id
				WHERE us.phone = :phone";
		return self::exec($sql, [$_SESSION['USER']['PHONE']]);
    }

	public function sale($params)
	{
		$id = strip_tags($params['id']);
		$myId = self::getUserInfo()['id'];
		$sql = "DELETE FROM `LNK_actions_users` WHERE actions_id = :id AND users_id = :user_id";
		self::exec($sql, [$id, $myId]);
		echo true;
	}
}