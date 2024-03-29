<?php

namespace Base;

use \Colaborador as ChildColaborador;
use \ColaboradorQuery as ChildColaboradorQuery;
use \Exception;
use \PDO;
use Map\ColaboradorTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'colaborador' table.
 *
 *
 *
 * @method     ChildColaboradorQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildColaboradorQuery orderByNome($order = Criteria::ASC) Order by the nome column
 * @method     ChildColaboradorQuery orderByBitrixId($order = Criteria::ASC) Order by the bitrix_id column
 *
 * @method     ChildColaboradorQuery groupById() Group by the id column
 * @method     ChildColaboradorQuery groupByNome() Group by the nome column
 * @method     ChildColaboradorQuery groupByBitrixId() Group by the bitrix_id column
 *
 * @method     ChildColaboradorQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildColaboradorQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildColaboradorQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildColaboradorQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildColaboradorQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildColaboradorQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildColaboradorQuery leftJoinColaboradorTecnologia($relationAlias = null) Adds a LEFT JOIN clause to the query using the ColaboradorTecnologia relation
 * @method     ChildColaboradorQuery rightJoinColaboradorTecnologia($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ColaboradorTecnologia relation
 * @method     ChildColaboradorQuery innerJoinColaboradorTecnologia($relationAlias = null) Adds a INNER JOIN clause to the query using the ColaboradorTecnologia relation
 *
 * @method     ChildColaboradorQuery joinWithColaboradorTecnologia($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the ColaboradorTecnologia relation
 *
 * @method     ChildColaboradorQuery leftJoinWithColaboradorTecnologia() Adds a LEFT JOIN clause and with to the query using the ColaboradorTecnologia relation
 * @method     ChildColaboradorQuery rightJoinWithColaboradorTecnologia() Adds a RIGHT JOIN clause and with to the query using the ColaboradorTecnologia relation
 * @method     ChildColaboradorQuery innerJoinWithColaboradorTecnologia() Adds a INNER JOIN clause and with to the query using the ColaboradorTecnologia relation
 *
 * @method     ChildColaboradorQuery leftJoinColaboradorUnidade($relationAlias = null) Adds a LEFT JOIN clause to the query using the ColaboradorUnidade relation
 * @method     ChildColaboradorQuery rightJoinColaboradorUnidade($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ColaboradorUnidade relation
 * @method     ChildColaboradorQuery innerJoinColaboradorUnidade($relationAlias = null) Adds a INNER JOIN clause to the query using the ColaboradorUnidade relation
 *
 * @method     ChildColaboradorQuery joinWithColaboradorUnidade($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the ColaboradorUnidade relation
 *
 * @method     ChildColaboradorQuery leftJoinWithColaboradorUnidade() Adds a LEFT JOIN clause and with to the query using the ColaboradorUnidade relation
 * @method     ChildColaboradorQuery rightJoinWithColaboradorUnidade() Adds a RIGHT JOIN clause and with to the query using the ColaboradorUnidade relation
 * @method     ChildColaboradorQuery innerJoinWithColaboradorUnidade() Adds a INNER JOIN clause and with to the query using the ColaboradorUnidade relation
 *
 * @method     ChildColaboradorQuery leftJoinTask($relationAlias = null) Adds a LEFT JOIN clause to the query using the Task relation
 * @method     ChildColaboradorQuery rightJoinTask($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Task relation
 * @method     ChildColaboradorQuery innerJoinTask($relationAlias = null) Adds a INNER JOIN clause to the query using the Task relation
 *
 * @method     ChildColaboradorQuery joinWithTask($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Task relation
 *
 * @method     ChildColaboradorQuery leftJoinWithTask() Adds a LEFT JOIN clause and with to the query using the Task relation
 * @method     ChildColaboradorQuery rightJoinWithTask() Adds a RIGHT JOIN clause and with to the query using the Task relation
 * @method     ChildColaboradorQuery innerJoinWithTask() Adds a INNER JOIN clause and with to the query using the Task relation
 *
 * @method     ChildColaboradorQuery leftJoinTaskAccomplice($relationAlias = null) Adds a LEFT JOIN clause to the query using the TaskAccomplice relation
 * @method     ChildColaboradorQuery rightJoinTaskAccomplice($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TaskAccomplice relation
 * @method     ChildColaboradorQuery innerJoinTaskAccomplice($relationAlias = null) Adds a INNER JOIN clause to the query using the TaskAccomplice relation
 *
 * @method     ChildColaboradorQuery joinWithTaskAccomplice($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the TaskAccomplice relation
 *
 * @method     ChildColaboradorQuery leftJoinWithTaskAccomplice() Adds a LEFT JOIN clause and with to the query using the TaskAccomplice relation
 * @method     ChildColaboradorQuery rightJoinWithTaskAccomplice() Adds a RIGHT JOIN clause and with to the query using the TaskAccomplice relation
 * @method     ChildColaboradorQuery innerJoinWithTaskAccomplice() Adds a INNER JOIN clause and with to the query using the TaskAccomplice relation
 *
 * @method     ChildColaboradorQuery leftJoinTaskAuditor($relationAlias = null) Adds a LEFT JOIN clause to the query using the TaskAuditor relation
 * @method     ChildColaboradorQuery rightJoinTaskAuditor($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TaskAuditor relation
 * @method     ChildColaboradorQuery innerJoinTaskAuditor($relationAlias = null) Adds a INNER JOIN clause to the query using the TaskAuditor relation
 *
 * @method     ChildColaboradorQuery joinWithTaskAuditor($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the TaskAuditor relation
 *
 * @method     ChildColaboradorQuery leftJoinWithTaskAuditor() Adds a LEFT JOIN clause and with to the query using the TaskAuditor relation
 * @method     ChildColaboradorQuery rightJoinWithTaskAuditor() Adds a RIGHT JOIN clause and with to the query using the TaskAuditor relation
 * @method     ChildColaboradorQuery innerJoinWithTaskAuditor() Adds a INNER JOIN clause and with to the query using the TaskAuditor relation
 *
 * @method     \ColaboradorTecnologiaQuery|\ColaboradorUnidadeQuery|\TaskQuery|\TaskAccompliceQuery|\TaskAuditorQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildColaborador|null findOne(ConnectionInterface $con = null) Return the first ChildColaborador matching the query
 * @method     ChildColaborador findOneOrCreate(ConnectionInterface $con = null) Return the first ChildColaborador matching the query, or a new ChildColaborador object populated from the query conditions when no match is found
 *
 * @method     ChildColaborador|null findOneById(int $id) Return the first ChildColaborador filtered by the id column
 * @method     ChildColaborador|null findOneByNome(string $nome) Return the first ChildColaborador filtered by the nome column
 * @method     ChildColaborador|null findOneByBitrixId(string $bitrix_id) Return the first ChildColaborador filtered by the bitrix_id column *

 * @method     ChildColaborador requirePk($key, ConnectionInterface $con = null) Return the ChildColaborador by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildColaborador requireOne(ConnectionInterface $con = null) Return the first ChildColaborador matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildColaborador requireOneById(int $id) Return the first ChildColaborador filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildColaborador requireOneByNome(string $nome) Return the first ChildColaborador filtered by the nome column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildColaborador requireOneByBitrixId(string $bitrix_id) Return the first ChildColaborador filtered by the bitrix_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildColaborador[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildColaborador objects based on current ModelCriteria
 * @psalm-method ObjectCollection&\Traversable<ChildColaborador> find(ConnectionInterface $con = null) Return ChildColaborador objects based on current ModelCriteria
 * @method     ChildColaborador[]|ObjectCollection findById(int $id) Return ChildColaborador objects filtered by the id column
 * @psalm-method ObjectCollection&\Traversable<ChildColaborador> findById(int $id) Return ChildColaborador objects filtered by the id column
 * @method     ChildColaborador[]|ObjectCollection findByNome(string $nome) Return ChildColaborador objects filtered by the nome column
 * @psalm-method ObjectCollection&\Traversable<ChildColaborador> findByNome(string $nome) Return ChildColaborador objects filtered by the nome column
 * @method     ChildColaborador[]|ObjectCollection findByBitrixId(string $bitrix_id) Return ChildColaborador objects filtered by the bitrix_id column
 * @psalm-method ObjectCollection&\Traversable<ChildColaborador> findByBitrixId(string $bitrix_id) Return ChildColaborador objects filtered by the bitrix_id column
 * @method     ChildColaborador[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildColaborador> paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ColaboradorQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\ColaboradorQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Colaborador', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildColaboradorQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildColaboradorQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildColaboradorQuery) {
            return $criteria;
        }
        $query = new ChildColaboradorQuery();
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
     * @return ChildColaborador|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ColaboradorTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = ColaboradorTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildColaborador A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, nome, bitrix_id FROM colaborador WHERE id = :p0';
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
            /** @var ChildColaborador $obj */
            $obj = new ChildColaborador();
            $obj->hydrate($row);
            ColaboradorTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildColaborador|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildColaboradorQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ColaboradorTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildColaboradorQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ColaboradorTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildColaboradorQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ColaboradorTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ColaboradorTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ColaboradorTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildColaboradorQuery The current query, for fluid interface
     */
    public function filterByNome($nome = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nome)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ColaboradorTableMap::COL_NOME, $nome, $comparison);
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
     * @return $this|ChildColaboradorQuery The current query, for fluid interface
     */
    public function filterByBitrixId($bitrixId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bitrixId)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ColaboradorTableMap::COL_BITRIX_ID, $bitrixId, $comparison);
    }

    /**
     * Filter the query by a related \ColaboradorTecnologia object
     *
     * @param \ColaboradorTecnologia|ObjectCollection $colaboradorTecnologia the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildColaboradorQuery The current query, for fluid interface
     */
    public function filterByColaboradorTecnologia($colaboradorTecnologia, $comparison = null)
    {
        if ($colaboradorTecnologia instanceof \ColaboradorTecnologia) {
            return $this
                ->addUsingAlias(ColaboradorTableMap::COL_ID, $colaboradorTecnologia->getColaboradorId(), $comparison);
        } elseif ($colaboradorTecnologia instanceof ObjectCollection) {
            return $this
                ->useColaboradorTecnologiaQuery()
                ->filterByPrimaryKeys($colaboradorTecnologia->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByColaboradorTecnologia() only accepts arguments of type \ColaboradorTecnologia or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ColaboradorTecnologia relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildColaboradorQuery The current query, for fluid interface
     */
    public function joinColaboradorTecnologia($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ColaboradorTecnologia');

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
            $this->addJoinObject($join, 'ColaboradorTecnologia');
        }

        return $this;
    }

    /**
     * Use the ColaboradorTecnologia relation ColaboradorTecnologia object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ColaboradorTecnologiaQuery A secondary query class using the current class as primary query
     */
    public function useColaboradorTecnologiaQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinColaboradorTecnologia($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ColaboradorTecnologia', '\ColaboradorTecnologiaQuery');
    }

    /**
     * Use the ColaboradorTecnologia relation ColaboradorTecnologia object
     *
     * @param callable(\ColaboradorTecnologiaQuery):\ColaboradorTecnologiaQuery $callable A function working on the related query
     *
     * @param string|null $relationAlias optional alias for the relation
     *
     * @param string|null $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this
     */
    public function withColaboradorTecnologiaQuery(
        callable $callable,
        string $relationAlias = null,
        ?string $joinType = Criteria::LEFT_JOIN
    ) {
        $relatedQuery = $this->useColaboradorTecnologiaQuery(
            $relationAlias,
            $joinType
        );
        $callable($relatedQuery);
        $relatedQuery->endUse();

        return $this;
    }
    /**
     * Use the relation to ColaboradorTecnologia table for an EXISTS query.
     *
     * @see \Propel\Runtime\ActiveQuery\ModelCriteria::useExistsQuery()
     *
     * @param string|null $queryClass Allows to use a custom query class for the exists query, like ExtendedBookQuery::class
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string $typeOfExists Either ExistsCriterion::TYPE_EXISTS or ExistsCriterion::TYPE_NOT_EXISTS
     *
     * @return \ColaboradorTecnologiaQuery The inner query object of the EXISTS statement
     */
    public function useColaboradorTecnologiaExistsQuery($modelAlias = null, $queryClass = null, $typeOfExists = 'EXISTS')
    {
        return $this->useExistsQuery('ColaboradorTecnologia', $modelAlias, $queryClass, $typeOfExists);
    }

    /**
     * Use the relation to ColaboradorTecnologia table for a NOT EXISTS query.
     *
     * @see useColaboradorTecnologiaExistsQuery()
     *
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string|null $queryClass Allows to use a custom query class for the exists query, like ExtendedBookQuery::class
     *
     * @return \ColaboradorTecnologiaQuery The inner query object of the NOT EXISTS statement
     */
    public function useColaboradorTecnologiaNotExistsQuery($modelAlias = null, $queryClass = null)
    {
        return $this->useExistsQuery('ColaboradorTecnologia', $modelAlias, $queryClass, 'NOT EXISTS');
    }
    /**
     * Filter the query by a related \ColaboradorUnidade object
     *
     * @param \ColaboradorUnidade|ObjectCollection $colaboradorUnidade the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildColaboradorQuery The current query, for fluid interface
     */
    public function filterByColaboradorUnidade($colaboradorUnidade, $comparison = null)
    {
        if ($colaboradorUnidade instanceof \ColaboradorUnidade) {
            return $this
                ->addUsingAlias(ColaboradorTableMap::COL_ID, $colaboradorUnidade->getColaboradorId(), $comparison);
        } elseif ($colaboradorUnidade instanceof ObjectCollection) {
            return $this
                ->useColaboradorUnidadeQuery()
                ->filterByPrimaryKeys($colaboradorUnidade->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByColaboradorUnidade() only accepts arguments of type \ColaboradorUnidade or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ColaboradorUnidade relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildColaboradorQuery The current query, for fluid interface
     */
    public function joinColaboradorUnidade($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ColaboradorUnidade');

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
            $this->addJoinObject($join, 'ColaboradorUnidade');
        }

        return $this;
    }

    /**
     * Use the ColaboradorUnidade relation ColaboradorUnidade object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ColaboradorUnidadeQuery A secondary query class using the current class as primary query
     */
    public function useColaboradorUnidadeQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinColaboradorUnidade($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ColaboradorUnidade', '\ColaboradorUnidadeQuery');
    }

    /**
     * Use the ColaboradorUnidade relation ColaboradorUnidade object
     *
     * @param callable(\ColaboradorUnidadeQuery):\ColaboradorUnidadeQuery $callable A function working on the related query
     *
     * @param string|null $relationAlias optional alias for the relation
     *
     * @param string|null $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this
     */
    public function withColaboradorUnidadeQuery(
        callable $callable,
        string $relationAlias = null,
        ?string $joinType = Criteria::LEFT_JOIN
    ) {
        $relatedQuery = $this->useColaboradorUnidadeQuery(
            $relationAlias,
            $joinType
        );
        $callable($relatedQuery);
        $relatedQuery->endUse();

        return $this;
    }
    /**
     * Use the relation to ColaboradorUnidade table for an EXISTS query.
     *
     * @see \Propel\Runtime\ActiveQuery\ModelCriteria::useExistsQuery()
     *
     * @param string|null $queryClass Allows to use a custom query class for the exists query, like ExtendedBookQuery::class
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string $typeOfExists Either ExistsCriterion::TYPE_EXISTS or ExistsCriterion::TYPE_NOT_EXISTS
     *
     * @return \ColaboradorUnidadeQuery The inner query object of the EXISTS statement
     */
    public function useColaboradorUnidadeExistsQuery($modelAlias = null, $queryClass = null, $typeOfExists = 'EXISTS')
    {
        return $this->useExistsQuery('ColaboradorUnidade', $modelAlias, $queryClass, $typeOfExists);
    }

    /**
     * Use the relation to ColaboradorUnidade table for a NOT EXISTS query.
     *
     * @see useColaboradorUnidadeExistsQuery()
     *
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string|null $queryClass Allows to use a custom query class for the exists query, like ExtendedBookQuery::class
     *
     * @return \ColaboradorUnidadeQuery The inner query object of the NOT EXISTS statement
     */
    public function useColaboradorUnidadeNotExistsQuery($modelAlias = null, $queryClass = null)
    {
        return $this->useExistsQuery('ColaboradorUnidade', $modelAlias, $queryClass, 'NOT EXISTS');
    }
    /**
     * Filter the query by a related \Task object
     *
     * @param \Task|ObjectCollection $task the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildColaboradorQuery The current query, for fluid interface
     */
    public function filterByTask($task, $comparison = null)
    {
        if ($task instanceof \Task) {
            return $this
                ->addUsingAlias(ColaboradorTableMap::COL_ID, $task->getResponsibleId(), $comparison);
        } elseif ($task instanceof ObjectCollection) {
            return $this
                ->useTaskQuery()
                ->filterByPrimaryKeys($task->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTask() only accepts arguments of type \Task or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Task relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildColaboradorQuery The current query, for fluid interface
     */
    public function joinTask($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Task');

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
            $this->addJoinObject($join, 'Task');
        }

        return $this;
    }

    /**
     * Use the Task relation Task object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \TaskQuery A secondary query class using the current class as primary query
     */
    public function useTaskQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinTask($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Task', '\TaskQuery');
    }

    /**
     * Use the Task relation Task object
     *
     * @param callable(\TaskQuery):\TaskQuery $callable A function working on the related query
     *
     * @param string|null $relationAlias optional alias for the relation
     *
     * @param string|null $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this
     */
    public function withTaskQuery(
        callable $callable,
        string $relationAlias = null,
        ?string $joinType = Criteria::LEFT_JOIN
    ) {
        $relatedQuery = $this->useTaskQuery(
            $relationAlias,
            $joinType
        );
        $callable($relatedQuery);
        $relatedQuery->endUse();

        return $this;
    }
    /**
     * Use the relation to Task table for an EXISTS query.
     *
     * @see \Propel\Runtime\ActiveQuery\ModelCriteria::useExistsQuery()
     *
     * @param string|null $queryClass Allows to use a custom query class for the exists query, like ExtendedBookQuery::class
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string $typeOfExists Either ExistsCriterion::TYPE_EXISTS or ExistsCriterion::TYPE_NOT_EXISTS
     *
     * @return \TaskQuery The inner query object of the EXISTS statement
     */
    public function useTaskExistsQuery($modelAlias = null, $queryClass = null, $typeOfExists = 'EXISTS')
    {
        return $this->useExistsQuery('Task', $modelAlias, $queryClass, $typeOfExists);
    }

    /**
     * Use the relation to Task table for a NOT EXISTS query.
     *
     * @see useTaskExistsQuery()
     *
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string|null $queryClass Allows to use a custom query class for the exists query, like ExtendedBookQuery::class
     *
     * @return \TaskQuery The inner query object of the NOT EXISTS statement
     */
    public function useTaskNotExistsQuery($modelAlias = null, $queryClass = null)
    {
        return $this->useExistsQuery('Task', $modelAlias, $queryClass, 'NOT EXISTS');
    }
    /**
     * Filter the query by a related \TaskAccomplice object
     *
     * @param \TaskAccomplice|ObjectCollection $taskAccomplice the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildColaboradorQuery The current query, for fluid interface
     */
    public function filterByTaskAccomplice($taskAccomplice, $comparison = null)
    {
        if ($taskAccomplice instanceof \TaskAccomplice) {
            return $this
                ->addUsingAlias(ColaboradorTableMap::COL_ID, $taskAccomplice->getAccompliceId(), $comparison);
        } elseif ($taskAccomplice instanceof ObjectCollection) {
            return $this
                ->useTaskAccompliceQuery()
                ->filterByPrimaryKeys($taskAccomplice->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTaskAccomplice() only accepts arguments of type \TaskAccomplice or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TaskAccomplice relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildColaboradorQuery The current query, for fluid interface
     */
    public function joinTaskAccomplice($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TaskAccomplice');

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
            $this->addJoinObject($join, 'TaskAccomplice');
        }

        return $this;
    }

    /**
     * Use the TaskAccomplice relation TaskAccomplice object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \TaskAccompliceQuery A secondary query class using the current class as primary query
     */
    public function useTaskAccompliceQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinTaskAccomplice($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TaskAccomplice', '\TaskAccompliceQuery');
    }

    /**
     * Use the TaskAccomplice relation TaskAccomplice object
     *
     * @param callable(\TaskAccompliceQuery):\TaskAccompliceQuery $callable A function working on the related query
     *
     * @param string|null $relationAlias optional alias for the relation
     *
     * @param string|null $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this
     */
    public function withTaskAccompliceQuery(
        callable $callable,
        string $relationAlias = null,
        ?string $joinType = Criteria::LEFT_JOIN
    ) {
        $relatedQuery = $this->useTaskAccompliceQuery(
            $relationAlias,
            $joinType
        );
        $callable($relatedQuery);
        $relatedQuery->endUse();

        return $this;
    }
    /**
     * Use the relation to TaskAccomplice table for an EXISTS query.
     *
     * @see \Propel\Runtime\ActiveQuery\ModelCriteria::useExistsQuery()
     *
     * @param string|null $queryClass Allows to use a custom query class for the exists query, like ExtendedBookQuery::class
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string $typeOfExists Either ExistsCriterion::TYPE_EXISTS or ExistsCriterion::TYPE_NOT_EXISTS
     *
     * @return \TaskAccompliceQuery The inner query object of the EXISTS statement
     */
    public function useTaskAccompliceExistsQuery($modelAlias = null, $queryClass = null, $typeOfExists = 'EXISTS')
    {
        return $this->useExistsQuery('TaskAccomplice', $modelAlias, $queryClass, $typeOfExists);
    }

    /**
     * Use the relation to TaskAccomplice table for a NOT EXISTS query.
     *
     * @see useTaskAccompliceExistsQuery()
     *
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string|null $queryClass Allows to use a custom query class for the exists query, like ExtendedBookQuery::class
     *
     * @return \TaskAccompliceQuery The inner query object of the NOT EXISTS statement
     */
    public function useTaskAccompliceNotExistsQuery($modelAlias = null, $queryClass = null)
    {
        return $this->useExistsQuery('TaskAccomplice', $modelAlias, $queryClass, 'NOT EXISTS');
    }
    /**
     * Filter the query by a related \TaskAuditor object
     *
     * @param \TaskAuditor|ObjectCollection $taskAuditor the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildColaboradorQuery The current query, for fluid interface
     */
    public function filterByTaskAuditor($taskAuditor, $comparison = null)
    {
        if ($taskAuditor instanceof \TaskAuditor) {
            return $this
                ->addUsingAlias(ColaboradorTableMap::COL_ID, $taskAuditor->getAuditorId(), $comparison);
        } elseif ($taskAuditor instanceof ObjectCollection) {
            return $this
                ->useTaskAuditorQuery()
                ->filterByPrimaryKeys($taskAuditor->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTaskAuditor() only accepts arguments of type \TaskAuditor or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TaskAuditor relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildColaboradorQuery The current query, for fluid interface
     */
    public function joinTaskAuditor($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TaskAuditor');

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
            $this->addJoinObject($join, 'TaskAuditor');
        }

        return $this;
    }

    /**
     * Use the TaskAuditor relation TaskAuditor object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \TaskAuditorQuery A secondary query class using the current class as primary query
     */
    public function useTaskAuditorQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinTaskAuditor($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TaskAuditor', '\TaskAuditorQuery');
    }

    /**
     * Use the TaskAuditor relation TaskAuditor object
     *
     * @param callable(\TaskAuditorQuery):\TaskAuditorQuery $callable A function working on the related query
     *
     * @param string|null $relationAlias optional alias for the relation
     *
     * @param string|null $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this
     */
    public function withTaskAuditorQuery(
        callable $callable,
        string $relationAlias = null,
        ?string $joinType = Criteria::LEFT_JOIN
    ) {
        $relatedQuery = $this->useTaskAuditorQuery(
            $relationAlias,
            $joinType
        );
        $callable($relatedQuery);
        $relatedQuery->endUse();

        return $this;
    }
    /**
     * Use the relation to TaskAuditor table for an EXISTS query.
     *
     * @see \Propel\Runtime\ActiveQuery\ModelCriteria::useExistsQuery()
     *
     * @param string|null $queryClass Allows to use a custom query class for the exists query, like ExtendedBookQuery::class
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string $typeOfExists Either ExistsCriterion::TYPE_EXISTS or ExistsCriterion::TYPE_NOT_EXISTS
     *
     * @return \TaskAuditorQuery The inner query object of the EXISTS statement
     */
    public function useTaskAuditorExistsQuery($modelAlias = null, $queryClass = null, $typeOfExists = 'EXISTS')
    {
        return $this->useExistsQuery('TaskAuditor', $modelAlias, $queryClass, $typeOfExists);
    }

    /**
     * Use the relation to TaskAuditor table for a NOT EXISTS query.
     *
     * @see useTaskAuditorExistsQuery()
     *
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string|null $queryClass Allows to use a custom query class for the exists query, like ExtendedBookQuery::class
     *
     * @return \TaskAuditorQuery The inner query object of the NOT EXISTS statement
     */
    public function useTaskAuditorNotExistsQuery($modelAlias = null, $queryClass = null)
    {
        return $this->useExistsQuery('TaskAuditor', $modelAlias, $queryClass, 'NOT EXISTS');
    }
    /**
     * Exclude object from result
     *
     * @param   ChildColaborador $colaborador Object to remove from the list of results
     *
     * @return $this|ChildColaboradorQuery The current query, for fluid interface
     */
    public function prune($colaborador = null)
    {
        if ($colaborador) {
            $this->addUsingAlias(ColaboradorTableMap::COL_ID, $colaborador->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the colaborador table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ColaboradorTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ColaboradorTableMap::clearInstancePool();
            ColaboradorTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ColaboradorTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ColaboradorTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ColaboradorTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ColaboradorTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ColaboradorQuery
