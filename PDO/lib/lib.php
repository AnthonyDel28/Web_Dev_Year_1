<?php

/**
 * PDO Functions
 */

/**
 * @param string $sql must contains 2 columns in SELECT. First one will be "id" value and second one will be "name" value
 * @return string
 */
function getOption(string $sql): string
{
    $option = '';
    $result = pQuery($sql);
    while ($row = $result->fetch(PDO::FETCH_NUM)) {
        $option .= "<option value=" . $row[0] . ">" . ucfirst($row[1]) . "</option>";
    }
    return $option;
}

/**
 * @param string $sql must contains 2 columns in SELECT. First one will be "min" value and second one will be "max" value
 * @param int $step
 * @param string $unit
 * @return string
 */
function getRangeOption(string $sql, int $step = 1, string $unit = ''): string
{
    $option = '';
    $result = pQuery($sql);
    $data = $result->fetch(PDO::FETCH_NUM);
    for ($x = $data[0]; $x <= $data[1]; $x += $step) {
        $range = $x + $step;
        $option .= '<option value=' . $x . '-' . $range . '>Entre ' . $x . $unit . ' et ' . $range . $unit . '</option>';
    }
    return $option;
}

/**
 * @param string $sql must contains 2 columns in SELECT. First one will be "min" value and second one will be "max" value
 * @param string $name
 * @param string $label
 * @param int $step
 * @param string $unit
 * @return string
 */
function getRange(string $sql, string $name, string $label, int $step = 1, string $unit = ''): string
{
    $result = pQuery($sql);
    $data = $result->fetch(PDO::FETCH_NUM);
    return '<label>' . $label . '</label>
    <input type="range" name="' . $name . '" min="' . $data[0] . '" max="' . $data[1] . '" step="' . $step . '" 
    oninput="document.getElementById(\'' . $name . '\').textContent=value + \'' . $unit . '\'">
    <span id="' . $name . '">' . ($data[1] / 2) . $unit . '</span>';

}
