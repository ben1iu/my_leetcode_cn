<?php
/**
 * 给定两个大小为 m 和 n 的有序数组 nums1 和 nums2。

请你找出这两个有序数组的中位数，并且要求算法的时间复杂度为 O(log(m + n))。

你可以假设 nums1 和 nums2 不会同时为空。

示例 1:

nums1 = [1, 3]
nums2 = [2]

则中位数是 2.0
示例 2:

nums1 = [1, 2]
nums2 = [3, 4]

则中位数是 (2 + 3)/2 = 2.5
 */
class Solution
{

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     *
     * @return Float
     */
    function findMedianSortedArrays($nums1, $nums2)
    {
        $length1 = count($nums1);
        $length2 = count($nums2);
        $result = array_merge($nums1, $nums2);
        sort($result);
        $length = $length1 + $length2;
        if (0 == $length % 2) {
            $res = ($result[$length / 2 - 1] + $result[$length / 2]) / 2;
        } else {
            $res = $result[($length - 1) / 2];
        }
        return $res;
    }
}
