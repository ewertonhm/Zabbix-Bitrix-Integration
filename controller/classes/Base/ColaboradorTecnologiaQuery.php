<?php

namespace Base;

use \ColaboradorTecnologia as ChildColaboradorTecnologia;
use \ColaboradorTecnologiaQuery as ChildColaboradorTecnologiaQuery;
use \Exception;
use \PDO;
use Map\ColaboradorTecnologiaTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'colaborador_tecnologia' table.
 *
 *
 *
 * @method     ChildColaboradorTecnologiaQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildColaboradorTecnologiaQuery orderByTecnologiaId($order = Criteria::ASC) Order by the tecnologia_id column
 * @method     ChildColaboradorTecnologiaQuery orderByColaboradorId($order = Criteria::ASC) Order by the colaborador_id column
 *
 * @method     ChildColaboradorTecnologiaQuery groupById() Group by the id column
 * @method     ChildColaboradorTecnologiaQuery groupByTecnologiaId() Group by the tecnologia_id column
 * @method     ChildColaboradorTecnologiaQuery groupByColaboradorId() Group by the colaborador_id column
 *
 * @method     ChildColaboradorTecnologiaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildColaboradorTecnologiaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildColaboradorTecnologiaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildColaboradorTecnologiaQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildColaboradorTecnologiaQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildColaboradorTecnologiaQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildColaboradorTecnologiaQuery leftJoinColaborador($relationAlias = null) Adds a LEFT JOIN clause to the query using the Colaborador relation
 * @method     ChildColaboradorTecnologiaQuery rightJoinColaborador($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Colaborador relation
 * @method     ChildColaboradorTecnologiaQuery innerJoinColaborador($relationAlias = null) Adds a INNER JOIN clause to the query using the Colaborador relation
 *
 * @method     ChildColaboradorTecnologiaQuery joinWithColaborador($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Colaborador relation
 *
 * @method     ChildColaboradorTecnologiaQuery leftJoinWithColaborador() Adds a LEFT JOIN clause and with to the query using the Colaborador relation
 * @method     ChildColaboradorTecnologiaQuery rightJoinWithColaborador() Adds a RIGHT JOIN clause and with to the query using the Colaborador relation
 * @method     ChildColaboradorTecnologiaQuery innerJoinWithColaborador() Adds a INNER JOIN clause and with to the query using the Colaborador relation
 *
 * @method     ChildColaboradorTecnologiaQuery leftJoinTecnologia($relationAlias = null) Adds a LEFT JOIN clause to the query using the Tecnologia relation
 * @method     ChildColaboradorTecnologiaQuery rightJoinTecnologia($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Tecnologia relation
 * @method     ChildColaboradorTecnologiaQuery innerJoinTecnologia($relationAlias = null) Adds a INNER JOIN clause to the query using the Tecnologia relation
 *
 * @method     ChildColaboradorTecnologiaQuery joinWithTecnologia($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Tecnologia relation
 *
 * @method     ChildColaboradorTecnologiaQuery leftJoinWithTecnologia() Adds a LEFT JOIN clause and with to the query using the Tecnologia relation
 * @method     ChildColaboradorTecnologiaQuery rightJoinWithTecnologia() Adds a RIGHT JOIN clause and with to the query using the Tecnologia relation
 * @method     ChildColaboradorTecnologiaQuery innerJoinWithTecnologia() Adds a INNER JOIN clause and with to the query using the Tecnologia relation
 *
 * @method     \ColaboradorQuery|\TecnologiaQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildColaboradorTecnologia|null findOne(ConnectionInterface $con = null) Return the first ChildColaboradorTecnologia matching the query
 * @method     ChildColaboradorTecnologia findOneOrCreate(ConnectionInterface $con = null) Return the first ChildColaboradorTecnologia matching the query, or a new ChildColaboradorTecnologia object populated from the query conditions when no match is found
 *
 * @method     ChildColaboradorTecnologia|null findOneById(int $id) Return the first ChildColaboradorTecnologia filtered by the id column
 * @method     ChildColaboradorTecnologia|null findOneByTecnologiaId(int $tecnologia_id) Return the first ChildColaboradorTecnologia filtered by the tecnologia_id column
 * @method     ChildColaboradorTecnologia|null findOneByColaboradorId(int $colaborador_id) Return the first ChildColaboradorTecnologia filtered by the colaborador_id column *

 * @method     ChildColaboradorTecnologia requirePk($key, ConnectionInterface $con = null) Return the ChildColaboradorTecnologia by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildColaboradorTecnologia requireOne(ConnectionInterface $con = null) Return the first ChildColaboradorTecnologia matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildColaboradorTecnologia requireOneById(int $id) Return the first ChildColaboradorTecnologia filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildColaboradorTecnologia requireOneByTecnologiaId(int $tecnologia_id) Return the first ChildColaboradorTecnologia filtered by the tecnologia_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildColaboradorTecnologia requireOneByColaboradorId(int $colaborador_id) Return the first ChildColaboradorTecnologia filtered by the colaborador_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildColaboradorTecnologia[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildColaboradorTecnologia objects based on current ModelCriteria
 * @psalm-method ObjectCollection&\Traversable<ChildColaboradorTecnologia> find(ConnectionInterface $con = null) Return ChildColaboradorTecnologia objects based on current ModelCriteria
 * @method     ChildColaboradorTecnologia[]|ObjectCollection findById(int $id) Return ChildColaboradorTecnologia objects filtered by the id column
 * @psalm-method ObjectCollection&\Traversable<ChildColaboradorTecnologia> findById(int $id) Return ChildColaboradorTecnologia objects filtered by the id column
 * @method     ChildColaboradorTecnologia[]|ObjectCollection findByTecnologiaId(int $tecnologia_id) Return ChildColaboradorTecnologia objects filtered by the tecnologia_id column
 * @psalm-method ObjectCollection&\Traversable<ChildColaboradorTecnologia> findByTecnologiaId(int $tecnologia_id) Return ChildColaboradorTecnologia objects filtered by the tecnologia_id column
 * @method     ChildColaboradorTecnologia[]|ObjectCollection findByColaboradorId(int $colaborador_id) Return ChildColaboradorTecnologia objects filtered by the colaborador_id column
 * @psalm-method ObjectCollection&\Traversable<ChildColaboradorTecnologia> findByColaboradorId(int $colaborador_id) Return ChildColaboradorTecnologia objects filtered by the colaborador_id column
 * @method     ChildColaboradorTecnologia[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildColaboradorTecnologia> paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ColaboradorTecnologiaQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\ColaboradorTecnologiaQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\ColaboradorTecnologia', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildColaboradorTecnologiaQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildColaboradorTecnologiaQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildColaboradorTecnologiaQuery) {
            return $criteria;
        }
        $query = new ChildColaboradorTecnologiaQuery();
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
     * @return ChildColaboradorTecnologia|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ColaboradorTecnologiaTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = ColaboradorTecnologiaTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildColaboradorTecnologia A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, tecnologia_id, colaborador_id FROM colaborador_tecnologia WHERE id = :p0';
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
            /** @var ChildColaboradorTecnologia $obj */
            $obj = new ChildColaboradorTecnologia();
            $obj->hydrate($row);
            ColaboradorTecnologiaTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildColaboradorTecnologia|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildColaboradorTecnologiaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ColaboradorTecnologiaTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildColaboradorTecnologiaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ColaboradorTecnologiaTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildColaboradorTecnologiaQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ColaboradorTecnologiaTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ColaboradorTecnologiaTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ColaboradorTecnologiaTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the tecnologia_id column
     *
     * Example usage:
     * <code>
     * $query->filterByTecnologiaId(1234); // WHERE tecnologia_id = 1234
     * $query->filterByTecnologiaId(array(12, 34)); // WHERE tecnologia_id IN (12, 34)
     * $query->filterByTecnologiaId(array('min' => 12)); // WHERE tecnologia_id > 12
     * </code>
     *
     * @see       filterByTecnologia()
     *
     * @param     mixed $tecnologiaId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildColaboradorTecnologiaQuery The current query, for fluid interface
     */
    public function filterByTecnologiaId($tecnologiaId = null, $comparison = null)
    {
        if (is_array($tecnologiaId)) {
            $useMinMax = false;
            if (isset($tecnologiaId['min'])) {
                $this->addUsingAlias(ColaboradorTecnologiaTableMap::COL_TECNOLOGIA_ID, $tecnologiaId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tecnologiaId['max'])) {
                $this->addUsingAlias(ColaboradorTecnologiaTableMap::COL_TECNOLOGIA_ID, $tecnologiaId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ColaboradorTecnologiaTableMap::COL_TECNOLOGIA_ID, $tecnologiaId, $comparison);
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
     * @see       filterByColaborador()
     *
     * @param     mixed $colaboradorId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildColaboradorTecnologiaQuery The current query, for fluid interface
     */
    public function filterByColaboradorId($colaboradorId = null, $comparison = null)
    {
        if (is_array($colaboradorId)) {
            $useMinMax = false;
            if (isset($colaboradorId['min'])) {
                $this->addUsingAlias(ColaboradorTecnologiaTableMap::COL_COLABORADOR_ID, $colaboradorId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($colaboradorId['max'])) {
                $this->addUsingAlias(ColaboradorTecnologiaTableMap::COL_COLABORADOR_ID, $colaboradorId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ColaboradorTecnologiaTableMap::COL_COLABORADOR_ID, $colaboradorId, $comparison);
    }

    /**
     * Filter the query by a related \Colaborador object
     *
     * @param \Colaborador|ObjectCollection $colaborador The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildColaboradorTecnologiaQuery The current query, for fluid interface
     */
    public function filterByColaborador($colaborador, $comparison = null)
    {
        if ($colaborador instanceof \Colaborador) {
            return $this
                ->addUsingAlias(ColaboradorTecnologiaTableMap::COL_COLABORADOR_ID, $colaborador->getId(), $comparison);
        } elseif ($colaborador instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ColaboradorTecnologiaTableMap::COL_COLABORADOR_ID, $colaborador->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByColaborador() only accepts arguments of type \Colaborador or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Colaborador relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildColaboradorTecnologiaQuery The current query, for fluid interface
     */
    public function joinColaborador($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Colaborador');

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
            $this->addJoinObject($join, 'Colaborador');
        }

        return $this;
    }

    /**
     * Use the Colaborador relation Colaborador object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ColaboradorQuery A secondary query class using the current class as primary query
     */
    public function useColaboradorQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinColaborador($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Colaborador', '\ColaboradorQuery');
    }

    /**
     * Use the Colaborador relation Colaborador object
     *
     * @param callable(\ColaboradorQuery):\ColaboradorQuery $callable A function working on the related query
     *
     * @param string|null $relationAlias optional alias for the relation
     *
     * @param string|null $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this
     */
    public function withColaboradorQuery(
        callable $callable,
        string $relationAlias = null,
        ?string $joinType = Criteria::LEFT_JOIN
    ) {
        $relatedQuery = $this->useColaboradorQuery(
            $relationAlias,
            $joinType
        );
        $callable($relatedQuery);
        $relatedQuery->endUse();

        return $this;
    }
    /**
     * Use the relation to Colaborador table for an EXISTS query.
     *
     * @see \Propel\Runtime\ActiveQuery\ModelCriteria::useExistsQuery()
     *
     * @param string|null $queryClass Allows to use a custom query class for the exists query, like ExtendedBookQuery::class
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string $typeOfExists Either ExistsCriterion::TYPE_EXISTS or ExistsCriterion::TYPE_NOT_EXISTS
     *
     * @return \ColaboradorQuery The inner query object of the EXISTS statement
     */
    public function useColaboradorExistsQuery($modelAlias = null, $queryClass = null, $typeOfExists = 'EXISTS')
    {
        return $this->useExistsQuery('Colaborador', $modelAlias, $queryClass, $typeOfExists);
    }

    /**
     * Use the relation to Colaborador table for a NOT EXISTS query.
     *
     * @see useColaboradorExistsQuery()
     *
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string|null $queryClass Allows to use a custom query class for the exists query, like ExtendedBookQuery::class
     *
     * @return \ColaboradorQuery The inner query object of the NOT EXISTS statement
     */
    public function useColaboradorNotExistsQuery($modelAlias = null, $queryClass = null)
    {
        return $this->useExistsQuery('Colaborador', $modelAlias, $queryClass, 'NOT EXISTS');
    }
    /**
     * Filter the query by a related \Tecnologia object
     *
     * @param \Tecnologia|ObjectCollection $tecnologia The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildColaboradorTecnologiaQuery The current query, for fluid interface
     */
    public function filterByTecnologia($tecnologia, $comparison = null)
    {
        if ($tecnologia instanceof \Tecnologia) {
            return $this
                ->addUsingAlias(ColaboradorTecnologiaTableMap::COL_TECNOLOGIA_ID, $tecnologia->getId(), $comparison);
        } elseif ($tecnologia instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ColaboradorTecnologiaTableMap::COL_TECNOLOGIA_ID, $tecnologia->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByTecnologia() only accepts arguments of type \Tecnologia or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Tecnologia relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildColaboradorTecnologiaQuery The current query, for fluid interface
     */
    public function joinTecnologia($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Tecnologia');

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
            $this->addJoinObject($join, 'Tecnologia');
        }

        return $this;
    }

    /**
     * Use the Tecnologia relation Tecnologia object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \TecnologiaQuery A secondary query class using the current class as primary query
     */
    public function useTecnologiaQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinTecnologia($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Tecnologia', '\TecnologiaQuery');
    }

    /**
     * Use the Tecnologia relation Tecnologia object
     *
     * @param callable(\TecnologiaQuery):\TecnologiaQuery $callable A function working on the related query
     *
     * @param string|null $relationAlias optional alias for the relation
     *
     * @param string|null $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this
     */
    public function withTecnologiaQuery(
        callable $callable,
        string $relationAlias = null,
        ?string $joinType = Criteria::LEFT_JOIN
    ) {
        $relatedQuery = $this->useTecnologiaQuery(
            $relationAlias,
            $joinType
        );
        $callable($relatedQuery);
        $relatedQuery->endUse();

        return $this;
    }
    /**
     * Use the relation to Tecnologia table for an EXISTS query.
     *
     * @see \Propel\Runtime\ActiveQuery\ModelCriteria::useExistsQuery()
     *
     * @param string|null $queryClass Allows to use a custom query class for the exists query, like ExtendedBookQuery::class
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string $typeOfExists Either ExistsCriterion::TYPE_EXISTS or ExistsCriterion::TYPE_NOT_EXISTS
     *
     * @return \TecnologiaQuery The inner query object of the EXISTS statement
     */
    public function useTecnologiaExistsQuery($modelAlias = null, $queryClass = null, $typeOfExists = 'EXISTS')
    {
        return $this->useExistsQuery('Tecnologia', $modelAlias, $queryClass, $typeOfExists);
    }

    /**
     * Use the relation to Tecnologia table for a NOT EXISTS query.
     *
     * @see useTecnologiaExistsQuery()
     *
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string|null $queryClass Allows to use a custom query class for the exists query, like ExtendedBookQuery::class
     *
     * @return \TecnologiaQuery The inner query object of the NOT EXISTS statement
     */
    public function useTecnologiaNotExistsQuery($modelAlias = null, $queryClass = null)
    {
        return $this->useExistsQuery('Tecnologia', $modelAlias, $queryClass, 'NOT EXISTS');
    }
    /**
     * Exclude object from result
     *
     * @param   ChildColaboradorTecnologia $colaboradorTecnologia Object to remove from the list of results
     *
     * @return $this|ChildColaboradorTecnologiaQuery The current query, for fluid interface
     */
    public function prune($colaboradorTecnologia = null)
    {
        if ($colaboradorTecnologia) {
            $this->addUsingAlias(ColaboradorTecnologiaTableMap::COL_ID, $colaboradorTecnologia->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the colaborador_tecnologia table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ColaboradorTecnologiaTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ColaboradorTecnologiaTableMap::clearInstancePool();
            ColaboradorTecnologiaTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ColaboradorTecnologiaTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ColaboradorTecnologiaTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ColaboradorTecnologiaTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ColaboradorTecnologiaTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ColaboradorTecnologiaQuery
