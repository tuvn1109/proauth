<?php namespace App\Models;

use CodeIgniter\Model;

class OrdersModel extends Model
{
	protected $table = 'orders';
	protected $primaryKey = 'id';
	protected $returnType = 'array';
	protected $useSoftDeletes = false;
	protected $allowedFields = [];
	protected $useTimestamps = false;
	protected $protectFields = false;
	protected $createdField = 'created_at';
	protected $updatedField = 'updated_at';
	protected $deletedField = 'deleted_at';
	protected $validationRules = [];
	protected $validationMessages = [];
	protected $skipValidation = false;
	protected $selectFields = ['*'];

	function get_enum_values($table, $field)
	{
		//$fields = $this->getFieldData($table, $field);
		$query = $this->query("SHOW COLUMNS FROM {$table} WHERE Field = '{$field}'")->getResultArray();
		$enum = $query[0]['Type'];
		preg_match("/^enum\(\'(.*)\'\)$/", $enum, $matches);
		$enum = explode("','", $matches[1]);
		return $enum;
	}
}

?>
