<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class FindRiskyFieldsOnDatabases extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'find:risky-fields {--capacity=30} {--messages=false}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command will find risky fields on databases';

    /**
     * @var array
     */
    private array $columnMinsAndMaxs = [
        'int' => [
            'min' => -2147483648,
            'max' => 2147483647
        ],
        'unsigned int' => [
            'min' => 0,
            'max' => 4294967295
        ],
        'bigint' => [
            'min' => -9223372036854775808,
            'max' => 9223372036854775807
        ],
        'unsigned bigint' => [
            'min' => 0,
            'max' => 18446744073709551615
        ],
        'tinyint' => [
            'min' => -128,
            'max' => 127
        ],
        'unsigned tinyint' => [
            'min' => 0,
            'max' => 255
        ],
        'smallint' => [
            'min' => -32768,
            'max' => 32767
        ],
        'unsigned smallint' => [
            'min' => 0,
            'max' => 65535
        ],
        'mediumint' => [
            'min' => -8388608,
            'max' => 8388607
        ],
        'unsigned mediumint' => [
            'min' => 0,
            'max' => 16777215
        ],
        'decimal' => [
            'min' => -99999999999999999999999999999.99999999999999999999999999999,
            'max' => 99999999999999999999999999999.99999999999999999999999999999
        ],
        'unsigned decimal' => [
            'min' => 0,
            'max' => 99999999999999999999999999999.99999999999999999999999999999
        ],
    ];

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {

        $showMessages = $this->option('messages') === 'true';
        $capacityAlarmPercentage = $this->option('capacity');
        $outputTable = [];

        $databases = [
            'ticket',
            'shetabit_db',
            'shetabamooz'
        ];

        foreach ($databases as $database) {
            $tables = DB::select('SHOW TABLES FROM ' . $database);
            foreach ($tables as $table) {

                $tableName = array_keys((array)$table)[0];
                $tableName = $table->{$tableName};
                $tableSize = $this->getTableSize($database, $tableName);

                if ($showMessages) {
                    $this->line('Checking table ' . $database . '.' . $tableName, 'fg=cyan');
                }

                $columns = $this->getTableColumns($database, $tableName);

                foreach ($columns as $column) {

                    $columnType = $column['type'];
                    $columnName = $column['name'];

                    if (!$this->isNumericField($columnType)) {
                        continue;
                    }

                    $maxValueForColumnKey = $this->getMaxValueForColumn($columnType);
                    $currentHighestValue = $this->getCurrentHighestValueForColumn($database, $tableName, $columnName);

                    $percentage = ($currentHighestValue / $maxValueForColumnKey) * 100;

                    if ($percentage >= $capacityAlarmPercentage) {

                        if ($showMessages) {
                            $this->alert("{$database}.{$tableName}.{$columnName} is {$percentage}% full");
                        }

                        $outputTable[] = [
                            'table' => $database . '.' . $tableName,
                            'size' => $this->formatBytes($tableSize),
                            'field' => $columnName,
                            'type' => $columnType,
                            'current' => number_format($currentHighestValue),
                            'max' => number_format($maxValueForColumnKey),
                            'percentage' => $percentage
                        ];

                    }

                    if ($showMessages) {
                        $this->line('Ok', 'fg=green');
                    }

                }

            }

        }

        $keys = array_column($outputTable, 'percentage');
        array_multisort($keys, SORT_DESC, $outputTable);

        $this->table(['Table', 'Size', 'Field', 'Type', 'Cur. Val', 'Max. Val', 'Occupancy (%)'], $outputTable);

        return self::SUCCESS;

    }

    /**
     * @param string $columnType
     * @return int|mixed
     */
    private function getMaxValueForColumn(string $columnType): mixed
    {
        if ($this->isInt($columnType)) {
            return $this->columnMinsAndMaxs['int']['max'];
        }
        if ($this->isUnsignedInt($columnType)) {
            return $this->columnMinsAndMaxs['unsigned int']['max'];
        }
        if ($this->isBigInt($columnType)) {
            return $this->columnMinsAndMaxs['bigint']['max'];
        }
        if ($this->isUnsignedBigInt($columnType)) {
            return $this->columnMinsAndMaxs['unsigned bigint']['max'];
        }
        if ($this->isTinyInt($columnType)) {
            return $this->columnMinsAndMaxs['tinyint']['max'];
        }
        if ($this->isUnsignedTinyInt($columnType)) {
            return $this->columnMinsAndMaxs['unsigned tinyint']['max'];
        }
        if ($this->isSmallInt($columnType)) {
            return $this->columnMinsAndMaxs['smallint']['max'];
        }
        if ($this->isUnsignedSmallInt($columnType)) {
            return $this->columnMinsAndMaxs['unsigned smallint']['max'];
        }
        if ($this->isMediumInt($columnType)) {
            return $this->columnMinsAndMaxs['mediumint']['max'];
        }
        if ($this->isUnsignedMediumInt($columnType)) {
            return $this->columnMinsAndMaxs['unsigned mediumint']['max'];
        }
        return null;
    }

    /**
     * @param string $database
     * @param string $tableName
     * @param string $columnName
     * @return null|int
     */
    private function getCurrentHighestValueForColumn(string $database, string $tableName, string $columnName): int|null
    {
        $currentHighestValue = DB::select('SELECT MAX(`' . $columnName . '`) FROM ' . $database . '.' . $tableName);
        $currentHighestFieldName = array_keys((array)$currentHighestValue[0])[0];
        return $currentHighestValue[0]->{$currentHighestFieldName} ?? null;
    }

    /**
     * @param string $database
     * @param string $table
     * @return string|null
     */
    private function getAutoIncrementKey(string $database, string $table): string|null
    {
        $incrementField = DB::select('SELECT * FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = "' . $database . '" AND TABLE_NAME = "' . $table . '" AND COLUMN_KEY = "PRI" AND EXTRA LIKE "%auto_increment%"');
        return $incrementField[0]?->COLUMN_NAME ?? null;
    }

    /**
     * @param string $database
     * @param string $table
     * @return array
     */
    private function getTableColumns(string $database, string $table): array
    {
        $columns = DB::select('SELECT COLUMN_NAME, COLUMN_TYPE FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = "' . $database . '" AND TABLE_NAME = "' . $table . '"');
        return array_map(function ($column) {
            return [
                'name' => $column->COLUMN_NAME,
                'type' => $column->COLUMN_TYPE
            ];
        }, $columns);
    }

    /**
     * @param string $database
     * @param string $table
     * @param string $column
     * @return string|null
     */
    private function getColumnType(string $database, string $table, string $column): string|null
    {
        $columnType = DB::select('SELECT COLUMN_TYPE FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = "' . $database . '" AND TABLE_NAME = "' . $table . '" AND COLUMN_NAME = "' . $column . '"');
        return $columnType[0]->COLUMN_TYPE ?? null;
    }

    /**
     * @param string $database
     * @param string $table
     * @return int|null
     */
    private function getTableSize(string $database, string $table): int|null
    {
        $tableSize = DB::select('SELECT ROUND(( DATA_LENGTH + INDEX_LENGTH )) AS `size` FROM information_schema.TABLES WHERE TABLE_SCHEMA =  "' . $database . '" AND TABLE_NAME = "' . $table . '"  ORDER BY ( DATA_LENGTH + INDEX_LENGTH ) DESC');
        return $tableSize[0]->size ?? null;
    }

    /**
     * @param string $columnType
     * @return bool
     */
    private function isNumericField(string $columnType): bool
    {
        return $this->isInt($columnType) ||
            $this->isUnsignedInt($columnType) ||
            $this->isBigInt($columnType) ||
            $this->isUnsignedBigInt($columnType) ||
            $this->isTinyInt($columnType) ||
            $this->isUnsignedTinyInt($columnType) ||
            $this->isSmallInt($columnType) ||
            $this->isUnsignedSmallInt($columnType) ||
            $this->isMediumInt($columnType) ||
            $this->isUnsignedMediumInt($columnType);
    }

    /**
     * @param string $columnType
     * @return bool
     */
    private function isUnsignedBigInt(string $columnType): bool
    {
        if (preg_match('/^bigint\(([0-9]*)\) unsigned$/', $columnType)) {
            return true;
        }
        return false;
    }

    /**
     * @param string $columnType
     * @return bool
     */
    private function isBigInt(string $columnType): bool
    {
        if (preg_match('/^int\(([0-9]*)\)$/', $columnType)) {
            return true;
        }
        return false;
    }

    /**
     * @param string $columnType
     * @return bool
     */
    private function isUnsignedInt(string $columnType): bool
    {
        if (preg_match('/^int\(([0-9]*)\) unsigned$/', $columnType)) {
            return true;
        }
        return false;
    }

    /**
     * @param string $columnType
     * @return bool
     */
    private function isInt(string $columnType): bool
    {
        if (preg_match('/^int\(([0-9]*)\)$/', $columnType)) {
            return true;
        }
        return false;
    }

    /**
     * @param string $columnType
     * @return bool
     */
    private function isUnsignedMediumInt(string $columnType): bool
    {
        if (preg_match('/^mediumint\(([0-9]*)\) unsigned$/', $columnType)) {
            return true;
        }
        return false;
    }

    /**
     * @param string $columnType
     * @return bool
     */
    private function isMediumInt(string $columnType): bool
    {
        if (preg_match('/^mediumint\(([0-9]*)\)$/', $columnType)) {
            return true;
        }
        return false;
    }

    /**
     * @param string $columnType
     * @return bool
     */
    private function isUnsignedSmallInt(string $columnType): bool
    {
        if (preg_match('/^smallint\(([0-9]*)\) unsigned$/', $columnType)) {
            return true;
        }
        return false;
    }

    /**
     * @param string $columnType
     * @return bool
     */
    private function isSmallInt(string $columnType): bool
    {
        if (preg_match('/^smallint\(([0-9]*)\)$/', $columnType)) {
            return true;
        }
        return false;
    }

    /**
     * @param string $columnType
     * @return bool
     */
    private function isUnsignedTinyInt(string $columnType): bool
    {
        if (preg_match('/^tinyint\(([0-9]*)\) unsigned$/', $columnType)) {
            return true;
        }
        return false;
    }

    /**
     * @param string $columnType
     * @return bool
     */
    private function isTinyInt(string $columnType): bool
    {
        if (preg_match('/^tinyint\(([0-9]*)\)$/', $columnType)) {
            return true;
        }
        return false;
    }

    /**
     * @param $size
     * @param int $precision
     * @return string
     */
    private function formatBytes($size, int $precision = 2): string
    {
        if ($size > 0) {
            $size = (int)$size;
            $base = log($size) / log(1024);
            $suffixes = array(' bytes', ' KB', ' MB', ' GB', ' TB');
            return round(pow(1024, $base - floor($base)), $precision) . $suffixes[floor($base)];
        }
        return $size;
    }
}
