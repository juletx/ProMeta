<?php

/**
 * @file
 * Responsible for hooking views to add each database and its tables.
 */

use Drupal\Core\Database\Database;
use Drupal\Component\Utility\Html;

/**
 * Implements hook_views_data().
 */
function views_database_connector_views_data() {
  $dbs = views_database_connector_get_database_schemas();
  $data = [];
  // Iterate through each database.
  foreach ($dbs as $dname => $db) {
    // Iterate through each table.
    foreach ($db as $table) {
      // Make sure the table name hasn't been used before.
      if (!isset($data[$table[0]])) {
        // Set the title.
        $title = '[VDC] ' . Html::escape($dname) . ':  ';
        $title .= Html::escape($table[0]);
        // Setup the table for Views to be able to see it.
        $data[$table[0]]['table']['group'] = $table[0];
        $data[$table[0]]['table']['base'] = [
          // Use the first column's name as the primary field.
          'field' => $table[1][0][1],
          'title' => $title,
          'database' => $dname,
          'weight' => -9001,
        ];
        // Add each column to its respective table.
        foreach ($table[1] as $col) {
          if ($col[0] == 'numeric') {
            $data[$table[0]][$col[1]] = [
              'title' => $col[1],
              'help' => $col[1],
              'field' => [
                'id' => 'numeric',
              ],
              'sort' => [
                'id' => 'standard',
              ],
              'filter' => [
                'id' => 'numeric',
              ],
              'argument' => [
                'id' => 'numeric',
              ],
            ];
          }
          if ($col[0] == 'date') {
            $data[$table[0]][$col[1]] = [
              'title' => $col[1],
              'help' => $col[1],
              'field' => [
                'id' => 'date',
              ],
              'sort' => [
                'id' => 'date',
              ],
              'filter' => [
                'id' => 'date',
              ],
            ];
          }
          if ($col[0] == 'string') {
            $data[$table[0]][$col[1]] = [
              'title' => $col[1],
              'help' => $col[1],
              'field' => [
                'id' => 'standard',
              ],
              'sort' => [
                'id' => 'standard',
              ],
              'filter' => [
                'id' => 'string',
              ],
              'argument' => [
                'id' => 'string',
              ],
            ];
          }
          if ($col[0] == 'broken') {
            $data[$table[0]][$col[1]] = [
              'title' => $col[1],
              'help' => $col[1],
              'field' => [
                'id' => 'broken',
              ],
              'sort' => [
                'id' => 'broken',
              ],
              'filter' => [
                'id' => 'broken',
              ],
              'argument' => [
                'id' => 'broken',
              ],
            ];
          }
        }
      }
    }
  }

  // Return the finished result, allowing Views to be able to see everything
  // that it needs.
  return $data;
}

/**
 * Provides organizational categories for each data type.
 */
function views_database_connector_get_data_types() {
  $types = [
    'numeric' => [
      'int',
      'decimal',
      'numeric',
      'float',
      'double',
      'bit',
    ],
    'date' => [
      'date',
      'time',
      'year',
    ],
    'string' => [
      'char',
      'binary',
      'blob',
      'text',
      'enum',
      'set',
    ],
  ];

  return $types;
}

/**
 * Gathers appropriate information from each potential database driver type.
 */
function views_database_connector_get_database_schemas() {
  $dbs = [];
  $databases = Database::getAllConnectionInfo();
  $vdc_settings = \Drupal::config('views_database_connector.settings');
  // Iterate through each of the database configurations.
  foreach ($databases as $key => $datab) {
    $enabled_status = $vdc_settings->get($key . '.enabled');
    if (isset($enabled_status) && $enabled_status == 1) {
      $dbs[$key] = add_table_to_database_list($datab, $key);
    }
    elseif (!isset($enabled_status) && $key != 'default') {
      $dbs[$key] = add_table_to_database_list($datab, $key);
    }
  }
  return $dbs;
}

/**
 * Adds table list to the database list based on driver.
 *
 * @param $datab
 * @param $key
 *
 * @return array
 */
function add_table_to_database_list($datab, $key) {
  if (strtolower($datab['default']['driver']) == 'mysql') {
    return views_database_connector_get_database_schema_mysql($key);
  }
  if (strtolower($datab['default']['driver']) == 'sqlite') {
    return views_database_connector_get_database_schema_sqlite($key);
  }
  if (strtolower($datab['default']['driver']) == 'pgsql') {
    return views_database_connector_get_database_schema_pgsql($key);
  }
  return [];
}

/**
 * Gathers appropriate information from MySQL driver type databases.
 */
