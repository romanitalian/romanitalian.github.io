<?php

/**
 * Parse csv using: array_map
 * @param $path_to_csv_file
 * @param string $delimiter
 * @return array
 */
function m_str_getcsv($path_to_csv_file, $delimiter = ";") {
    return array_map(
        function ($item) use ($delimiter) {
            return explode($delimiter, trim($item));
        },
        file($path_to_csv_file)
    );
}

/**
 * Parse csv using: foreach
 * @param $path
 * @return array
 */
function m2_str_getcsv($path) {
    $out = array();
    $s = trim(file_get_contents($path));
    $rows = explode("\n", $s);
    if(!empty($rows)) {
        foreach($rows as $row) {
            $out[] = explode(";", $row);
        }
    }
    return $out;
}

/**
 * @param $func
 * @param $count_execution_func
 * @return string
 */
function run_test($func, $count_execution_func = 100) {
    $t = microtime(true);
    $times = array();
    $path = 'otchet.csv';
    for($i = 0; $i < $count_execution_func; ++$i) {
        $func($path);
        $times[] = microtime(true) - $t;
    }
    return $times;
}

//////////////////////////////////////// test: ////////////////////

$t[] = run_test('m_str_getcsv');
$t[] = run_test('m2_str_getcsv');

echo "<pre>\n\n".str_replace('.', ',', implode("\n", $t[0]))."</pre>";
echo "<pre>\n\n".str_replace('.', ',', implode("\n", $t[1]))."</pre>";

// average time execution: foreach vs array_map
echo (array_sum($t[0]) / count($t[0])) / (array_sum($t[1]) / count($t[1])); // 2.9423094638524
