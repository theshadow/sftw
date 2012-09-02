<?php

namespace Dws\Db\Schema;

abstract class AbstractChange
{

	/**
	 * @var \PDO
	 */
	protected $pdo;

	/**
	 * @var string
	 */
	protected $tablePrefix;

	function __construct(\PDO $pdo, $tablePrefix = '')
	{
		$this->pdo = $pdo;
		$this->tablePrefix = $tablePrefix;
	}

	/**
	 * Changes to be applied in this change
	 */
	abstract function up();

	/**
	 * Rollback the changes made in up()
	 */
	abstract function down();
}