function views_database_connector_get_database_schema_mysql($key) {
  // Load the appropriate data type groups.
  $types = views_database_connector_get_data_types();
  // Switch to database in question.
  Database::setActiveConnection($key);
  // The database in question.
  $new_db = Database::getConnection('default', $key);
  // Get a list of the tables in this database.
  $tables = $new_db->query('SHOW TABLES;');
  // Switch back to the main database.
  Database::setActiveConnection('default');
  $tablelist = [];
  // Fetch a row, each with a table name.
  while ($row = $tables->fetchAssoc()) {
    // This is the one of two database formats that can have whacky table
    // names due to using information_schema.  We have the ability to
    // check on columns without the PDO table substitution problem.
    foreach ($row as $v) {
      // Switch to database in question.
      Database::setActiveConnection($key);
      // Fetch column names and their data type from said table.
      $q = 'SELECT column_name AS column_name, data_type AS data_type FROM ';
      $q .= 'information_schema.columns WHERE table_name = :table;';
      $cols = $new_db->query($q, [':table' => $v]);
      // Switch back to the main database.
      Database::setActiveConnection('default');
      $collist = [];
      // Fetch a row, each with a column name.
      while ($r = $cols->fetchAssoc()) {
        $t = 'broken';
        // Add column to column list.
        if (isset($r['column_name'])) {
          foreach ($types as $type => $matches) {
            foreach ($matches as $match) {
              if (stristr($r['data_type'], $match)) {
                $t = $type;
              }
            }
          }
          $collist[] = [$t, $r['column_name']];
        }
      }
      // Add table and its columns to the table list.
      $tablelist[] = [$v, $collist];
    }
  }

  return $tablelist;
}

/**
 * Gathers appropriate information from SQLite driver type databases.
 */
function views_database_connector_get_database_schema_sqlite($key) {
  // Load the appropriate data type groups.
  $types = views_database_connector_get_data_types();
  // Switch to database in question.
  Database::setActiveConnection($key);
  // The database in question.
  $new_db = Database::getConnection('default', $key);
  // Get a list of the tables in this database.
  $q = 'SELECT name FROM sqlite_master WHERE type=\'table\';';
  $tables = $new_db->query($q);
  // Switch back to the main database.
  Database::setActiveConnection('default');
  $tablelist = [];
  // Fetch a row, each with a table name.
  while ($row = $tables->fetchAssoc()) {
    foreach ($row as $v) {
      // Check that the table name is safe to substitute in the query.
      if ($v == \Drupal::database()->escapeTable($v)) {
        // Switch to database in question.
        Database::setActiveConnection($key);
        // Fetch column names and their data type from said table.
        $q = 'PRAGMA table_info(:table);';
        $cols = $new_db->query(str_ireplace(':table', $v, $q));
        // Switch back to the main database.
        Database::setActiveConnection('default');
        $collist = [];
        // Fetch a row, each with a column name.
        while ($r = $cols->fetchAssoc()) {
          $t = 'broken';
          // Add column to column list.
          if (isset($r['name'])) {
            foreach ($types as $type => $matches) {
              foreach ($matches as $match) {
                if (stristr($r['type'], $match)) {
                  $t = $type;
                }
              }
            }
            $collist[] = [$t, $r['name']];
          }
        }
        // Add table and its columns to the table list.
        $tablelist[] = [$v, $collist];
      }
    }
  }

  return $tablelist;
}

/**
 * Gathers appropriate information from PostgreSQL driver type databases.
 */
function views_database_connector_get_database_schema_pgsql($key) {
  // Load the appropriate data type groups.
  $types = views_database_connector_get_data_types();
  // Switch to database in question.
  Database::setActiveConnection($key);
  // The database in question.
  $new_db = Database::getConnection('default', $key);
  // Get a list of the tables in this database.
  $q = 'SELECT table_name FROM ';
  $q .= 'information_schema.tables WHERE (table_type = \'BASE TABLE\' OR table_type = \'VIEW\') AND ';
  $q .= 'table_schema NOT IN (\'pg_catalog\', \'information_schema\');';
  $tables = $new_db->query($q);
  // Switch back to the main database.
  Database::setActiveConnection('default');
  $tablelist = [];
  // Fetch a row, each with a table name.
  while ($row = $tables->fetchAssoc()) {
    foreach ($row as $v) {
      // Switch to database in question.
      Database::setActiveConnection($key);
      // Fetch column names and their data type from said table.
      $q = 'SELECT column_name, data_type FROM ';
      $q .= 'information_schema.columns WHERE table_name = :table;';
      $cols = $new_db->query($q, [':table' => $v]);
      // Switch back to the main database.
      Database::setActiveConnection('default');
      $collist = [];
      // Fetch a row, each with a column name.
      while ($r = $cols->fetchAssoc()) {
        $t = 'broken';
        // Add column to column list.
        if (isset($r['column_name'])) {
          foreach ($types as $type => $matches) {
            foreach ($matches as $match) {
              if (stristr($r['data_type'], $match)) {
                $t = $type;
              }
            }
          }
          $collist[] = [$t, $r['column_name']];
        }
      }
      // Add table and its columns to the table list.
      $tablelist[] = [$v, $collist];
    }
  }

  return $tablelist;
}
