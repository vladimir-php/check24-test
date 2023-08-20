<?php


/**
 * @param array $arr
 * @param array $tmpArr
 * @param array $result
 * @param bool $unique
 * @param int $length
 * @return void
 */
function getCombinations(array $arr, array $tmpArr, array &$result, bool $unique = false, int $length = 1) {

    // Save tmp array for each interation of arr combinations
    $activeArr = $tmpArr;

    foreach($arr as $key => $value) {

        // Add next element to tmp array
        $tmpArr[$key] = $value;

        // Is matched length?
        if (count($tmpArr) === $length) {

            // Get keys of input arrays (probably for uniqness usage)
            $keys = array_keys($tmpArr);
            if ($unique) {
                sort($keys);
            }
            $resultKey = implode(',', $keys);

            // Add value to the result
            $result[$resultKey] = $tmpArr;

            // Get next level combinations
            getCombinations(array_diff($arr, $tmpArr), $tmpArr, $result, $unique, $length + 1);

            // Reset current tmp arr with saved one
            $tmpArr = $activeArr;
        }
    }
}

$array = ['A', 'B', 'C', 'D'];

$result = [];
getCombinations($array, [],$result, true);
print_r($result);