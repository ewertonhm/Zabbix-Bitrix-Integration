<?php

namespace Map;

use \ColaboradorUnidade;
use \ColaboradorUnidadeQuery;
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
 * This class defines the structure of the 'colaborador_unidade' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 */
class ColaboradorUnidadeTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.ColaboradorUnidadeTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'colaborador_unidade';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\ColaboradorUnidade';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'ColaboradorUnidade';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 3;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 3;

    /**
     * the column name for the id field
     */
    const COL_ID = 'colaborador_unidade.id';

    /**
     * the column name for the unidade_id field
     */
    const COL_UNIDADE_ID = 'colaborador_unidade.unidade_id';

    /**
     * the column name for the colaborador_id field
     */
    const COL_COLABORADOR_ID = 'colaborador_unidade.colaborador_id';

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
        self::TYPE_PHPNAME       => array('Id', 'UnidadeId', 'ColaboradorId', ),
        self::TYPE_CAMELNAME     => array('id', 'unidadeId', 'colaboradorId', ),
        self::TYPE_COLNAME       => array(ColaboradorUnidadeTableMap::COL_ID, ColaboradorUnidadeTableMap::COL_UNIDADE_ID, ColaboradorUnidadeTableMap::COL_COLABORADOR_ID, ),
        self::TYPE_FIELDNAME     => array('id', 'unidade_id', 'colaborador_id', ),
        self::TYPE_NUM           => array(0, 1, 2, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'UnidadeId' => 1, 'ColaboradorId' => 2, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'unidadeId' => 1, 'colaboradorId' => 2, ),
        self::TYPE_COLNAME       => array(ColaboradorUnidadeTableMap::COL_ID => 0, ColaboradorUnidadeTableMap::COL_UNIDADE_ID => 1, ColaboradorUnidadeTableMap::COL_COLABORADOR_ID => 2, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'unidade_id' => 1, 'colaborador_id' => 2, ),
        self::TYPE_NUM           => array(0, 1, 2, )
    );

    /**
     * Holds a list of column names and their normalized version.
     *
     * @var string[]
     */
    protected $normalizedColumnNameMap = [
        'Id' => 'ID',
        'ColaboradorUnidade.Id' => 'ID',
        'id' => 'ID',
        'colaboradorUnidade.id' => 'ID',
        'ColaboradorUnidadeTableMap::COL_ID' => 'ID',
        'COL_ID' => 'ID',
        'colaborador_unidade.id' => 'ID',
        'UnidadeId' => 'UNIDADE_ID',
        'ColaboradorUnidade.UnidadeId' => 'UNIDADE_ID',
        'unidadeId' => 'UNIDADE_ID',
        'colaboradorUnidade.unidadeId' => 'UNIDADE_ID',
        'ColaboradorUnidadeTableMap::COL_UNIDADE_ID' => 'UNIDADE_ID',
        'COL_UNIDADE_ID' => 'UNIDADE_ID',
        'unidade_id' => 'UNIDADE_ID',
        'colaborador_unidade.unidade_id' => 'UNIDADE_ID',
        'ColaboradorId' => 'COLABORADOR_ID',
        'ColaboradorUnidade.ColaboradorId' => 'COLABORADOR_ID',
        'colaboradorId' => 'COLABORADOR_ID',
        'colaboradorUnidade.colaboradorId' => 'COLABORADOR_ID',
        'ColaboradorUnidadeTableMap::COL_COLABORADOR_ID' => 'COLABORADOR_ID',
        'COL_COLABORADOR_ID' => 'COLABORADOR_ID',
        'colaborador_id' => 'COLABORADOR_ID',
        'colaborador_unidade.colaborador_id' => 'COLABORADOR_ID',
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
        $this->setName('colaborador_unidade');
        $this->setPhpName('ColaboradorUnidade');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\ColaboradorUnidade');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        $this->setPrimaryKeyMethodInfo('colaborador_unidade_id_seq');
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('unidade_id', 'UnidadeId', 'INTEGER', 'unidade', 'id', false, null, null);
        $this->addForeignKey('colaborador_id', 'ColaboradorId', 'INTEGER', 'unidade', 'id', false, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('UnidadeRelatedByColaboradorId', '\\Unidade', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':colaborador_id',
    1 => ':id',
  ),
), null, null, null, false);
        $this->addRelation('UnidadeRelatedByUnidadeId', '\\Unidade', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':unidade_id',
    1 => ':id',
  ),
), null, null, null, false);
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
        return $withPrefix ? ColaboradorUnidadeTableMap::CLASS_DEFAULT : ColaboradorUnidadeTableMap::OM_CLASS;
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
     * @return array           (ColaboradorUnidade object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = ColaboradorUnidadeTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = ColaboradorUnidadeTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + ColaboradorUnidadeTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ColaboradorUnidadeTableMap::OM_CLASS;
            /** @var ColaboradorUnidade $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            ColaboradorUnidadeTableMap::addInstanceToPool($obj, $key);
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
            $key = ColaboradorUnidadeTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = ColaboradorUnidadeTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var ColaboradorUnidade $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ColaboradorUnidadeTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(ColaboradorUnidadeTableMap::COL_ID);
            $criteria->addSelectColumn(ColaboradorUnidadeTableMap::COL_UNIDADE_ID);
            $criteria->addSelectColumn(ColaboradorUnidadeTableMap::COL_COLABORADOR_ID);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.unidade_id');
            $criteria->addSelectColumn($alias . '.colaborador_id');
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
            $criteria->removeSelectColumn(ColaboradorUnidadeTableMap::COL_ID);
            $criteria->removeSelectColumn(ColaboradorUnidadeTableMap::COL_UNIDADE_ID);
            $criteria->removeSelectColumn(ColaboradorUnidadeTableMap::COL_COLABORADOR_ID);
        } else {
            $criteria->removeSelectColumn($alias . '.id');
            $criteria->removeSelectColumn($alias . '.unidade_id');
            $criteria->removeSelectColumn($alias . '.colaborador_id');
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
        return Propel::getServiceContainer()->getDatabaseMap(ColaboradorUnidadeTableMap::DATABASE_NAME)->getTable(ColaboradorUnidadeTableMap::TABLE_NAME);
    }

    /**
     * Performs a DELETE on the database, given a ColaboradorUnidade or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or ColaboradorUnidade object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(ColaboradorUnidadeTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \ColaboradorUnidade) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ColaboradorUnidadeTableMap::DATABASE_NAME);
            $criteria->add(ColaboradorUnidadeTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = ColaboradorUnidadeQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            ColaboradorUnidadeTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                ColaboradorUnidadeTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the colaborador_unidade table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return ColaboradorUnidadeQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a ColaboradorUnidade or Criteria object.
     *
     * @param mixed               $criteria Criteria or ColaboradorUnidade object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ColaboradorUnidadeTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from ColaboradorUnidade object
        }

        if ($criteria->containsKey(ColaboradorUnidadeTableMap::COL_ID) && $criteria->keyContainsValue(ColaboradorUnidadeTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.ColaboradorUnidadeTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = ColaboradorUnidadeQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // ColaboradorUnidadeTableMap
