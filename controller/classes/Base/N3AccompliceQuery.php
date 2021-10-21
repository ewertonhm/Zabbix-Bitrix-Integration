<?php

namespace Base;

use \N3Accomplice as ChildN3Accomplice;
use \N3AccompliceQuery as ChildN3AccompliceQuery;
use \Exception;
use \PDO;
use Map\N3AccompliceTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'n3_accomplice' table.
 *
 *
 *
 * @method     ChildN3AccompliceQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildN3AccompliceQuery orderByNome($order = Criteria::ASC) Order by the nome column
 * @method     ChildN3AccompliceQuery orderByBitrixId($order = Criteria::ASC) Order by the bitrix_id column
 *
 * @method     ChildN3AccompliceQuery groupById() Group by the id column
 * @method     ChildN3AccompliceQuery groupByNome() Group by the nome column
 * @method     ChildN3AccompliceQuery groupByBitrixId() Group by the bitrix_id column
 *
 * @method     ChildN3AccompliceQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildN3AccompliceQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildN3AccompliceQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildN3AccompliceQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildN3AccompliceQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildN3AccompliceQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildN3Accomplice|null findOne(ConnectionInterface $con = null) Return the first ChildN3Accomplice matching the query
 * @method     ChildN3Accomplice findOneOrCreate(ConnectionInterface $con = null) Return the first ChildN3Accomplice matching the query, or a new ChildN3Accomplice object populated from the query conditions when no match is found
 *
 * @method     ChildN3Accomplice|null findOneById(int $id) Return the first ChildN3Accomplice filtered by the id column
 * @method     ChildN3Accomplice|null findOneByNome(string $nome) Return the first ChildN3Accomplice filtered by the nome column
 * @method     ChildN3Accomplice|null findOneByBitrixId(string $bitrix_id) Return the first ChildN3Accomplice filtered by the bitrix_id column *

 * @method     ChildN3Accomplice requirePk($key, ConnectionInterface $con = null) Return the ChildN3Accomplice by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildN3Accomplice requireOne(ConnectionInterface $con = null) Return the first ChildN3Accomplice matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildN3Accomplice requireOneById(int $id) Return the first ChildN3Accomplice filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildN3Accomplice requireOneByNome(string $nome) Return the first ChildN3Accomplice filtered by the nome column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildN3Accomplice requireOneByBitrixId(string $bitrix_id) Return the first ChildN3Accomplice filtered by the bitrix_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildN3Accomplice[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildN3Accomplice objects based on current ModelCriteria
 * @psalm-method ObjectCollection&\Traversable<ChildN3Accomplice> find(ConnectionInterface $con = null) Return ChildN3Accomplice objects based on current ModelCriteria
 * @method     ChildN3Accomplice[]|ObjectCollection findById(int $id) Return ChildN3Accomplice objects filtered by the id column
 * @psalm-method ObjectCollection&\Traversable<ChildN3Accomplice> findById(int $id) Return ChildN3Accomplice objects filtered by the id column
 * @method     ChildN3Accomplice[]|ObjectCollection findByNome(string $nome) Return ChildN3Accomplice objects filtered by the nome column
 * @psalm-method ObjectCollection&\Traversable<ChildN3Accomplice> findByNome(string $nome) Return ChildN3Accomplice objects filtered by the nome column
 * @method     ChildN3Accomplice[]|ObjectCollection findByBitrixId(string $bitrix_id) Return ChildN3Accomplice objects filtered by the bitrix_id column
 * @psalm-method ObjectCollection&\Traversable<ChildN3Accomplice> findByBitrixId(string $bitrix_id) Return ChildN3Accomplice objects filtered by the bitrix_id column
 * @method     ChildN3Accomplice[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildN3Accomplice> paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class N3AccompliceQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\N3AccompliceQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\N3Accomplice', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildN3AccompliceQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildN3AccompliceQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildN3AccompliceQuery) {
            return $criteria;
        }
        $query = new ChildN3AccompliceQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildN3Accomplice|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(N3AccompliceTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = N3AccompliceTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildN3Accomplice A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, nome, bitrix_id FROM n3_accomplice WHERE id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildN3Accomplice $obj */
            $obj = new ChildN3Accomplice();
            $obj->hydrate($row);
            N3AccompliceTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildN3Accomplice|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildN3AccompliceQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(N3AccompliceTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildN3AccompliceQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(N3AccompliceTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildN3AccompliceQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(N3AccompliceTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(N3AccompliceTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(N3AccompliceTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the nome column
     *
     * Example usage:
     * <code>
     * $query->filterByNome('fooValue');   // WHERE nome = 'fooValue'
     * $query->filterByNome('%fooValue%', Criteria::LIKE); // WHERE nome LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nome The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildN3AccompliceQuery The current query, for fluid interface
     */
    public function filterByNome($nome = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nome)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(N3AccompliceTableMap::COL_NOME, $nome, $comparison);
    }

    /**
     * Filter the query on the bitrix_id column
     *
     * Example usage:
     * <code>
     * $query->filterByBitrixId('fooValue');   // WHERE bitrix_id = 'fooValue'
     * $query->filterByBitrixId('%fooValue%', Criteria::LIKE); // WHERE bitrix_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $bitrixId The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildN3AccompliceQuery The current query, for fluid interface
     */
    public function filterByBitrixId($bitrixId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bitrixId)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(N3AccompliceTableMap::COL_BITRIX_ID, $bitrixId, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildN3Accomplice $n3Accomplice Object to remove from the list of results
     *
     * @return $this|ChildN3AccompliceQuery The current query, for fluid interface
     */
    public function prune($n3Accomplice = null)
    {
        if ($n3Accomplice) {
            $this->addUsingAlias(N3AccompliceTableMap::COL_ID, $n3Accomplice->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the n3_accomplice table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(N3AccompliceTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            N3AccompliceTableMap::clearInstancePool();
            N3AccompliceTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(N3AccompliceTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(N3AccompliceTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            N3AccompliceTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            N3AccompliceTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // N3AccompliceQuery
