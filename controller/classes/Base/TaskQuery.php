<?php

namespace Base;

use \Task as ChildTask;
use \TaskQuery as ChildTaskQuery;
use \Exception;
use \PDO;
use Map\TaskTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'task' table.
 *
 *
 *
 * @method     ChildTaskQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildTaskQuery orderByUsuarioId($order = Criteria::ASC) Order by the usuario_id column
 * @method     ChildTaskQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method     ChildTaskQuery orderByDescript($order = Criteria::ASC) Order by the descript column
 * @method     ChildTaskQuery orderByDeadline($order = Criteria::ASC) Order by the deadline column
 * @method     ChildTaskQuery orderByResponsibleId($order = Criteria::ASC) Order by the responsible_id column
 * @method     ChildTaskQuery orderByGroupId($order = Criteria::ASC) Order by the group_id column
 *
 * @method     ChildTaskQuery groupById() Group by the id column
 * @method     ChildTaskQuery groupByUsuarioId() Group by the usuario_id column
 * @method     ChildTaskQuery groupByTitle() Group by the title column
 * @method     ChildTaskQuery groupByDescript() Group by the descript column
 * @method     ChildTaskQuery groupByDeadline() Group by the deadline column
 * @method     ChildTaskQuery groupByResponsibleId() Group by the responsible_id column
 * @method     ChildTaskQuery groupByGroupId() Group by the group_id column
 *
 * @method     ChildTaskQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildTaskQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildTaskQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildTaskQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildTaskQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildTaskQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildTaskQuery leftJoinColaborador($relationAlias = null) Adds a LEFT JOIN clause to the query using the Colaborador relation
 * @method     ChildTaskQuery rightJoinColaborador($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Colaborador relation
 * @method     ChildTaskQuery innerJoinColaborador($relationAlias = null) Adds a INNER JOIN clause to the query using the Colaborador relation
 *
 * @method     ChildTaskQuery joinWithColaborador($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Colaborador relation
 *
 * @method     ChildTaskQuery leftJoinWithColaborador() Adds a LEFT JOIN clause and with to the query using the Colaborador relation
 * @method     ChildTaskQuery rightJoinWithColaborador() Adds a RIGHT JOIN clause and with to the query using the Colaborador relation
 * @method     ChildTaskQuery innerJoinWithColaborador() Adds a INNER JOIN clause and with to the query using the Colaborador relation
 *
 * @method     ChildTaskQuery leftJoinUsuario($relationAlias = null) Adds a LEFT JOIN clause to the query using the Usuario relation
 * @method     ChildTaskQuery rightJoinUsuario($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Usuario relation
 * @method     ChildTaskQuery innerJoinUsuario($relationAlias = null) Adds a INNER JOIN clause to the query using the Usuario relation
 *
 * @method     ChildTaskQuery joinWithUsuario($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Usuario relation
 *
 * @method     ChildTaskQuery leftJoinWithUsuario() Adds a LEFT JOIN clause and with to the query using the Usuario relation
 * @method     ChildTaskQuery rightJoinWithUsuario() Adds a RIGHT JOIN clause and with to the query using the Usuario relation
 * @method     ChildTaskQuery innerJoinWithUsuario() Adds a INNER JOIN clause and with to the query using the Usuario relation
 *
 * @method     ChildTaskQuery leftJoinTaskAccomplice($relationAlias = null) Adds a LEFT JOIN clause to the query using the TaskAccomplice relation
 * @method     ChildTaskQuery rightJoinTaskAccomplice($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TaskAccomplice relation
 * @method     ChildTaskQuery innerJoinTaskAccomplice($relationAlias = null) Adds a INNER JOIN clause to the query using the TaskAccomplice relation
 *
 * @method     ChildTaskQuery joinWithTaskAccomplice($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the TaskAccomplice relation
 *
 * @method     ChildTaskQuery leftJoinWithTaskAccomplice() Adds a LEFT JOIN clause and with to the query using the TaskAccomplice relation
 * @method     ChildTaskQuery rightJoinWithTaskAccomplice() Adds a RIGHT JOIN clause and with to the query using the TaskAccomplice relation
 * @method     ChildTaskQuery innerJoinWithTaskAccomplice() Adds a INNER JOIN clause and with to the query using the TaskAccomplice relation
 *
 * @method     ChildTaskQuery leftJoinTaskAuditor($relationAlias = null) Adds a LEFT JOIN clause to the query using the TaskAuditor relation
 * @method     ChildTaskQuery rightJoinTaskAuditor($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TaskAuditor relation
 * @method     ChildTaskQuery innerJoinTaskAuditor($relationAlias = null) Adds a INNER JOIN clause to the query using the TaskAuditor relation
 *
 * @method     ChildTaskQuery joinWithTaskAuditor($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the TaskAuditor relation
 *
 * @method     ChildTaskQuery leftJoinWithTaskAuditor() Adds a LEFT JOIN clause and with to the query using the TaskAuditor relation
 * @method     ChildTaskQuery rightJoinWithTaskAuditor() Adds a RIGHT JOIN clause and with to the query using the TaskAuditor relation
 * @method     ChildTaskQuery innerJoinWithTaskAuditor() Adds a INNER JOIN clause and with to the query using the TaskAuditor relation
 *
 * @method     \ColaboradorQuery|\UsuarioQuery|\TaskAccompliceQuery|\TaskAuditorQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildTask|null findOne(ConnectionInterface $con = null) Return the first ChildTask matching the query
 * @method     ChildTask findOneOrCreate(ConnectionInterface $con = null) Return the first ChildTask matching the query, or a new ChildTask object populated from the query conditions when no match is found
 *
 * @method     ChildTask|null findOneById(int $id) Return the first ChildTask filtered by the id column
 * @method     ChildTask|null findOneByUsuarioId(int $usuario_id) Return the first ChildTask filtered by the usuario_id column
 * @method     ChildTask|null findOneByTitle(string $title) Return the first ChildTask filtered by the title column
 * @method     ChildTask|null findOneByDescript(string $descript) Return the first ChildTask filtered by the descript column
 * @method     ChildTask|null findOneByDeadline(string $deadline) Return the first ChildTask filtered by the deadline column
 * @method     ChildTask|null findOneByResponsibleId(int $responsible_id) Return the first ChildTask filtered by the responsible_id column
 * @method     ChildTask|null findOneByGroupId(string $group_id) Return the first ChildTask filtered by the group_id column *

 * @method     ChildTask requirePk($key, ConnectionInterface $con = null) Return the ChildTask by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTask requireOne(ConnectionInterface $con = null) Return the first ChildTask matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTask requireOneById(int $id) Return the first ChildTask filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTask requireOneByUsuarioId(int $usuario_id) Return the first ChildTask filtered by the usuario_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTask requireOneByTitle(string $title) Return the first ChildTask filtered by the title column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTask requireOneByDescript(string $descript) Return the first ChildTask filtered by the descript column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTask requireOneByDeadline(string $deadline) Return the first ChildTask filtered by the deadline column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTask requireOneByResponsibleId(int $responsible_id) Return the first ChildTask filtered by the responsible_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTask requireOneByGroupId(string $group_id) Return the first ChildTask filtered by the group_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTask[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildTask objects based on current ModelCriteria
 * @psalm-method ObjectCollection&\Traversable<ChildTask> find(ConnectionInterface $con = null) Return ChildTask objects based on current ModelCriteria
 * @method     ChildTask[]|ObjectCollection findById(int $id) Return ChildTask objects filtered by the id column
 * @psalm-method ObjectCollection&\Traversable<ChildTask> findById(int $id) Return ChildTask objects filtered by the id column
 * @method     ChildTask[]|ObjectCollection findByUsuarioId(int $usuario_id) Return ChildTask objects filtered by the usuario_id column
 * @psalm-method ObjectCollection&\Traversable<ChildTask> findByUsuarioId(int $usuario_id) Return ChildTask objects filtered by the usuario_id column
 * @method     ChildTask[]|ObjectCollection findByTitle(string $title) Return ChildTask objects filtered by the title column
 * @psalm-method ObjectCollection&\Traversable<ChildTask> findByTitle(string $title) Return ChildTask objects filtered by the title column
 * @method     ChildTask[]|ObjectCollection findByDescript(string $descript) Return ChildTask objects filtered by the descript column
 * @psalm-method ObjectCollection&\Traversable<ChildTask> findByDescript(string $descript) Return ChildTask objects filtered by the descript column
 * @method     ChildTask[]|ObjectCollection findByDeadline(string $deadline) Return ChildTask objects filtered by the deadline column
 * @psalm-method ObjectCollection&\Traversable<ChildTask> findByDeadline(string $deadline) Return ChildTask objects filtered by the deadline column
 * @method     ChildTask[]|ObjectCollection findByResponsibleId(int $responsible_id) Return ChildTask objects filtered by the responsible_id column
 * @psalm-method ObjectCollection&\Traversable<ChildTask> findByResponsibleId(int $responsible_id) Return ChildTask objects filtered by the responsible_id column
 * @method     ChildTask[]|ObjectCollection findByGroupId(string $group_id) Return ChildTask objects filtered by the group_id column
 * @psalm-method ObjectCollection&\Traversable<ChildTask> findByGroupId(string $group_id) Return ChildTask objects filtered by the group_id column
 * @method     ChildTask[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildTask> paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class TaskQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\TaskQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Task', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildTaskQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildTaskQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildTaskQuery) {
            return $criteria;
        }
        $query = new ChildTaskQuery();
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
     * @return ChildTask|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(TaskTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = TaskTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildTask A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, usuario_id, title, descript, deadline, responsible_id, group_id FROM task WHERE id = :p0';
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
            /** @var ChildTask $obj */
            $obj = new ChildTask();
            $obj->hydrate($row);
            TaskTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildTask|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildTaskQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TaskTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildTaskQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TaskTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildTaskQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(TaskTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(TaskTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TaskTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the usuario_id column
     *
     * Example usage:
     * <code>
     * $query->filterByUsuarioId(1234); // WHERE usuario_id = 1234
     * $query->filterByUsuarioId(array(12, 34)); // WHERE usuario_id IN (12, 34)
     * $query->filterByUsuarioId(array('min' => 12)); // WHERE usuario_id > 12
     * </code>
     *
     * @see       filterByUsuario()
     *
     * @param     mixed $usuarioId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTaskQuery The current query, for fluid interface
     */
    public function filterByUsuarioId($usuarioId = null, $comparison = null)
    {
        if (is_array($usuarioId)) {
            $useMinMax = false;
            if (isset($usuarioId['min'])) {
                $this->addUsingAlias(TaskTableMap::COL_USUARIO_ID, $usuarioId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($usuarioId['max'])) {
                $this->addUsingAlias(TaskTableMap::COL_USUARIO_ID, $usuarioId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TaskTableMap::COL_USUARIO_ID, $usuarioId, $comparison);
    }

    /**
     * Filter the query on the title column
     *
     * Example usage:
     * <code>
     * $query->filterByTitle('fooValue');   // WHERE title = 'fooValue'
     * $query->filterByTitle('%fooValue%', Criteria::LIKE); // WHERE title LIKE '%fooValue%'
     * </code>
     *
     * @param     string $title The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTaskQuery The current query, for fluid interface
     */
    public function filterByTitle($title = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($title)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TaskTableMap::COL_TITLE, $title, $comparison);
    }

    /**
     * Filter the query on the descript column
     *
     * Example usage:
     * <code>
     * $query->filterByDescript('fooValue');   // WHERE descript = 'fooValue'
     * $query->filterByDescript('%fooValue%', Criteria::LIKE); // WHERE descript LIKE '%fooValue%'
     * </code>
     *
     * @param     string $descript The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTaskQuery The current query, for fluid interface
     */
    public function filterByDescript($descript = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($descript)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TaskTableMap::COL_DESCRIPT, $descript, $comparison);
    }

    /**
     * Filter the query on the deadline column
     *
     * Example usage:
     * <code>
     * $query->filterByDeadline('fooValue');   // WHERE deadline = 'fooValue'
     * $query->filterByDeadline('%fooValue%', Criteria::LIKE); // WHERE deadline LIKE '%fooValue%'
     * </code>
     *
     * @param     string $deadline The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTaskQuery The current query, for fluid interface
     */
    public function filterByDeadline($deadline = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($deadline)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TaskTableMap::COL_DEADLINE, $deadline, $comparison);
    }

    /**
     * Filter the query on the responsible_id column
     *
     * Example usage:
     * <code>
     * $query->filterByResponsibleId(1234); // WHERE responsible_id = 1234
     * $query->filterByResponsibleId(array(12, 34)); // WHERE responsible_id IN (12, 34)
     * $query->filterByResponsibleId(array('min' => 12)); // WHERE responsible_id > 12
     * </code>
     *
     * @see       filterByColaborador()
     *
     * @param     mixed $responsibleId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTaskQuery The current query, for fluid interface
     */
    public function filterByResponsibleId($responsibleId = null, $comparison = null)
    {
        if (is_array($responsibleId)) {
            $useMinMax = false;
            if (isset($responsibleId['min'])) {
                $this->addUsingAlias(TaskTableMap::COL_RESPONSIBLE_ID, $responsibleId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($responsibleId['max'])) {
                $this->addUsingAlias(TaskTableMap::COL_RESPONSIBLE_ID, $responsibleId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TaskTableMap::COL_RESPONSIBLE_ID, $responsibleId, $comparison);
    }

    /**
     * Filter the query on the group_id column
     *
     * Example usage:
     * <code>
     * $query->filterByGroupId('fooValue');   // WHERE group_id = 'fooValue'
     * $query->filterByGroupId('%fooValue%', Criteria::LIKE); // WHERE group_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $groupId The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTaskQuery The current query, for fluid interface
     */
    public function filterByGroupId($groupId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($groupId)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TaskTableMap::COL_GROUP_ID, $groupId, $comparison);
    }

    /**
     * Filter the query by a related \Colaborador object
     *
     * @param \Colaborador|ObjectCollection $colaborador The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildTaskQuery The current query, for fluid interface
     */
    public function filterByColaborador($colaborador, $comparison = null)
    {
        if ($colaborador instanceof \Colaborador) {
            return $this
                ->addUsingAlias(TaskTableMap::COL_RESPONSIBLE_ID, $colaborador->getId(), $comparison);
        } elseif ($colaborador instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TaskTableMap::COL_RESPONSIBLE_ID, $colaborador->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildTaskQuery The current query, for fluid interface
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
     * Filter the query by a related \Usuario object
     *
     * @param \Usuario|ObjectCollection $usuario The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildTaskQuery The current query, for fluid interface
     */
    public function filterByUsuario($usuario, $comparison = null)
    {
        if ($usuario instanceof \Usuario) {
            return $this
                ->addUsingAlias(TaskTableMap::COL_USUARIO_ID, $usuario->getId(), $comparison);
        } elseif ($usuario instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TaskTableMap::COL_USUARIO_ID, $usuario->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByUsuario() only accepts arguments of type \Usuario or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Usuario relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildTaskQuery The current query, for fluid interface
     */
    public function joinUsuario($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Usuario');

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
            $this->addJoinObject($join, 'Usuario');
        }

        return $this;
    }

    /**
     * Use the Usuario relation Usuario object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \UsuarioQuery A secondary query class using the current class as primary query
     */
    public function useUsuarioQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinUsuario($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Usuario', '\UsuarioQuery');
    }

    /**
     * Use the Usuario relation Usuario object
     *
     * @param callable(\UsuarioQuery):\UsuarioQuery $callable A function working on the related query
     *
     * @param string|null $relationAlias optional alias for the relation
     *
     * @param string|null $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this
     */
    public function withUsuarioQuery(
        callable $callable,
        string $relationAlias = null,
        ?string $joinType = Criteria::LEFT_JOIN
    ) {
        $relatedQuery = $this->useUsuarioQuery(
            $relationAlias,
            $joinType
        );
        $callable($relatedQuery);
        $relatedQuery->endUse();

        return $this;
    }
    /**
     * Use the relation to Usuario table for an EXISTS query.
     *
     * @see \Propel\Runtime\ActiveQuery\ModelCriteria::useExistsQuery()
     *
     * @param string|null $queryClass Allows to use a custom query class for the exists query, like ExtendedBookQuery::class
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string $typeOfExists Either ExistsCriterion::TYPE_EXISTS or ExistsCriterion::TYPE_NOT_EXISTS
     *
     * @return \UsuarioQuery The inner query object of the EXISTS statement
     */
    public function useUsuarioExistsQuery($modelAlias = null, $queryClass = null, $typeOfExists = 'EXISTS')
    {
        return $this->useExistsQuery('Usuario', $modelAlias, $queryClass, $typeOfExists);
    }

    /**
     * Use the relation to Usuario table for a NOT EXISTS query.
     *
     * @see useUsuarioExistsQuery()
     *
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string|null $queryClass Allows to use a custom query class for the exists query, like ExtendedBookQuery::class
     *
     * @return \UsuarioQuery The inner query object of the NOT EXISTS statement
     */
    public function useUsuarioNotExistsQuery($modelAlias = null, $queryClass = null)
    {
        return $this->useExistsQuery('Usuario', $modelAlias, $queryClass, 'NOT EXISTS');
    }
    /**
     * Filter the query by a related \TaskAccomplice object
     *
     * @param \TaskAccomplice|ObjectCollection $taskAccomplice the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildTaskQuery The current query, for fluid interface
     */
    public function filterByTaskAccomplice($taskAccomplice, $comparison = null)
    {
        if ($taskAccomplice instanceof \TaskAccomplice) {
            return $this
                ->addUsingAlias(TaskTableMap::COL_ID, $taskAccomplice->getTaskId(), $comparison);
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
     * @return $this|ChildTaskQuery The current query, for fluid interface
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
     * @return ChildTaskQuery The current query, for fluid interface
     */
    public function filterByTaskAuditor($taskAuditor, $comparison = null)
    {
        if ($taskAuditor instanceof \TaskAuditor) {
            return $this
                ->addUsingAlias(TaskTableMap::COL_ID, $taskAuditor->getTaskId(), $comparison);
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
     * @return $this|ChildTaskQuery The current query, for fluid interface
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
     * @param   ChildTask $task Object to remove from the list of results
     *
     * @return $this|ChildTaskQuery The current query, for fluid interface
     */
    public function prune($task = null)
    {
        if ($task) {
            $this->addUsingAlias(TaskTableMap::COL_ID, $task->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the task table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TaskTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            TaskTableMap::clearInstancePool();
            TaskTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(TaskTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(TaskTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            TaskTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            TaskTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // TaskQuery
