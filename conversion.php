<?php
 function conversion($number_to_be_converted) 
 { 
    $number_to_be_converted_taken = $number_to_be_converted;
    if (($number_to_be_converted < 0) || ($number_to_be_converted > 99999999999999)) 
    { 
        throw new Exception("number_to_be_converted is out of range");
    } 
    $koti = floor($number_to_be_converted / 10000000); /* Koti */
    $number_to_be_converted -= $koti * 10000000;
    $lakh = floor($number_to_be_converted / 100000);  /* lakh  */ 
    $number_to_be_converted -= $lakh * 100000; 
    $thousand = floor($number_to_be_converted / 1000);     /* Thousands (kilo) */ 
    $number_to_be_converted -= $thousand * 1000; 
    $houndred = floor($number_to_be_converted / 100);      /* Hundreds (hecto) */ 
    $number_to_be_converted -= $houndred * 100; 
    $ten = floor($number_to_be_converted / 10);       /* Tens (deca) */ 
    $one = $number_to_be_converted % 10;               /* Ones */ 
    $result = ""; 
    if ($koti) 
    { 
        $result .= conversion($koti) . " কোটি  "; 
    } 
    if ($lakh) 
    { 
        $result .= conversion($lakh) . " লাখ  "; 
    } 
    if ($thousand) 
    { 
        $result .= (empty($result) ? "" : " ") . 
        conversion($thousand) . " হাজার  "; 
    } 
    if ($houndred) 
    { 
        $result .= (empty($result) ? "" : " ") . 
        conversion($houndred) . " শত  "; 
    } 
    $ones = array("", "এক", "দুই", "তিন", "চার", "পাচ", "ছয়", 
        "সাত", "আট", "নয়", "দশ", "েগার", "বার", "তের", 
        "চৌদ্দ", "পনের", "ষোল", "সতের", "আঠারো", 
        "উনিশ","বিশ","একুশ","বাইশ","তেইশ","চব্বিশ","পচিশ","ছাব্বিশ","সাতাশ","আঠাস","ঊনত্রিশ","ত্রিশ","একত্রিশ","বত্রিশ","তেত্রিশ","চৌত্রিশ","পঁয়ত্রিশ","ছত্রিশ","সাতত্রিশ","আটত্রিশ","ঊনচল্লিশ","চল্লিশ","একচল্লিশ","বেয়াল্লিশ","তেতাল্লিশ","চুয়াল্লিশ","পঁয়তাল্লিশ","ছেচল্লিশ","সাতচল্লিশ","আটচল্লিশ","ঊনপঞ্চাশ","পঞ্চাশ","একান্ন","বায়ান্ন","তেপ্পান্ন","চুয়ান্ন","পঞ্চান্ন","ছাপ্পান্ন","সাতান্ন","আটান্ন","ঊনষ্ট","ষাট","একষট্টি","বাষট্টি","তেষট্টি","চৌষট্টি","পয়ষট্টি","ছেষট্টি","সাতষট্টি","আটষট্টি","ঊনসত্তর","সত্তর","একত্তর","বাহাত্তর","তেহাত্তর","চুহাত্তর","পঁচাত্তর","ছিয়াত্তর","সাতাত্তর","আটাত্তর","ঊন আশি","আশি","একাশি","বিরাশি","তেরাশি","চুরাশি","পঁচাশি","ছেয়াশি","সাতাশি","আটাশি","ঊননব্বই","নব্বই","একানব্বই","বিরানব্বই","তিরানব্বই","চুরানব্বই","পচানব্বই","ছিয়াননব্বই","সাতানব্বই","আটানব্বই","নিরানব্বই"); 
    $tens = array("", "", "বিশ", "ত্রিশ", "চল্লিশ", "প্নচাশ", "ষাট", 
        "সত্তর", "আশি", "নব্বই"); 
    if ($ten || $one) 
    { 
        if (!empty($result)) 
        { 
            $result .= "  "; 
        }
        $result .= $ones[$ten * 10 + $one]; 
    }  
    if (empty($result)) 
    { 
        $result = "শূণ্য টাকা "; 
    } 
    return $result; 
}

echo conversion("100000000000");
                                ?> 