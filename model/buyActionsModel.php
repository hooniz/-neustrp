<?php

class buyActionsModel extends Model
{
    public function index()
    {
        $sql = "SELECT * FROM actions";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();
    }

	public function buy($params)
	{
		$id = strip_tags($params['id']);
		$myId = self::getUserInfo()['id'];
		$sql = "INSERT INTO `LNK_actions_users`(`actions_id`, `users_id`, `count`) VALUES ( :action_id, :user_id ,1)";
		self::exec($sql, [$id , $myId]);
		echo true;
	}
}