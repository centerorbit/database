<?php

namespace Illuminate\Database\Schema\Grammars;

use Illuminate\Support\Fluent;
use Illuminate\Database\Schema\Blueprint;

class CockroachGrammar extends PostgresGrammar
{

    /**
     * Create the column definition for a date-time type.
     *
     * @param  \Illuminate\Support\Fluent  $column
     * @return string
     */
    protected function typeDateTime(Fluent $column)
    {
        return "timestamp";
    }

    /**
     * Create the column definition for a date-time (with time zone) type.
     *
     * @param  \Illuminate\Support\Fluent  $column
     * @return string
     */
    protected function typeDateTimeTz(Fluent $column)
    {
        return "timestamptz";
    }

    /**
     * Create the column definition for a timestamp type.
     *
     * @param  \Illuminate\Support\Fluent  $column
     * @return string
     */
    protected function typeTimestamp(Fluent $column)
    {
        $columnType = "timestamp";

        return $column->useCurrent ? "$columnType default CURRENT_TIMESTAMP" : $columnType;
    }

    /**
     * Create the column definition for a timestamp (with time zone) type.
     *
     * @param  \Illuminate\Support\Fluent  $column
     * @return string
     */
    protected function typeTimestampTz(Fluent $column)
    {
        $columnType = "timestamptz";

        return $column->useCurrent ? "$columnType default CURRENT_TIMESTAMP" : $columnType;
    }


    /**
     * TODO: Does Cockroach even support this?
     *
     * Format the column definition for a PostGIS spatial type.
     *
     * @param  string  $type
     * @return string
     */
    private function formatPostGisType(string $type)
    {
        return "geography($type, 4326)";
    }
}
