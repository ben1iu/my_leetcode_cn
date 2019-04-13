<?php
/**
 * 
 *  将一个给定字符串根据给定的行数，以从上往下、从左到右进行 Z 字形排列。
 *
 *  比如输入字符串为 "LEETCODEISHIRING" 行数为 3 时，排列如下：
 *
 *  L   C   I   R
 *  E T O E S I I G
 *  E   D   H   N
 *  之后，你的输出需要从左往右逐行读取，产生出一个新的字符串，比如："LCIRETOESIIGEDHN"。
 *
 *  请你实现这个将字符串进行指定行数变换的函数：
 *
 *  string convert(string s, int numRows);
 *  示例 1:
 *
 *  输入: s = "LEETCODEISHIRING", numRows = 3
 *  输出: "LCIRETOESIIGEDHN"
 *  示例 2:
 *
 *  输入: s = "LEETCODEISHIRING", numRows = 4
 *  输出: "LDREOEIIECIHNTSG"
 *  解释:
 *
 *  L     D     R
 *  E   O E   I I
 *  E C   I H   N
 *  T     S     G
 */
class Solution {

    /**
     * @param String $s
     * @param Integer $numRows
     * @return String
     */
    function convert($s, $numRows) {
        if($numRows==1) return $s;
        $length = strlen($s);
        $tmp_arr= [];
        for($i=0;$i<$length;$i+=2*$numRows-2){
            $str = substr($s,$i,$numRows);
            $tmp_arr[] = $str;
            for($j=0;$j<$numRows-2;$j++){
                $str = substr($s,$j+$i+$numRows,1);
                $prefx = str_pad(0,$numRows-2-$j,0,STR_PAD_LEFT);
                $str = $prefx.$str;
                $tmp_arr[] = $str;
            }
        }
        $tmp_arr_length = count($tmp_arr);
        $result = "";
        for($j=0;$j<=$numRows;$j++){
            for($i=0;$i<$tmp_arr_length;$i++){
                $val = $tmp_arr[$i];
                if(!isset($val[$j]) || $val[$j]=="0"){
                    continue;
                }
                $result .=$val[$j];
            }
        }
        return $result;
    }
}

$str = "LEETCODEISHIRING";
$obj = new Solution();
$result = $obj->convert($str,3);
echo $result."\n";
var_dump("LCIRETOESIIGEDHN"==$result);
$result = $obj->convert($str,4);
echo $result."\n";
var_dump("LDREOEIIECIHNTSG"==$result);

echo "\n";
$str = "PAYPALISHIRING";
$result = $obj->convert($str,4);
echo $result."\n";
var_dump("LDREOEIIECIHNTSG"==$result);

echo $result."\n";
var_dump("LDREOEIIECIHNTSG"==$result);