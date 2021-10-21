<?php

namespace Map;

use \Task;
use \TaskQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'task' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 */
class TaskTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.TaskTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'task';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Task';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Task';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 5;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 5;

    /**
     * the column name for the id field
     */
    const COL_ID = 'task.id';

    /**
     * the column name for the title field
     */
    const COL_TITLE = 'task.title';

    /**
     * the column name for the responsible_id field
     */
    const COL_RESPONSIBLE_ID = 'task.responsible_id';

    /**
     * the column name for the unidade_id field
     */
    const COL_UNIDADE_ID = 'task.unidade_id';

    /**
     * the column name for the group_id field
     */
    const COL_GROUP_ID = 'task.group_id';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('Id', 'Title', 'ResponsibleId', 'UnidadeId', 'GroupId', ),
        self::TYPE_CAMELNAME     => array('id', 'title', 'responsibleId', 'unidadeId', 'groupId', ),
        self::TYPE_COLNAME       => array(TaskTableMap::COL_ID, TaskTableMap::COL_TITLE, TaskTableMap::COL_RESPONSIBLE_ID, TaskTableMap::COL_UNIDADE_ID, TaskTableMap::COL_GROUP_ID, ),
        self::TYPE_FIELDNAME     => array('id', 'title', 'responsible_id', 'unidade_id', 'group_id', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Title' => 1, 'ResponsibleId' => 2, 'UnidadeId' => 3, 'GroupId' => 4, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'title' => 1, 'responsibleId' => 2, 'unidadeId' => 3, 'groupId' => 4, ),
        self::TYPE_COLNAME       => array(TaskTableMap::COL_ID => 0, TaskTableMap::COL_TITLE => 1, TaskTableMap::COL_RESPONSIBLE_ID => 2, TaskTableMap::COL_UNIDADE_ID => 3, TaskTableMap::COL_GROUP_ID => 4, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'title' => 1, 'responsible_id' => 2, 'unidade_id' => 3, 'group_id' => 4, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, )
    );

    /**
     * Holds a list of column names and their normalized version.
     *
     * @var string[]
     */
    protected $normalizedColumnNameMap = [
        'Id' => 'ID',
        'Task.Id' => 'ID',
        'id' => 'ID',
        'task.id' => 'ID',
        'TaskTableMap::COL_ID' => 'ID',
        'COL_ID' => 'ID',
        'Title' => 'TITLE',
        'Task.Title' => 'TITLE',
        'title' => 'TITLE',
        'task.title' => 'TITLE',
        'TaskTableMap::COL_TITLE' => 'TITLE',
        'COL_TITLE' => 'TITLE',
        'ResponsibleId' => 'RESPONSIBLE_ID',
        'Task.ResponsibleId' => 'RESPONSIBLE_ID',
        'responsibleId' => 'RESPONSIBLE_ID',
        'task.responsibleId' => 'RESPONSIBLE_ID',
        'TaskTableMap::COL_RESPONSIBLE_ID' => 'RESPONSIBLE_ID',
        'COL_RESPONSIBLE_ID' => 'RESPONSIBLE_ID',
        'responsible_id' => 'RESPONSIBLE_ID',
        'task.responsible_id' => 'RESPONSIBLE_ID',
        'UnidadeId' => 'UNIDADE_ID',
        'Task.UnidadeId' => 'UNIDADE_ID',
        'unidadeId' => 'UNIDADE_ID',
        'task.unidadeId' => 'UNIDADE_ID',
        'TaskTableMap::COL_UNIDADE_ID' => 'UNIDADE_ID',
        'COL_UNIDADE_ID' => 'UNIDADE_ID',
        'unidade_id' => 'UNIDADE_ID',
        'task.unidade_id' => 'UNIDADE_ID',
        'GroupId' => 'GROUP_ID',
        'Task.GroupId' => 'GROUP_ID',
        'groupId' => 'GROUP_ID',
        'task.groupId' => 'GROUP_ID',
        'TaskTableMap::COL_GROUP_ID' => 'GROUP_ID',
        'COL_GROUP_ID' => 'GROUP_ID',
        'group_id' => 'GROUP_ID',
        'task.group_id' => 'GROUP_ID',
    ];

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('task');
        $this->setPhpName('Task');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Task');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        $this->setPrimaryKeyMethodInfo('task_id_seq');
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('title', 'Title', 'VARCHAR', true, 90, null);
        $this->addForeignKey('responsible_id', 'ResponsibleId', 'INTEGER', 'colaborador', 'id', false, null, null);
        $this->addForeignKey('unidade_id', 'UnidadeId', 'INTEGER', 'unidade', 'id', false, null, null);
        $this->addColumn('group_id', 'GroupId', 'VARCHAR', false, 10, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Colaborador', '\\Colaborador', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':responsible_id',
    1 => ':id',
  ),
), null, null, null, false);
        $this->addRelation('Unidade', '\\Unidade', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':unidade_id',
    1 => ':id',
  ),
), null, null, null, false);
        $this->addRelation('TaskAccomplice', '\\TaskAccomplice', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':task_id',
    1 => ':id',
  ),
), null, null, 'TaskAccomplices', false);
        $this->addRelation('TaskAuditor', '\\TaskAuditor', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':task_id',
    1 => ':id',
  ),
), null, null, 'TaskAuditors', false);
    } // buildRelations()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? TaskTableMap::CLASS_DEFAULT : TaskTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (Task object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = TaskTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = TaskTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + TaskTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = TaskTableMap::OM_CLASS;
            /** @var Task $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            TaskTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = TaskTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = TaskTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Task $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                TaskTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(TaskTableMap::COL_ID);
            $criteria->addSelectColumn(TaskTableMap::COL_TITLE);
            $criteria->addSelectColumn(TaskTableMap::COL_RESPONSIBLE_ID);
            $criteria->addSelectColumn(TaskTableMap::COL_UNIDADE_ID);
            $criteria->addSelectColumn(TaskTableMap::COL_GROUP_ID);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.title');
            $criteria->addSelectColumn($alias . '.responsible_id');
            $criteria->addSelectColumn($alias . '.unidade_id');
            $criteria->addSelectColumn($alias . '.group_id');
        }
    }

    /**
     * Remove all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be removed as they are only loaded on demand.
     *
     * @param Criteria $criteria object containing the columns to remove.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function removeSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->removeSelectColumn(TaskTableMap::COL_ID);
            $criteria->removeSelectColumn(TaskTableMap::COL_TITLE);
            $criteria->removeSelectColumn(TaskTableMap::COL_RESPONSIBLE_ID);
            $criteria->removeSelectColumn(TaskTableMap::COL_UNIDADE_ID);
            $criteria->removeSelectColumn(TaskTableMap::COL_GROUP_ID);
        } else {
            $criteria->removeSelectColumn($alias . '.id');
            $criteria->removeSelectColumn($alias . '.title');
            $criteria->removeSelectColumn($alias . '.responsible_id');
            $criteria->removeSelectColumn($alias . '.unidade_id');
            $criteria->removeSelectColumn($alias . '.group_id');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(TaskTableMap::DATABASE_NAME)->getTable(TaskTableMap::TABLE_NAME);
    }

    /**
     * Performs a DELETE on the database, given a Task or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Task object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TaskTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Task) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(TaskTableMap::DATABASE_NAME);
            $criteria->add(TaskTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = TaskQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            TaskTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                TaskTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the task table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return TaskQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Task or Criteria object.
     *
     * @param mixed               $criteria Criteria or Task object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TaskTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Task object
        }

        if ($criteria->containsKey(TaskTableMap::COL_ID) && $criteria->keyContainsValue(TaskTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.TaskTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = TaskQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // TaskTableMap
