<?php
class contentHelper extends Database {

	function __construct()
	{
		$this->prefix = "bu";
		$session = new Session();
		$this->user = $session->get_session();
	}

	function getArticle($data=false, $debug=false)
	{

		$filter = "";
		if ($data['id']) $filter .= " AND id = {$data['id']} ";
		$sql = array(
                    'table' =>"{$this->prefix}_news_content",
                    'field' => "*",
                    'condition' => "categoryid = 0 {$filter}",
                );
        $result = $this->lazyQuery($sql,$debug);
        if ($result) return $result;
        return false;
	}
}
?>
