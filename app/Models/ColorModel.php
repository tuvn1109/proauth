<?php namespace App\Models;

use CodeIgniter\Model;

class ColorModel extends Model
{
	protected $table = 'colors';
	protected $primaryKey = 'id';
	protected $returnType = 'array';
	protected $useSoftDeletes = false;
	protected $allowedFields = [];
	protected $useTimestamps = true;
	protected $protectFields = false;
	protected $createdField = 'created_at';
	protected $updatedField = 'updated_at';
	protected $deletedField = 'deleted_at';
	protected $validationRules = [];
	protected $validationMessages = [];
	protected $skipValidation = false;
	protected $selectFields = ['*'];

}

?>
