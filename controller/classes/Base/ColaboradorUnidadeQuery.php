<?php

namespace Base;

use \ColaboradorUnidade as ChildColaboradorUnidade;
use \ColaboradorUnidadeQuery as ChildColaboradorUnidadeQuery;
use \Exception;
use \PDO;
use Map\ColaboradorUnidadeTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'colaborador_unidade' table.
 *
 *
 *
 * @method     ChildColaboradorUnidadeQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildColaboradorUnidadeQuery orderByUnidadeId($order = Criteria::ASC) Order by the unidade_id column
 * @method     ChildColaboradorUnidadeQuery orderByColaboradorId($order = Criteria::ASC) Order by the colaborador_id column
 *
 * @method     ChildColaboradorUnidadeQuery groupById() Group by the id column
 * @method     ChildColaboradorUnidadeQuery groupByUnidadeId() Group by the unidade_id column
 * @method     ChildColaboradorUnidadeQuery groupByColaboradorId() Group by the colaborador_id column
 *
 * @method     ChildColaboradorUnidadeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildColaboradorUnidadeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildColaboradorUnidadeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildColaboradorUnidadeQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildColaboradorUnidadeQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildColaboradorUnidadeQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildColaboradorUnidadeQuery leftJoinUnidadeRelatedByColaboradorId($relationAlias = null) Adds a LEFT JOIN clause to the query using the UnidadeRelatedByColaboradorId relation
 * @method     ChildColaboradorUnidadeQuery rightJoinUnidadeRelatedByColaboradorId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UnidadeRelatedByColaboradorId relation
 * @method     ChildColaboradorUnidadeQuery innerJoinUnidadeRelatedByColaboradorId($relationAlias = null) Adds a INNER JOIN clause to the query using the UnidadeRelatedByColaboradorId relation
 *
 * @method     ChildColaboradorUnidadeQuery joinWithUnidadeRelatedByColaboradorId($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the UnidadeRelatedByColaboradorId relation
 *
 * @method     ChildColaboradorUnidadeQuery leftJoinWithUnidadeRelatedByColaboradorId() Adds a LEFT JOIN clause and with to the query using the UnidadeRelatedByColaboradorId relation
 * @method     ChildColaboradorUnidadeQuery rightJoinWithUnidadeRelatedByColaboradorId() Adds a RIGHT JOIN clause and with to the query using the UnidadeRelatedByColaboradorId relation
 * @method     ChildColaboradorUnidadeQuery innerJoinWithUnidadeRelatedByColaboradorId() Adds a INNER JOIN clause and with to the query using the UnidadeRelatedByColaboradorId relation
 *
 * @method     ChildColaboradorUnidadeQuery leftJoinUnidadeRelatedByUnidadeId($relationAlias = null) Adds a LEFT JOIN clause to the query using the UnidadeRelatedByUnidadeId relation
 * @method     ChildColaboradorUnidadeQuery rightJoinUnidadeRelatedByUnidadeId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UnidadeRelatedByUnidadeId relation
 * @method     ChildColaboradorUnidadeQuery innerJoinUnidadeRelatedByUnidadeId($relationAlias = null) Adds a INNER JOIN clause to the query using the UnidadeRelatedByUnidadeId relation
 *
 * @method     ChildColaboradorUnidadeQuery joinWithUnidadeRelatedByUnidadeId($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the UnidadeRelatedByUnidadeId relation
 *
 * @method     ChildColaboradorUnidadeQuery leftJoinWithUnidadeRelatedByUnidadeId() Adds a LEFT JOIN clause and with to the query using the UnidadeRelatedByUnidadeId relation
 * @method     ChildColaboradorUnidadeQuery rightJoinWithUnidadeRelatedByUnidadeId() Adds a RIGHT JOIN clause and with to the query using the UnidadeRelatedByUnidadeId relation
 * @method     ChildColaboradorUnidadeQuery innerJoinWithUnidadeRelatedByUnidadeId() Adds a INNER JOIN clause and with to the query using the UnidadeRelatedByUnidadeId relation
 *
 * @method     \UnidadeQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildColaboradorUnidade|null findOne(ConnectionInterface $con = null) Return the first ChildColaboradorUnidade matching the query
 * @method     ChildColaboradorUnidade findOneOrCreate(ConnectionInterface $con = null) Return the first ChildColaboradorUnidade matching the query, or a new ChildColaboradorUnidade object populated from the query conditions when no match is found
 *
 * @method     ChildColaboradorUnidade|null findOneById(int $id) Return the first ChildColaboradorUnidade filtered by the id column
 * @method     ChildColaboradorUnidade|null findOneByUnidadeId(int $unidade_id) Return the first ChildColaboradorUnidade filtered by the unidade_id column
 * @method     ChildColaboradorUnidade|null findOneByColaboradorId(int $colaborador_id) Return the first ChildColaboradorUnidade filtered by the colaborador_id column *

 * @method     ChildColaboradorUnidade requirePk($key, ConnectionInterface $con = null) Return the ChildColaboradorUnidade by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildColaboradorUnidade requireOne(ConnectionInterface $con = null) Return the first ChildColaboradorUnidade matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildColaboradorUnidade requireOneById(int $id) Return the first ChildColaboradorUnidade filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildColaboradorUnidade requireOneByUnidadeId(int $unidade_id) Return the first ChildColaboradorUnidade filtered by the unidade_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildColaboradorUnidade requireOneByColaboradorId(int $colaborador_id) Return the first ChildColaboradorUnidade filtered by the colaborador_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildColaboradorUnidade[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildColaboradorUnidade objects based on current ModelCriteria
 * @psalm-method ObjectCollection&\Traversable<ChildColaboradorUnidade> find(ConnectionInterface $con = null) Return ChildColaboradorUnidade objects based on current ModelCriteria
 * @method     ChildColaboradorUnidade[]|ObjectCollection findById(int $id) Return ChildColaboradorUnidade objects filtered by the id column
 * @psalm-method ObjectCollection&\Traversable<ChildColaboradorUnidade> findById(int $id) Return ChildColaboradorUnidade objects filtered by the id column
 * @method     ChildColaboradorUnidade[]|ObjectCollection findByUnidadeId(int $unidade_id) Return ChildColaboradorUnidade objects filtered by the unidade_id column
 * @psalm-method ObjectCollection&\Traversable<ChildColaboradorUnidade> findByUnidadeId(int $unidade_id) Return ChildColaboradorUnidade objects filtered by the unidade_id column
 * @method     ChildColaboradorUnidade[]|ObjectCollection findByColaboradorId(int $colaborador_id) Return ChildColaboradorUnidade objects filtered by the colaborador_id column
 * @psalm-method ObjectCollection&\Traversable<ChildColaboradorUnidade> findByColaboradorId(int $colaborador_id) Return ChildColaboradorUnidade objects filtered by the colaborador_id column
 * @method     ChildColaboradorUnidade[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildColaboradorUnidade> paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ColaboradorUnidadeQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\ColaboradorUnidadeQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\ColaboradorUnidade', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildColaboradorUnidadeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildColaboradorUnidadeQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildColaboradorUnidadeQuery) {
            return $criteria;
        }
        $query = new ChildColaboradorUnidadeQuery();
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
     * @return ChildColaboradorUnidade|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ColaboradorUnidadeTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = ColaboradorUnidadeTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildColaboradorUnidade A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, unidade_id, colaborador_id FROM colaborador_unidade WHERE id = :p0';
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
            /** @var ChildColaboradorUnidade $obj */
            $obj = new ChildColaboradorUnidade();
            $obj->hydrate($row);
            ColaboradorUnidadeTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildColaboradorUnidade|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildColaboradorUnidadeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ColaboradorUnidadeTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildColaboradorUnidadeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ColaboradorUnidadeTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildColaboradorUnidadeQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ColaboradorUnidadeTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ColaboradorUnidadeTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ColaboradorUnidadeTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the unidade_id column
     *
     * Example usage:
     * <code>
     * $query->filterByUnidadeId(1234); // WHERE unidade_id = 1234
     * $query->filterByUnidadeId(array(12, 34)); // WHERE unidade_id IN (12, 34)
     * $query->filterByUnidadeId(array('min' => 12)); // WHERE unidade_id > 12
     * </code>
     *
     * @see       filterByUnidadeRelatedByUnidadeId()
     *
     * @param     mixed $unidadeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildColaboradorUnidadeQuery The current query, for fluid interface
     */
    public function filterByUnidadeId($unidadeId = null, $comparison = null)
    {
        if (is_array($unidadeId)) {
            $useMinMax = false;
            if (isset($unidadeId['min'])) {
                $this->addUsingAlias(ColaboradorUnidadeTableMap::COL_UNIDADE_ID, $unidadeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($unidadeId['max'])) {
                $this->addUsingAlias(ColaboradorUnidadeTableMap::COL_UNIDADE_ID, $unidadeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ColaboradorUnidadeTableMap::COL_UNIDADE_ID, $unidadeId, $comparison);
    }

    /**
     * Filter the query on the colaborador_id column
     *
     * Example usage:
     * <code>
     * $query->filterByColaboradorId(1234); // WHERE colaborador_id = 1234
     * $query->filterByColaboradorId(array(12, 34)); // WHERE colaborador_id IN (12, 34)
     * $query->filterByColaboradorId(array('min' => 12)); // WHERE colaborador_id > 12
     * </code>
     *
     * @see       filterByUnidadeRelatedByColaboradorId()
     *
     * @param     mixed $colaboradorId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildColaboradorUnidadeQuery The current query, for fluid interface
     */
    public function filterByColaboradorId($colaboradorId = null, $comparison = null)
    {
        if (is_array($colaboradorId)) {
            $useMinMax = false;
            if (isset($colaboradorId['min'])) {
                $this->addUsingAlias(ColaboradorUnidadeTableMap::COL_COLABORADOR_ID, $colaboradorId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($colaboradorId['max'])) {
                $this->addUsingAlias(ColaboradorUnidadeTableMap::COL_COLABORADOR_ID, $colaboradorId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ColaboradorUnidadeTableMap::COL_COLABORADOR_ID, $colaboradorId, $comparison);
    }

    /**
     * Filter the query by a related \Unidade object
     *
     * @param \Unidade|ObjectCollection $unidade The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildColaboradorUnidadeQuery The current query, for fluid interface
     */
    public function filterByUnidadeRelatedByColaboradorId($unidade, $comparison = null)
    {
        if ($unidade instanceof \Unidade) {
            return $this
                ->addUsingAlias(ColaboradorUnidadeTableMap::COL_COLABORADOR_ID, $unidade->getId(), $comparison);
        } elseif ($unidade instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ColaboradorUnidadeTableMap::COL_COLABORADOR_ID, $unidade->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByUnidadeRelatedByColaboradorId() only accepts arguments of type \Unidade or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the UnidadeRelatedByColaboradorId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildColaboradorUnidadeQuery The current query, for fluid interface
     */
    public function joinUnidadeRelatedByColaboradorId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('UnidadeRelatedByColaboradorId');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'UnidadeRelatedByColaboradorId');
        }

        return $this;
    }

    /**
     * Use the UnidadeRelatedByColaboradorId relation Unidade object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \UnidadeQuery A secondary query class using the current class as primary query
     */
    public function useUnidadeRelatedByColaboradorIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinUnidadeRelatedByColaboradorId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'UnidadeRelatedByColaboradorId', '\UnidadeQuery');
    }

    /**
     * Use the UnidadeRelatedByColaboradorId relation Unidade object
     *
     * @param callable(\UnidadeQuery):\UnidadeQuery $callable A function working on the related query
     *
     * @param string|null $relationAlias optional alias for the relation
     *
     * @param string|null $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this
     */
    public function withUnidadeRelatedByColaboradorIdQuery(
        callable $callable,
        string $relationAlias = null,
        ?string $joinType = Criteria::LEFT_JOIN
    ) {
        $relatedQuery = $this->useUnidadeRelatedByColaboradorIdQuery(
            $relationAlias,
            $joinType
        );
        $callable($relatedQuery);
        $relatedQuery->endUse();

        return $this;
    }
    /**
     * Use the UnidadeRelatedByColaboradorId relation to the Unidade table for an EXISTS query.
     *
     * @see \Propel\Runtime\ActiveQuery\ModelCriteria::useExistsQuery()
     *
     * @param string|null $queryClass Allows to use a custom query class for the exists query, like ExtendedBookQuery::class
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string $typeOfExists Either ExistsCriterion::TYPE_EXISTS or ExistsCriterion::TYPE_NOT_EXISTS
     *
     * @return \UnidadeQuery The inner query object of the EXISTS statement
     */
    public function useUnidadeRelatedByColaboradorIdExistsQuery($modelAlias = null, $queryClass = null, $typeOfExists = 'EXISTS')
    {
        return $this->useExistsQuery('UnidadeRelatedByColaboradorId', $modelAlias, $queryClass, $typeOfExists);
    }

    /**
     * Use the UnidadeRelatedByColaboradorId relation to the Unidade table for a NOT EXISTS query.
     *
     * @see useUnidadeRelatedByColaboradorIdExistsQuery()
     *
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string|null $queryClass Allows to use a custom query class for the exists query, like ExtendedBookQuery::class
     *
     * @return \UnidadeQuery The inner query object of the NOT EXISTS statement
     */
    public function useUnidadeRelatedByColaboradorIdNotExistsQuery($modelAlias = null, $queryClass = null)
    {
        return $this->useExistsQuery('UnidadeRelatedByColaboradorId', $modelAlias, $queryClass, 'NOT EXISTS');
    }
    /**
     * Filter the query by a related \Unidade object
     *
     * @param \Unidade|ObjectCollection $unidade The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildColaboradorUnidadeQuery The current query, for fluid interface
     */
    public function filterByUnidadeRelatedByUnidadeId($unidade, $comparison = null)
    {
        if ($unidade instanceof \Unidade) {
            return $this
                ->addUsingAlias(ColaboradorUnidadeTableMap::COL_UNIDADE_ID, $unidade->getId(), $comparison);
        } elseif ($unidade instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ColaboradorUnidadeTableMap::COL_UNIDADE_ID, $unidade->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByUnidadeRelatedByUnidadeId() only accepts arguments of type \Unidade or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the UnidadeRelatedByUnidadeId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildColaboradorUnidadeQuery The current query, for fluid interface
     */
    public function joinUnidadeRelatedByUnidadeId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('UnidadeRelatedByUnidadeId');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'UnidadeRelatedByUnidadeId');
        }

        return $this;
    }

    /**
     * Use the UnidadeRelatedByUnidadeId relation Unidade object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \UnidadeQuery A secondary query class using the current class as primary query
     */
    public function useUnidadeRelatedByUnidadeIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinUnidadeRelatedByUnidadeId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'UnidadeRelatedByUnidadeId', '\UnidadeQuery');
    }

    /**
     * Use the UnidadeRelatedByUnidadeId relation Unidade object
     *
     * @param callable(\UnidadeQuery):\UnidadeQuery $callable A function working on the related query
     *
     * @param string|null $relationAlias optional alias for the relation
     *
     * @param string|null $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this
     */
    public function withUnidadeRelatedByUnidadeIdQuery(
        callable $callable,
        string $relationAlias = null,
        ?string $joinType = Criteria::LEFT_JOIN
    ) {
        $relatedQuery = $this->useUnidadeRelatedByUnidadeIdQuery(
            $relationAlias,
            $joinType
        );
        $callable($relatedQuery);
        $relatedQuery->endUse();

        return $this;
    }
    /**
     * Use the UnidadeRelatedByUnidadeId relation to the Unidade table for an EXISTS query.
     *
     * @see \Propel\Runtime\ActiveQuery\ModelCriteria::useExistsQuery()
     *
     * @param string|null $queryClass Allows to use a custom query class for the exists query, like ExtendedBookQuery::class
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string $typeOfExists Either ExistsCriterion::TYPE_EXISTS or ExistsCriterion::TYPE_NOT_EXISTS
     *
     * @return \UnidadeQuery The inner query object of the EXISTS statement
     */
    public function useUnidadeRelatedByUnidadeIdExistsQuery($modelAlias = null, $queryClass = null, $typeOfExists = 'EXISTS')
    {
        return $this->useExistsQuery('UnidadeRelatedByUnidadeId', $modelAlias, $queryClass, $typeOfExists);
    }

    /**
     * Use the UnidadeRelatedByUnidadeId relation to the Unidade table for a NOT EXISTS query.
     *
     * @see useUnidadeRelatedByUnidadeIdExistsQuery()
     *
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string|null $queryClass Allows to use a custom query class for the exists query, like ExtendedBookQuery::class
     *
     * @return \UnidadeQuery The inner query object of the NOT EXISTS statement
     */
    public function useUnidadeRelatedByUnidadeIdNotExistsQuery($modelAlias = null, $queryClass = null)
    {
        return $this->useExistsQuery('UnidadeRelatedByUnidadeId', $modelAlias, $queryClass, 'NOT EXISTS');
    }
    /**
     * Exclude object from result
     *
     * @param   ChildColaboradorUnidade $colaboradorUnidade Object to remove from the list of results
     *
     * @return $this|ChildColaboradorUnidadeQuery The current query, for fluid interface
     */
    public function prune($colaboradorUnidade = null)
    {
        if ($colaboradorUnidade) {
            $this->addUsingAlias(ColaboradorUnidadeTableMap::COL_ID, $colaboradorUnidade->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the colaborador_unidade table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ColaboradorUnidadeTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ColaboradorUnidadeTableMap::clearInstancePool();
            ColaboradorUnidadeTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ColaboradorUnidadeTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ColaboradorUnidadeTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ColaboradorUnidadeTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ColaboradorUnidadeTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ColaboradorUnidadeQuery
