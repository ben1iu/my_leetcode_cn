<?php
/**
 * 给定一个字符串 s，找到 s 中最长的回文子串。你可以假设 s 的最大长度为 1000。
 * 示例 1：
		* 输入: "babad"
		* 输出: "bab"
		* 注意: "aba" 也是一个有效答案。
 * 示例 2：
		* 输入: "cbbd"
		* 输出: "bb"
 */

class Solution {

    /**
     * @param String $s
     * @return String
     */
    function longestPalindrome($string) {
        // 1.遍历寻找 $i对应相同元素,找到就 回退比对
        $length = strlen($string);
        $maxPalindrome =$string[0];
        $maxPalindromeLen = 0;
        for($i=0;$i<$length;++$i){
            for($j=$i+1;$j<$length;++$j){
                $start = $i;
                $len   = $j - $i+1;
                if($string[$j]==$string[$i] && $len >=$maxPalindromeLen){
                    $k= $i;
                    $l =$j; 
                    for($k= $i,$l=$j;$k<=$l; $k++,$l --){
                        if($string[$k]==$string[$l]){
                            if($k==$l || $l-$k ==1){
                                $maxPalindrome = substr($string,$start,$len);
                                $maxPalindromeLen = $len;
                                break;
                            }else{
                                continue;
                            }
                        }else{
                            break;
                        }
                    }
                }
            }
        }
        return $maxPalindrome;
    }
}


//测试
$obj = new Solution();
$str ="babad";
var_dump($obj->longestPalindrome($str));
$str = "cbbd";
var_dump($obj->longestPalindrome($str));
$str = "a";
var_dump($obj->longestPalindrome($str));
$str = "aba";
var_dump($obj->longestPalindrome($str));