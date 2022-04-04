<?php

/**
 * getSQL wrapper function for user table
 *
 * @see getSQL()
 * @param string $field
 * @param string $value
 * @param int $fetch
 * @param int $mode
 * @return array|false|int|mixed|object|PDOStatement|string
 */
function userGet(string $field, string $value, int $fetch = DB_FETCH_RESULT, int $mode = DB_MODE_EXECUTE) {

    return getSQL('user', $field, $value, $fetch, $mode);
}