<?php

namespace Map;

use \ColaboradorTecnologia;
use \ColaboradorTecnologiaQuery;
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
 * This class defines the structure of the 'colaborador_tecnologia' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 */
class ColaboradorTecnologiaTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.ColaboradorTecnologiaTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'colaborador_tecnologia';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\ColaboradorTecnologia';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'ColaboradorTecnologia';

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
    const COL_ID = 'colaborador_tecnologia.id';

    /**
     * the column name for the tecnologia_id field
     */
    const COL_TECNOLOGIA_ID = 'colaborador_tecnologia.tecnologia_id';

    /**
     * the column name for the colaborador_id field
     */
    const COL_COLABORADOR_ID = 'colaborador_tecnologia.colaborador_id';

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
        self::TYPE_PHPNAME       => array('Id', 'TecnologiaId', 'ColaboradorId', ),
        self::TYPE_CAMELNAME     => array('id', 'tecnologiaId', 'colaboradorId', ),
        self::TYPE_COLNAME       => array(ColaboradorTecnologiaTableMap::COL_ID, ColaboradorTecnologiaTableMap::COL_TECNOLOGIA_ID, ColaboradorTecnologiaTableMap::COL_COLABORADOR_ID, ),
        self::TYPE_FIELDNAME     => array('id', 'tecnologia_id', 'colaborador_id', ),
        self::TYPE_NUM           => array(0, 1, 2, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'TecnologiaId' => 1, 'ColaboradorId' => 2, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'tecnologiaId' => 1, 'colaboradorId' => 2, ),
        self::TYPE_COLNAME       => array(ColaboradorTecnologiaTableMap::COL_ID => 0, ColaboradorTecnologiaTableMap::COL_TECNOLOGIA_ID => 1, ColaboradorTecnologiaTableMap::COL_COLABORADOR_ID => 2, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'tecnologia_id' => 1, 'colaborador_id' => 2, ),
        self::TYPE_NUM           => array(0, 1, 2, )
    );

    /**
     * Holds a list of column names and their normalized version.
     *
     * @var string[]
     */
    protected $normalizedColumnNameMap = [
        'Id' => 'ID',
        'ColaboradorTecnologia.Id' => 'ID',
        'id' => 'ID',
        'colaboradorTecnologia.id' => 'ID',
        'ColaboradorTecnologiaTableMap::COL_ID' => 'ID',
        'COL_ID' => 'ID',
        'colaborador_tecnologia.id' => 'ID',
        'TecnologiaId' => 'TECNOLOGIA_ID',
        'ColaboradorTecnologia.TecnologiaId' => 'TECNOLOGIA_ID',
        'tecnologiaId' => 'TECNOLOGIA_ID',
        'colaboradorTecnologia.tecnologiaId' => 'TECNOLOGIA_ID',
        'ColaboradorTecnologiaTableMap::COL_TECNOLOGIA_ID' => 'TECNOLOGIA_ID',
        'COL_TECNOLOGIA_ID' => 'TECNOLOGIA_ID',
        'tecnologia_id' => 'TECNOLOGIA_ID',
        'colaborador_tecnologia.tecnologia_id' => 'TECNOLOGIA_ID',
        'ColaboradorId' => 'COLABORADOR_ID',
        'ColaboradorTecnologia.ColaboradorId' => 'COLABORADOR_ID',
        'colaboradorId' => 'COLABORADOR_ID',
        'colaboradorTecnologia.colaboradorId' => 'COLABORADOR_ID',
        'ColaboradorTecnologiaTableMap::COL_COLABORADOR_ID' => 'COLABORADOR_ID',
        'COL_COLABORADOR_ID' => 'COLABORADOR_ID',
        'colaborador_id' => 'COLABORADOR_ID',
        'colaborador_tecnologia.colaborador_id' => 'COLABORADOR_ID',
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
        $this->setName('colaborador_tecnologia');
        $this->setPhpName('ColaboradorTecnologia');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\ColaboradorTecnologia');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        $this->setPrimaryKeyMethodInfo('colaborador_tecnologia_id_seq');
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('tecnologia_id', 'TecnologiaId', 'INTEGER', 'tecnologia', 'id', false, null, null);
        $this->addForeignKey('colaborador_id', 'ColaboradorId', 'INTEGER', 'colaborador', 'id', false, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Colaborador', '\\Colaborador', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':colaborador_id',
    1 => ':id',
  ),
), null, null, null, false);
        $this->addRelation('Tecnologia', '\\Tecnologia', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':tecnologia_id',
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
        return $withPrefix ? ColaboradorTecnologiaTableMap::CLASS_DEFAULT : ColaboradorTecnologiaTableMap::OM_CLASS;
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
     * @return array           (ColaboradorTecnologia object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = ColaboradorTecnologiaTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = ColaboradorTecnologiaTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + ColaboradorTecnologiaTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ColaboradorTecnologiaTableMap::OM_CLASS;
            /** @var ColaboradorTecnologia $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            ColaboradorTecnologiaTableMap::addInstanceToPool($obj, $key);
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
            $key = ColaboradorTecnologiaTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = ColaboradorTecnologiaTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var ColaboradorTecnologia $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ColaboradorTecnologiaTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(ColaboradorTecnologiaTableMap::COL_ID);
            $criteria->addSelectColumn(ColaboradorTecnologiaTableMap::COL_TECNOLOGIA_ID);
            $criteria->addSelectColumn(ColaboradorTecnologiaTableMap::COL_COLABORADOR_ID);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.tecnologia_id');
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
            $criteria->removeSelectColumn(ColaboradorTecnologiaTableMap::COL_ID);
            $criteria->removeSelectColumn(ColaboradorTecnologiaTableMap::COL_TECNOLOGIA_ID);
            $criteria->removeSelectColumn(ColaboradorTecnologiaTableMap::COL_COLABORADOR_ID);
        } else {
            $criteria->removeSelectColumn($alias . '.id');
            $criteria->removeSelectColumn($alias . '.tecnologia_id');
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
        return Propel::getServiceContainer()->getDatabaseMap(ColaboradorTecnologiaTableMap::DATABASE_NAME)->getTable(ColaboradorTecnologiaTableMap::TABLE_NAME);
    }

    /**
     * Performs a DELETE on the database, given a ColaboradorTecnologia or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or ColaboradorTecnologia object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(ColaboradorTecnologiaTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \ColaboradorTecnologia) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ColaboradorTecnologiaTableMap::DATABASE_NAME);
            $criteria->add(ColaboradorTecnologiaTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = ColaboradorTecnologiaQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            ColaboradorTecnologiaTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                ColaboradorTecnologiaTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the colaborador_tecnologia table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return ColaboradorTecnologiaQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a ColaboradorTecnologia or Criteria object.
     *
     * @param mixed               $criteria Criteria or ColaboradorTecnologia object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ColaboradorTecnologiaTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from ColaboradorTecnologia object
        }

        if ($criteria->containsKey(ColaboradorTecnologiaTableMap::COL_ID) && $criteria->keyContainsValue(ColaboradorTecnologiaTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.ColaboradorTecnologiaTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = ColaboradorTecnologiaQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // ColaboradorTecnologiaTableMap
