<?php
$serviceContainer = \Propel\Runtime\Propel::getServiceContainer();
$serviceContainer->initDatabaseMaps(array (
  'default' => 
  array (
    0 => '\\Map\\ColaboradorTableMap',
    1 => '\\Map\\ColaboradorTecnologiaTableMap',
    2 => '\\Map\\ColaboradorUnidadeTableMap',
    3 => '\\Map\\N3AccompliceTableMap',
    4 => '\\Map\\TaskAccompliceTableMap',
    5 => '\\Map\\TaskAuditorTableMap',
    6 => '\\Map\\TaskTableMap',
    7 => '\\Map\\TecnologiaTableMap',
    8 => '\\Map\\UnidadeTableMap',
    9 => '\\Map\\UsuarioTableMap',
  ),
));
