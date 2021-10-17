<?php

namespace Base;

use \Colaborador as ChildColaborador;
use \ColaboradorQuery as ChildColaboradorQuery;
use \Task as ChildTask;
use \TaskAccomplice as ChildTaskAccomplice;
use \TaskAccompliceQuery as ChildTaskAccompliceQuery;
use \TaskAuditor as ChildTaskAuditor;
use \TaskAuditorQuery as ChildTaskAuditorQuery;
use \TaskQuery as ChildTaskQuery;
use \Usuario as ChildUsuario;
use \UsuarioQuery as ChildUsuarioQuery;
use \Exception;
use \PDO;
use Map\TaskAccompliceTableMap;
use Map\TaskAuditorTableMap;
use Map\TaskTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\BadMethodCallException;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Parser\AbstractParser;

/**
 * Base class that represents a row from the 'task' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class Task implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\TaskTableMap';


    /**
     * attribute to determine if this object has previously been saved.
     * @var boolean
     */
    protected $new = true;

    /**
     * attribute to determine whether this object has been deleted.
     * @var boolean
     */
    protected $deleted = false;

    /**
     * The columns that have been modified in current object.
     * Tracking modified columns allows us to only update modified columns.
     * @var array
     */
    protected $modifiedColumns = array();

    /**
     * The (virtual) columns that are added at runtime
     * The formatters can add supplementary columns based on a resultset
     * @var array
     */
    protected $virtualColumns = array();

    /**
     * The value for the id field.
     *
     * @var        int
     */
    protected $id;

    /**
     * The value for the usuario_id field.
     *
     * @var        int|null
     */
    protected $usuario_id;

    /**
     * The value for the title field.
     *
     * @var        string
     */
    protected $title;

    /**
     * The value for the descript field.
     *
     * @var        string
     */
    protected $descript;

    /**
     * The value for the deadline field.
     *
     * @var        string|null
     */
    protected $deadline;

    /**
     * The value for the responsible_id field.
     *
     * @var        int|null
     */
    protected $responsible_id;

    /**
     * The value for the group_id field.
     *
     * @var        string|null
     */
    protected $group_id;

    /**
     * @var        ChildColaborador
     */
    protected $aColaborador;

    /**
     * @var        ChildUsuario
     */
    protected $aUsuario;

    /**
     * @var        ObjectCollection|ChildTaskAccomplice[] Collection to store aggregation of ChildTaskAccomplice objects.
     * @phpstan-var ObjectCollection&\Traversable<ChildTaskAccomplice> Collection to store aggregation of ChildTaskAccomplice objects.
     */
    protected $collTaskAccomplices;
    protected $collTaskAccomplicesPartial;

    /**
     * @var        ObjectCollection|ChildTaskAuditor[] Collection to store aggregation of ChildTaskAuditor objects.
     * @phpstan-var ObjectCollection&\Traversable<ChildTaskAuditor> Collection to store aggregation of ChildTaskAuditor objects.
     */
    protected $collTaskAuditors;
    protected $collTaskAuditorsPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildTaskAccomplice[]
     * @phpstan-var ObjectCollection&\Traversable<ChildTaskAccomplice>
     */
    protected $taskAccomplicesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildTaskAuditor[]
     * @phpstan-var ObjectCollection&\Traversable<ChildTaskAuditor>
     */
    protected $taskAuditorsScheduledForDeletion = null;

    /**
     * Initializes internal state of Base\Task object.
     */
    public function __construct()
    {
    }

    /**
     * Returns whether the object has been modified.
     *
     * @return boolean True if the object has been modified.
     */
    public function isModified()
    {
        return !!$this->modifiedColumns;
    }

    /**
     * Has specified column been modified?
     *
     * @param  string  $col column fully qualified name (TableMap::TYPE_COLNAME), e.g. Book::AUTHOR_ID
     * @return boolean True if $col has been modified.
     */
    public function isColumnModified($col)
    {
        return $this->modifiedColumns && isset($this->modifiedColumns[$col]);
    }

    /**
     * Get the columns that have been modified in this object.
     * @return array A unique list of the modified column names for this object.
     */
    public function getModifiedColumns()
    {
        return $this->modifiedColumns ? array_keys($this->modifiedColumns) : [];
    }

    /**
     * Returns whether the object has ever been saved.  This will
     * be false, if the object was retrieved from storage or was created
     * and then saved.
     *
     * @return boolean true, if the object has never been persisted.
     */
    public function isNew()
    {
        return $this->new;
    }

    /**
     * Setter for the isNew attribute.  This method will be called
     * by Propel-generated children and objects.
     *
     * @param boolean $b the state of the object.
     */
    public function setNew($b)
    {
        $this->new = (boolean) $b;
    }

    /**
     * Whether this object has been deleted.
     * @return boolean The deleted state of this object.
     */
    public function isDeleted()
    {
        return $this->deleted;
    }

    /**
     * Specify whether this object has been deleted.
     * @param  boolean $b The deleted state of this object.
     * @return void
     */
    public function setDeleted($b)
    {
        $this->deleted = (boolean) $b;
    }

    /**
     * Sets the modified state for the object to be false.
     * @param  string $col If supplied, only the specified column is reset.
     * @return void
     */
    public function resetModified($col = null)
    {
        if (null !== $col) {
            unset($this->modifiedColumns[$col]);
        } else {
            $this->modifiedColumns = array();
        }
    }

    /**
     * Compares this with another <code>Task</code> instance.  If
     * <code>obj</code> is an instance of <code>Task</code>, delegates to
     * <code>equals(Task)</code>.  Otherwise, returns <code>false</code>.
     *
     * @param  mixed   $obj The object to compare to.
     * @return boolean Whether equal to the object specified.
     */
    public function equals($obj)
    {
        if (!$obj instanceof static) {
            return false;
        }

        if ($this === $obj) {
            return true;
        }

        if (null === $this->getPrimaryKey() || null === $obj->getPrimaryKey()) {
            return false;
        }

        return $this->getPrimaryKey() === $obj->getPrimaryKey();
    }

    /**
     * Get the associative array of the virtual columns in this object
     *
     * @return array
     */
    public function getVirtualColumns()
    {
        return $this->virtualColumns;
    }

    /**
     * Checks the existence of a virtual column in this object
     *
     * @param  string  $name The virtual column name
     * @return boolean
     */
    public function hasVirtualColumn($name)
    {
        return array_key_exists($name, $this->virtualColumns);
    }

    /**
     * Get the value of a virtual column in this object
     *
     * @param  string $name The virtual column name
     * @return mixed
     *
     * @throws PropelException
     */
    public function getVirtualColumn($name)
    {
        if (!$this->hasVirtualColumn($name)) {
            throw new PropelException(sprintf('Cannot get value of inexistent virtual column %s.', $name));
        }

        return $this->virtualColumns[$name];
    }

    /**
     * Set the value of a virtual column in this object
     *
     * @param string $name  The virtual column name
     * @param mixed  $value The value to give to the virtual column
     *
     * @return $this The current object, for fluid interface
     */
    public function setVirtualColumn($name, $value)
    {
        $this->virtualColumns[$name] = $value;

        return $this;
    }

    /**
     * Logs a message using Propel::log().
     *
     * @param  string  $msg
     * @param  int     $priority One of the Propel::LOG_* logging levels
     * @return void
     */
    protected function log($msg, $priority = Propel::LOG_INFO)
    {
        Propel::log(get_class($this) . ': ' . $msg, $priority);
    }

    /**
     * Export the current object properties to a string, using a given parser format
     * <code>
     * $book = BookQuery::create()->findPk(9012);
     * echo $book->exportTo('JSON');
     *  => {"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * @param  mixed   $parser                 A AbstractParser instance, or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param  boolean $includeLazyLoadColumns (optional) Whether to include lazy load(ed) columns. Defaults to TRUE.
     * @param  string  $keyType                (optional) One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME, TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM. Defaults to TableMap::TYPE_PHPNAME.
     * @return string  The exported data
     */
    public function exportTo($parser, $includeLazyLoadColumns = true, $keyType = TableMap::TYPE_PHPNAME)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        return $parser->fromArray($this->toArray($keyType, $includeLazyLoadColumns, array(), true));
    }

    /**
     * Clean up internal collections prior to serializing
     * Avoids recursive loops that turn into segmentation faults when serializing
     */
    public function __sleep()
    {
        $this->clearAllReferences();

        $cls = new \ReflectionClass($this);
        $propertyNames = [];
        $serializableProperties = array_diff($cls->getProperties(), $cls->getProperties(\ReflectionProperty::IS_STATIC));

        foreach($serializableProperties as $property) {
            $propertyNames[] = $property->getName();
        }

        return $propertyNames;
    }

    /**
     * Get the [id] column value.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the [usuario_id] column value.
     *
     * @return int|null
     */
    public function getUsuarioId()
    {
        return $this->usuario_id;
    }

    /**
     * Get the [title] column value.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Get the [descript] column value.
     *
     * @return string
     */
    public function getDescript()
    {
        return $this->descript;
    }

    /**
     * Get the [deadline] column value.
     *
     * @return string|null
     */
    public function getDeadline()
    {
        return $this->deadline;
    }

    /**
     * Get the [responsible_id] column value.
     *
     * @return int|null
     */
    public function getResponsibleId()
    {
        return $this->responsible_id;
    }

    /**
     * Get the [group_id] column value.
     *
     * @return string|null
     */
    public function getGroupId()
    {
        return $this->group_id;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v New value
     * @return $this|\Task The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[TaskTableMap::COL_ID] = true;
        }

        return $this;
    } // setId()

    /**
     * Set the value of [usuario_id] column.
     *
     * @param int|null $v New value
     * @return $this|\Task The current object (for fluent API support)
     */
    public function setUsuarioId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->usuario_id !== $v) {
            $this->usuario_id = $v;
            $this->modifiedColumns[TaskTableMap::COL_USUARIO_ID] = true;
        }

        if ($this->aUsuario !== null && $this->aUsuario->getId() !== $v) {
            $this->aUsuario = null;
        }

        return $this;
    } // setUsuarioId()

    /**
     * Set the value of [title] column.
     *
     * @param string $v New value
     * @return $this|\Task The current object (for fluent API support)
     */
    public function setTitle($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->title !== $v) {
            $this->title = $v;
            $this->modifiedColumns[TaskTableMap::COL_TITLE] = true;
        }

        return $this;
    } // setTitle()

    /**
     * Set the value of [descript] column.
     *
     * @param string $v New value
     * @return $this|\Task The current object (for fluent API support)
     */
    public function setDescript($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->descript !== $v) {
            $this->descript = $v;
            $this->modifiedColumns[TaskTableMap::COL_DESCRIPT] = true;
        }

        return $this;
    } // setDescript()

    /**
     * Set the value of [deadline] column.
     *
     * @param string|null $v New value
     * @return $this|\Task The current object (for fluent API support)
     */
    public function setDeadline($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->deadline !== $v) {
            $this->deadline = $v;
            $this->modifiedColumns[TaskTableMap::COL_DEADLINE] = true;
        }

        return $this;
    } // setDeadline()

    /**
     * Set the value of [responsible_id] column.
     *
     * @param int|null $v New value
     * @return $this|\Task The current object (for fluent API support)
     */
    public function setResponsibleId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->responsible_id !== $v) {
            $this->responsible_id = $v;
            $this->modifiedColumns[TaskTableMap::COL_RESPONSIBLE_ID] = true;
        }

        if ($this->aColaborador !== null && $this->aColaborador->getId() !== $v) {
            $this->aColaborador = null;
        }

        return $this;
    } // setResponsibleId()

    /**
     * Set the value of [group_id] column.
     *
     * @param string|null $v New value
     * @return $this|\Task The current object (for fluent API support)
     */
    public function setGroupId($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->group_id !== $v) {
            $this->group_id = $v;
            $this->modifiedColumns[TaskTableMap::COL_GROUP_ID] = true;
        }

        return $this;
    } // setGroupId()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
        // otherwise, everything was equal, so return TRUE
        return true;
    } // hasOnlyDefaultValues()

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param array   $row       The row returned by DataFetcher->fetch().
     * @param int     $startcol  0-based offset column which indicates which restultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @param string  $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                  One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                            TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false, $indexType = TableMap::TYPE_NUM)
    {
        try {

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : TaskTableMap::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : TaskTableMap::translateFieldName('UsuarioId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->usuario_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : TaskTableMap::translateFieldName('Title', TableMap::TYPE_PHPNAME, $indexType)];
            $this->title = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : TaskTableMap::translateFieldName('Descript', TableMap::TYPE_PHPNAME, $indexType)];
            $this->descript = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : TaskTableMap::translateFieldName('Deadline', TableMap::TYPE_PHPNAME, $indexType)];
            $this->deadline = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : TaskTableMap::translateFieldName('ResponsibleId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->responsible_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : TaskTableMap::translateFieldName('GroupId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->group_id = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 7; // 7 = TaskTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Task'), 0, $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws PropelException
     */
    public function ensureConsistency()
    {
        if ($this->aUsuario !== null && $this->usuario_id !== $this->aUsuario->getId()) {
            $this->aUsuario = null;
        }
        if ($this->aColaborador !== null && $this->responsible_id !== $this->aColaborador->getId()) {
            $this->aColaborador = null;
        }
    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param      boolean $deep (optional) Whether to also de-associated any related objects.
     * @param      ConnectionInterface $con (optional) The ConnectionInterface connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(TaskTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildTaskQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aColaborador = null;
            $this->aUsuario = null;
            $this->collTaskAccomplices = null;

            $this->collTaskAuditors = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see Task::setDeleted()
     * @see Task::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(TaskTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildTaskQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $this->setDeleted(true);
            }
        });
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see doSave()
     */
    public function save(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($this->alreadyInSave) {
            return 0;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(TaskTableMap::DATABASE_NAME);
        }

        return $con->transaction(function () use ($con) {
            $ret = $this->preSave($con);
            $isInsert = $this->isNew();
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
            } else {
                $ret = $ret && $this->preUpdate($con);
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                TaskTableMap::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }

            return $affectedRows;
        });
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see save()
     */
    protected function doSave(ConnectionInterface $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            // We call the save method on the following object(s) if they
            // were passed to this object by their corresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aColaborador !== null) {
                if ($this->aColaborador->isModified() || $this->aColaborador->isNew()) {
                    $affectedRows += $this->aColaborador->save($con);
                }
                $this->setColaborador($this->aColaborador);
            }

            if ($this->aUsuario !== null) {
                if ($this->aUsuario->isModified() || $this->aUsuario->isNew()) {
                    $affectedRows += $this->aUsuario->save($con);
                }
                $this->setUsuario($this->aUsuario);
            }

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                    $affectedRows += 1;
                } else {
                    $affectedRows += $this->doUpdate($con);
                }
                $this->resetModified();
            }

            if ($this->taskAccomplicesScheduledForDeletion !== null) {
                if (!$this->taskAccomplicesScheduledForDeletion->isEmpty()) {
                    foreach ($this->taskAccomplicesScheduledForDeletion as $taskAccomplice) {
                        // need to save related object because we set the relation to null
                        $taskAccomplice->save($con);
                    }
                    $this->taskAccomplicesScheduledForDeletion = null;
                }
            }

            if ($this->collTaskAccomplices !== null) {
                foreach ($this->collTaskAccomplices as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->taskAuditorsScheduledForDeletion !== null) {
                if (!$this->taskAuditorsScheduledForDeletion->isEmpty()) {
                    foreach ($this->taskAuditorsScheduledForDeletion as $taskAuditor) {
                        // need to save related object because we set the relation to null
                        $taskAuditor->save($con);
                    }
                    $this->taskAuditorsScheduledForDeletion = null;
                }
            }

            if ($this->collTaskAuditors !== null) {
                foreach ($this->collTaskAuditors as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @throws PropelException
     * @see doSave()
     */
    protected function doInsert(ConnectionInterface $con)
    {
        $modifiedColumns = array();
        $index = 0;

        $this->modifiedColumns[TaskTableMap::COL_ID] = true;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . TaskTableMap::COL_ID . ')');
        }
        if (null === $this->id) {
            try {
                $dataFetcher = $con->query("SELECT nextval('task_id_seq')");
                $this->id = (int) $dataFetcher->fetchColumn();
            } catch (Exception $e) {
                throw new PropelException('Unable to get sequence id.', 0, $e);
            }
        }


         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(TaskTableMap::COL_ID)) {
            $modifiedColumns[':p' . $index++]  = 'id';
        }
        if ($this->isColumnModified(TaskTableMap::COL_USUARIO_ID)) {
            $modifiedColumns[':p' . $index++]  = 'usuario_id';
        }
        if ($this->isColumnModified(TaskTableMap::COL_TITLE)) {
            $modifiedColumns[':p' . $index++]  = 'title';
        }
        if ($this->isColumnModified(TaskTableMap::COL_DESCRIPT)) {
            $modifiedColumns[':p' . $index++]  = 'descript';
        }
        if ($this->isColumnModified(TaskTableMap::COL_DEADLINE)) {
            $modifiedColumns[':p' . $index++]  = 'deadline';
        }
        if ($this->isColumnModified(TaskTableMap::COL_RESPONSIBLE_ID)) {
            $modifiedColumns[':p' . $index++]  = 'responsible_id';
        }
        if ($this->isColumnModified(TaskTableMap::COL_GROUP_ID)) {
            $modifiedColumns[':p' . $index++]  = 'group_id';
        }

        $sql = sprintf(
            'INSERT INTO task (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'id':
                        $stmt->bindValue($identifier, $this->id, PDO::PARAM_INT);
                        break;
                    case 'usuario_id':
                        $stmt->bindValue($identifier, $this->usuario_id, PDO::PARAM_INT);
                        break;
                    case 'title':
                        $stmt->bindValue($identifier, $this->title, PDO::PARAM_STR);
                        break;
                    case 'descript':
                        $stmt->bindValue($identifier, $this->descript, PDO::PARAM_STR);
                        break;
                    case 'deadline':
                        $stmt->bindValue($identifier, $this->deadline, PDO::PARAM_STR);
                        break;
                    case 'responsible_id':
                        $stmt->bindValue($identifier, $this->responsible_id, PDO::PARAM_INT);
                        break;
                    case 'group_id':
                        $stmt->bindValue($identifier, $this->group_id, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @return Integer Number of updated rows
     * @see doSave()
     */
    protected function doUpdate(ConnectionInterface $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();

        return $selectCriteria->doUpdate($valuesCriteria, $con);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param      string $name name
     * @param      string $type The type of fieldname the $name is of:
     *                     one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                     TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                     Defaults to TableMap::TYPE_PHPNAME.
     * @return mixed Value of field.
     */
    public function getByName($name, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = TaskTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param      int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getId();
                break;
            case 1:
                return $this->getUsuarioId();
                break;
            case 2:
                return $this->getTitle();
                break;
            case 3:
                return $this->getDescript();
                break;
            case 4:
                return $this->getDeadline();
                break;
            case 5:
                return $this->getResponsibleId();
                break;
            case 6:
                return $this->getGroupId();
                break;
            default:
                return null;
                break;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param     string  $keyType (optional) One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     *                    TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                    Defaults to TableMap::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = TableMap::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
    {

        if (isset($alreadyDumpedObjects['Task'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Task'][$this->hashCode()] = true;
        $keys = TaskTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getUsuarioId(),
            $keys[2] => $this->getTitle(),
            $keys[3] => $this->getDescript(),
            $keys[4] => $this->getDeadline(),
            $keys[5] => $this->getResponsibleId(),
            $keys[6] => $this->getGroupId(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aColaborador) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'colaborador';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'colaborador';
                        break;
                    default:
                        $key = 'Colaborador';
                }

                $result[$key] = $this->aColaborador->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aUsuario) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'usuario';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'usuario';
                        break;
                    default:
                        $key = 'Usuario';
                }

                $result[$key] = $this->aUsuario->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collTaskAccomplices) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'taskAccomplices';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'task_accomplices';
                        break;
                    default:
                        $key = 'TaskAccomplices';
                }

                $result[$key] = $this->collTaskAccomplices->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collTaskAuditors) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'taskAuditors';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'task_auditors';
                        break;
                    default:
                        $key = 'TaskAuditors';
                }

                $result[$key] = $this->collTaskAuditors->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
        }

        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param  string $name
     * @param  mixed  $value field value
     * @param  string $type The type of fieldname the $name is of:
     *                one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                Defaults to TableMap::TYPE_PHPNAME.
     * @return $this|\Task
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = TaskTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Task
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setId($value);
                break;
            case 1:
                $this->setUsuarioId($value);
                break;
            case 2:
                $this->setTitle($value);
                break;
            case 3:
                $this->setDescript($value);
                break;
            case 4:
                $this->setDeadline($value);
                break;
            case 5:
                $this->setResponsibleId($value);
                break;
            case 6:
                $this->setGroupId($value);
                break;
        } // switch()

        return $this;
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param      array  $arr     An array to populate the object from.
     * @param      string $keyType The type of keys the array uses.
     * @return     $this|\Task
     */
    public function fromArray($arr, $keyType = TableMap::TYPE_PHPNAME)
    {
        $keys = TaskTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setUsuarioId($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setTitle($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setDescript($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setDeadline($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setResponsibleId($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setGroupId($arr[$keys[6]]);
        }

        return $this;
    }

     /**
     * Populate the current object from a string, using a given parser format
     * <code>
     * $book = new Book();
     * $book->importFrom('JSON', '{"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param mixed $parser A AbstractParser instance,
     *                       or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param string $data The source data to import from
     * @param string $keyType The type of keys the array uses.
     *
     * @return $this|\Task The current object, for fluid interface
     */
    public function importFrom($parser, $data, $keyType = TableMap::TYPE_PHPNAME)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        $this->fromArray($parser->toArray($data), $keyType);

        return $this;
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(TaskTableMap::DATABASE_NAME);

        if ($this->isColumnModified(TaskTableMap::COL_ID)) {
            $criteria->add(TaskTableMap::COL_ID, $this->id);
        }
        if ($this->isColumnModified(TaskTableMap::COL_USUARIO_ID)) {
            $criteria->add(TaskTableMap::COL_USUARIO_ID, $this->usuario_id);
        }
        if ($this->isColumnModified(TaskTableMap::COL_TITLE)) {
            $criteria->add(TaskTableMap::COL_TITLE, $this->title);
        }
        if ($this->isColumnModified(TaskTableMap::COL_DESCRIPT)) {
            $criteria->add(TaskTableMap::COL_DESCRIPT, $this->descript);
        }
        if ($this->isColumnModified(TaskTableMap::COL_DEADLINE)) {
            $criteria->add(TaskTableMap::COL_DEADLINE, $this->deadline);
        }
        if ($this->isColumnModified(TaskTableMap::COL_RESPONSIBLE_ID)) {
            $criteria->add(TaskTableMap::COL_RESPONSIBLE_ID, $this->responsible_id);
        }
        if ($this->isColumnModified(TaskTableMap::COL_GROUP_ID)) {
            $criteria->add(TaskTableMap::COL_GROUP_ID, $this->group_id);
        }

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @throws LogicException if no primary key is defined
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = ChildTaskQuery::create();
        $criteria->add(TaskTableMap::COL_ID, $this->id);

        return $criteria;
    }

    /**
     * If the primary key is not null, return the hashcode of the
     * primary key. Otherwise, return the hash code of the object.
     *
     * @return int Hashcode
     */
    public function hashCode()
    {
        $validPk = null !== $this->getId();

        $validPrimaryKeyFKs = 0;
        $primaryKeyFKs = [];

        if ($validPk) {
            return crc32(json_encode($this->getPrimaryKey(), JSON_UNESCAPED_UNICODE));
        } elseif ($validPrimaryKeyFKs) {
            return crc32(json_encode($primaryKeyFKs, JSON_UNESCAPED_UNICODE));
        }

        return spl_object_hash($this);
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getId();
    }

    /**
     * Generic method to set the primary key (id column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Task (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setUsuarioId($this->getUsuarioId());
        $copyObj->setTitle($this->getTitle());
        $copyObj->setDescript($this->getDescript());
        $copyObj->setDeadline($this->getDeadline());
        $copyObj->setResponsibleId($this->getResponsibleId());
        $copyObj->setGroupId($this->getGroupId());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getTaskAccomplices() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addTaskAccomplice($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getTaskAuditors() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addTaskAuditor($relObj->copy($deepCopy));
                }
            }

        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setId(NULL); // this is a auto-increment column, so set to default value
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param  boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return \Task Clone of current object.
     * @throws PropelException
     */
    public function copy($deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }

    /**
     * Declares an association between this object and a ChildColaborador object.
     *
     * @param  ChildColaborador|null $v
     * @return $this|\Task The current object (for fluent API support)
     * @throws PropelException
     */
    public function setColaborador(ChildColaborador $v = null)
    {
        if ($v === null) {
            $this->setResponsibleId(NULL);
        } else {
            $this->setResponsibleId($v->getId());
        }

        $this->aColaborador = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildColaborador object, it will not be re-added.
        if ($v !== null) {
            $v->addTask($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildColaborador object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildColaborador|null The associated ChildColaborador object.
     * @throws PropelException
     */
    public function getColaborador(ConnectionInterface $con = null)
    {
        if ($this->aColaborador === null && ($this->responsible_id != 0)) {
            $this->aColaborador = ChildColaboradorQuery::create()->findPk($this->responsible_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aColaborador->addTasks($this);
             */
        }

        return $this->aColaborador;
    }

    /**
     * Declares an association between this object and a ChildUsuario object.
     *
     * @param  ChildUsuario|null $v
     * @return $this|\Task The current object (for fluent API support)
     * @throws PropelException
     */
    public function setUsuario(ChildUsuario $v = null)
    {
        if ($v === null) {
            $this->setUsuarioId(NULL);
        } else {
            $this->setUsuarioId($v->getId());
        }

        $this->aUsuario = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildUsuario object, it will not be re-added.
        if ($v !== null) {
            $v->addTask($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildUsuario object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildUsuario|null The associated ChildUsuario object.
     * @throws PropelException
     */
    public function getUsuario(ConnectionInterface $con = null)
    {
        if ($this->aUsuario === null && ($this->usuario_id != 0)) {
            $this->aUsuario = ChildUsuarioQuery::create()->findPk($this->usuario_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aUsuario->addTasks($this);
             */
        }

        return $this->aUsuario;
    }


    /**
     * Initializes a collection based on the name of a relation.
     * Avoids crafting an 'init[$relationName]s' method name
     * that wouldn't work when StandardEnglishPluralizer is used.
     *
     * @param      string $relationName The name of the relation to initialize
     * @return void
     */
    public function initRelation($relationName)
    {
        if ('TaskAccomplice' === $relationName) {
            $this->initTaskAccomplices();
            return;
        }
        if ('TaskAuditor' === $relationName) {
            $this->initTaskAuditors();
            return;
        }
    }

    /**
     * Clears out the collTaskAccomplices collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addTaskAccomplices()
     */
    public function clearTaskAccomplices()
    {
        $this->collTaskAccomplices = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collTaskAccomplices collection loaded partially.
     */
    public function resetPartialTaskAccomplices($v = true)
    {
        $this->collTaskAccomplicesPartial = $v;
    }

    /**
     * Initializes the collTaskAccomplices collection.
     *
     * By default this just sets the collTaskAccomplices collection to an empty array (like clearcollTaskAccomplices());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initTaskAccomplices($overrideExisting = true)
    {
        if (null !== $this->collTaskAccomplices && !$overrideExisting) {
            return;
        }

        $collectionClassName = TaskAccompliceTableMap::getTableMap()->getCollectionClassName();

        $this->collTaskAccomplices = new $collectionClassName;
        $this->collTaskAccomplices->setModel('\TaskAccomplice');
    }

    /**
     * Gets an array of ChildTaskAccomplice objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildTask is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildTaskAccomplice[] List of ChildTaskAccomplice objects
     * @phpstan-return ObjectCollection&\Traversable<ChildTaskAccomplice> List of ChildTaskAccomplice objects
     * @throws PropelException
     */
    public function getTaskAccomplices(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collTaskAccomplicesPartial && !$this->isNew();
        if (null === $this->collTaskAccomplices || null !== $criteria || $partial) {
            if ($this->isNew()) {
                // return empty collection
                if (null === $this->collTaskAccomplices) {
                    $this->initTaskAccomplices();
                } else {
                    $collectionClassName = TaskAccompliceTableMap::getTableMap()->getCollectionClassName();

                    $collTaskAccomplices = new $collectionClassName;
                    $collTaskAccomplices->setModel('\TaskAccomplice');

                    return $collTaskAccomplices;
                }
            } else {
                $collTaskAccomplices = ChildTaskAccompliceQuery::create(null, $criteria)
                    ->filterByTask($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collTaskAccomplicesPartial && count($collTaskAccomplices)) {
                        $this->initTaskAccomplices(false);

                        foreach ($collTaskAccomplices as $obj) {
                            if (false == $this->collTaskAccomplices->contains($obj)) {
                                $this->collTaskAccomplices->append($obj);
                            }
                        }

                        $this->collTaskAccomplicesPartial = true;
                    }

                    return $collTaskAccomplices;
                }

                if ($partial && $this->collTaskAccomplices) {
                    foreach ($this->collTaskAccomplices as $obj) {
                        if ($obj->isNew()) {
                            $collTaskAccomplices[] = $obj;
                        }
                    }
                }

                $this->collTaskAccomplices = $collTaskAccomplices;
                $this->collTaskAccomplicesPartial = false;
            }
        }

        return $this->collTaskAccomplices;
    }

    /**
     * Sets a collection of ChildTaskAccomplice objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $taskAccomplices A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildTask The current object (for fluent API support)
     */
    public function setTaskAccomplices(Collection $taskAccomplices, ConnectionInterface $con = null)
    {
        /** @var ChildTaskAccomplice[] $taskAccomplicesToDelete */
        $taskAccomplicesToDelete = $this->getTaskAccomplices(new Criteria(), $con)->diff($taskAccomplices);


        $this->taskAccomplicesScheduledForDeletion = $taskAccomplicesToDelete;

        foreach ($taskAccomplicesToDelete as $taskAccompliceRemoved) {
            $taskAccompliceRemoved->setTask(null);
        }

        $this->collTaskAccomplices = null;
        foreach ($taskAccomplices as $taskAccomplice) {
            $this->addTaskAccomplice($taskAccomplice);
        }

        $this->collTaskAccomplices = $taskAccomplices;
        $this->collTaskAccomplicesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related TaskAccomplice objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related TaskAccomplice objects.
     * @throws PropelException
     */
    public function countTaskAccomplices(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collTaskAccomplicesPartial && !$this->isNew();
        if (null === $this->collTaskAccomplices || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collTaskAccomplices) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getTaskAccomplices());
            }

            $query = ChildTaskAccompliceQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByTask($this)
                ->count($con);
        }

        return count($this->collTaskAccomplices);
    }

    /**
     * Method called to associate a ChildTaskAccomplice object to this object
     * through the ChildTaskAccomplice foreign key attribute.
     *
     * @param  ChildTaskAccomplice $l ChildTaskAccomplice
     * @return $this|\Task The current object (for fluent API support)
     */
    public function addTaskAccomplice(ChildTaskAccomplice $l)
    {
        if ($this->collTaskAccomplices === null) {
            $this->initTaskAccomplices();
            $this->collTaskAccomplicesPartial = true;
        }

        if (!$this->collTaskAccomplices->contains($l)) {
            $this->doAddTaskAccomplice($l);

            if ($this->taskAccomplicesScheduledForDeletion and $this->taskAccomplicesScheduledForDeletion->contains($l)) {
                $this->taskAccomplicesScheduledForDeletion->remove($this->taskAccomplicesScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildTaskAccomplice $taskAccomplice The ChildTaskAccomplice object to add.
     */
    protected function doAddTaskAccomplice(ChildTaskAccomplice $taskAccomplice)
    {
        $this->collTaskAccomplices[]= $taskAccomplice;
        $taskAccomplice->setTask($this);
    }

    /**
     * @param  ChildTaskAccomplice $taskAccomplice The ChildTaskAccomplice object to remove.
     * @return $this|ChildTask The current object (for fluent API support)
     */
    public function removeTaskAccomplice(ChildTaskAccomplice $taskAccomplice)
    {
        if ($this->getTaskAccomplices()->contains($taskAccomplice)) {
            $pos = $this->collTaskAccomplices->search($taskAccomplice);
            $this->collTaskAccomplices->remove($pos);
            if (null === $this->taskAccomplicesScheduledForDeletion) {
                $this->taskAccomplicesScheduledForDeletion = clone $this->collTaskAccomplices;
                $this->taskAccomplicesScheduledForDeletion->clear();
            }
            $this->taskAccomplicesScheduledForDeletion[]= $taskAccomplice;
            $taskAccomplice->setTask(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Task is new, it will return
     * an empty collection; or if this Task has previously
     * been saved, it will retrieve related TaskAccomplices from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Task.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildTaskAccomplice[] List of ChildTaskAccomplice objects
     * @phpstan-return ObjectCollection&\Traversable<ChildTaskAccomplice}> List of ChildTaskAccomplice objects
     */
    public function getTaskAccomplicesJoinColaborador(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildTaskAccompliceQuery::create(null, $criteria);
        $query->joinWith('Colaborador', $joinBehavior);

        return $this->getTaskAccomplices($query, $con);
    }

    /**
     * Clears out the collTaskAuditors collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addTaskAuditors()
     */
    public function clearTaskAuditors()
    {
        $this->collTaskAuditors = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collTaskAuditors collection loaded partially.
     */
    public function resetPartialTaskAuditors($v = true)
    {
        $this->collTaskAuditorsPartial = $v;
    }

    /**
     * Initializes the collTaskAuditors collection.
     *
     * By default this just sets the collTaskAuditors collection to an empty array (like clearcollTaskAuditors());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initTaskAuditors($overrideExisting = true)
    {
        if (null !== $this->collTaskAuditors && !$overrideExisting) {
            return;
        }

        $collectionClassName = TaskAuditorTableMap::getTableMap()->getCollectionClassName();

        $this->collTaskAuditors = new $collectionClassName;
        $this->collTaskAuditors->setModel('\TaskAuditor');
    }

    /**
     * Gets an array of ChildTaskAuditor objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildTask is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildTaskAuditor[] List of ChildTaskAuditor objects
     * @phpstan-return ObjectCollection&\Traversable<ChildTaskAuditor> List of ChildTaskAuditor objects
     * @throws PropelException
     */
    public function getTaskAuditors(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collTaskAuditorsPartial && !$this->isNew();
        if (null === $this->collTaskAuditors || null !== $criteria || $partial) {
            if ($this->isNew()) {
                // return empty collection
                if (null === $this->collTaskAuditors) {
                    $this->initTaskAuditors();
                } else {
                    $collectionClassName = TaskAuditorTableMap::getTableMap()->getCollectionClassName();

                    $collTaskAuditors = new $collectionClassName;
                    $collTaskAuditors->setModel('\TaskAuditor');

                    return $collTaskAuditors;
                }
            } else {
                $collTaskAuditors = ChildTaskAuditorQuery::create(null, $criteria)
                    ->filterByTask($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collTaskAuditorsPartial && count($collTaskAuditors)) {
                        $this->initTaskAuditors(false);

                        foreach ($collTaskAuditors as $obj) {
                            if (false == $this->collTaskAuditors->contains($obj)) {
                                $this->collTaskAuditors->append($obj);
                            }
                        }

                        $this->collTaskAuditorsPartial = true;
                    }

                    return $collTaskAuditors;
                }

                if ($partial && $this->collTaskAuditors) {
                    foreach ($this->collTaskAuditors as $obj) {
                        if ($obj->isNew()) {
                            $collTaskAuditors[] = $obj;
                        }
                    }
                }

                $this->collTaskAuditors = $collTaskAuditors;
                $this->collTaskAuditorsPartial = false;
            }
        }

        return $this->collTaskAuditors;
    }

    /**
     * Sets a collection of ChildTaskAuditor objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $taskAuditors A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildTask The current object (for fluent API support)
     */
    public function setTaskAuditors(Collection $taskAuditors, ConnectionInterface $con = null)
    {
        /** @var ChildTaskAuditor[] $taskAuditorsToDelete */
        $taskAuditorsToDelete = $this->getTaskAuditors(new Criteria(), $con)->diff($taskAuditors);


        $this->taskAuditorsScheduledForDeletion = $taskAuditorsToDelete;

        foreach ($taskAuditorsToDelete as $taskAuditorRemoved) {
            $taskAuditorRemoved->setTask(null);
        }

        $this->collTaskAuditors = null;
        foreach ($taskAuditors as $taskAuditor) {
            $this->addTaskAuditor($taskAuditor);
        }

        $this->collTaskAuditors = $taskAuditors;
        $this->collTaskAuditorsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related TaskAuditor objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related TaskAuditor objects.
     * @throws PropelException
     */
    public function countTaskAuditors(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collTaskAuditorsPartial && !$this->isNew();
        if (null === $this->collTaskAuditors || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collTaskAuditors) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getTaskAuditors());
            }

            $query = ChildTaskAuditorQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByTask($this)
                ->count($con);
        }

        return count($this->collTaskAuditors);
    }

    /**
     * Method called to associate a ChildTaskAuditor object to this object
     * through the ChildTaskAuditor foreign key attribute.
     *
     * @param  ChildTaskAuditor $l ChildTaskAuditor
     * @return $this|\Task The current object (for fluent API support)
     */
    public function addTaskAuditor(ChildTaskAuditor $l)
    {
        if ($this->collTaskAuditors === null) {
            $this->initTaskAuditors();
            $this->collTaskAuditorsPartial = true;
        }

        if (!$this->collTaskAuditors->contains($l)) {
            $this->doAddTaskAuditor($l);

            if ($this->taskAuditorsScheduledForDeletion and $this->taskAuditorsScheduledForDeletion->contains($l)) {
                $this->taskAuditorsScheduledForDeletion->remove($this->taskAuditorsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildTaskAuditor $taskAuditor The ChildTaskAuditor object to add.
     */
    protected function doAddTaskAuditor(ChildTaskAuditor $taskAuditor)
    {
        $this->collTaskAuditors[]= $taskAuditor;
        $taskAuditor->setTask($this);
    }

    /**
     * @param  ChildTaskAuditor $taskAuditor The ChildTaskAuditor object to remove.
     * @return $this|ChildTask The current object (for fluent API support)
     */
    public function removeTaskAuditor(ChildTaskAuditor $taskAuditor)
    {
        if ($this->getTaskAuditors()->contains($taskAuditor)) {
            $pos = $this->collTaskAuditors->search($taskAuditor);
            $this->collTaskAuditors->remove($pos);
            if (null === $this->taskAuditorsScheduledForDeletion) {
                $this->taskAuditorsScheduledForDeletion = clone $this->collTaskAuditors;
                $this->taskAuditorsScheduledForDeletion->clear();
            }
            $this->taskAuditorsScheduledForDeletion[]= $taskAuditor;
            $taskAuditor->setTask(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Task is new, it will return
     * an empty collection; or if this Task has previously
     * been saved, it will retrieve related TaskAuditors from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Task.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildTaskAuditor[] List of ChildTaskAuditor objects
     * @phpstan-return ObjectCollection&\Traversable<ChildTaskAuditor}> List of ChildTaskAuditor objects
     */
    public function getTaskAuditorsJoinColaborador(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildTaskAuditorQuery::create(null, $criteria);
        $query->joinWith('Colaborador', $joinBehavior);

        return $this->getTaskAuditors($query, $con);
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aColaborador) {
            $this->aColaborador->removeTask($this);
        }
        if (null !== $this->aUsuario) {
            $this->aUsuario->removeTask($this);
        }
        $this->id = null;
        $this->usuario_id = null;
        $this->title = null;
        $this->descript = null;
        $this->deadline = null;
        $this->responsible_id = null;
        $this->group_id = null;
        $this->alreadyInSave = false;
        $this->clearAllReferences();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references and back-references to other model objects or collections of model objects.
     *
     * This method is used to reset all php object references (not the actual reference in the database).
     * Necessary for object serialisation.
     *
     * @param      boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep) {
            if ($this->collTaskAccomplices) {
                foreach ($this->collTaskAccomplices as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collTaskAuditors) {
                foreach ($this->collTaskAuditors as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collTaskAccomplices = null;
        $this->collTaskAuditors = null;
        $this->aColaborador = null;
        $this->aUsuario = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(TaskTableMap::DEFAULT_STRING_FORMAT);
    }

    /**
     * Code to be run before persisting the object
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preSave(ConnectionInterface $con = null)
    {
                return true;
    }

    /**
     * Code to be run after persisting the object
     * @param ConnectionInterface $con
     */
    public function postSave(ConnectionInterface $con = null)
    {
            }

    /**
     * Code to be run before inserting to database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preInsert(ConnectionInterface $con = null)
    {
                return true;
    }

    /**
     * Code to be run after inserting to database
     * @param ConnectionInterface $con
     */
    public function postInsert(ConnectionInterface $con = null)
    {
            }

    /**
     * Code to be run before updating the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preUpdate(ConnectionInterface $con = null)
    {
                return true;
    }

    /**
     * Code to be run after updating the object in database
     * @param ConnectionInterface $con
     */
    public function postUpdate(ConnectionInterface $con = null)
    {
            }

    /**
     * Code to be run before deleting the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preDelete(ConnectionInterface $con = null)
    {
                return true;
    }

    /**
     * Code to be run after deleting the object in database
     * @param ConnectionInterface $con
     */
    public function postDelete(ConnectionInterface $con = null)
    {
            }


    /**
     * Derived method to catches calls to undefined methods.
     *
     * Provides magic import/export method support (fromXML()/toXML(), fromYAML()/toYAML(), etc.).
     * Allows to define default __call() behavior if you overwrite __call()
     *
     * @param string $name
     * @param mixed  $params
     *
     * @return array|string
     */
    public function __call($name, $params)
    {
        if (0 === strpos($name, 'get')) {
            $virtualColumn = substr($name, 3);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }

            $virtualColumn = lcfirst($virtualColumn);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }
        }

        if (0 === strpos($name, 'from')) {
            $format = substr($name, 4);
            $inputData = $params[0];
            $keyType = $params[1] ?? TableMap::TYPE_PHPNAME;

            return $this->importFrom($format, $inputData, $keyType);
        }

        if (0 === strpos($name, 'to')) {
            $format = substr($name, 2);
            $includeLazyLoadColumns = $params[0] ?? true;
            $keyType = $params[1] ?? TableMap::TYPE_PHPNAME;

            return $this->exportTo($format, $includeLazyLoadColumns, $keyType);
        }

        throw new BadMethodCallException(sprintf('Call to undefined method: %s.', $name));
    }

}
