<?php
/**
 *   给出一个 32 位的有符号整数，你需要将这个整数中每位上的数字进行反转。
*  示例 1:
    *  输入: 123
    *  输出: 321
*  示例 2:
    *  输入: -123
    *  输出: -321
*  示例 3:
    *  输入: 120
    *  输出: 21
*  注意:
*  
*  假设我们的环境只能存储得下 32 位的有符号整数，则其数值范围为 [−2^31,  2^31 − 1]。请根据这个假设，如果反转后整数溢出那么就返回 0。
*/
class Solution {

    /**
     * @param Integer $x
     * @return Integer
     */
    function reverse($x) {
        $result =0;
        $int32_max = pow(2,31);
        $int32_min = -$int32_max;
        while(($x=intval($x))!=0){
            $pop = $x % 10;
            $x /=10;
            $result = $result *10 +$pop;
        }
        if($result > $int32_max || $result ==$int32_max/10 && $pop >7) return 0;
        if($result < $int32_min || $result ==$int32_min/10 && $pop <-8) return 0;
        return $result;
    }
}


$obj = new Solution();
$int  = 123;
$result =$obj->reverse($int);
echo $result.PHP_EOL;
var_dump(321==$result);

$int =1534236469;
$result =$obj->reverse($int);
echo $result.PHP_EOL;
var_dump(0==$result);