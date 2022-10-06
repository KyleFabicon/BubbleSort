<?php
//KYLE T. FABICON

class ArraySort {
  public $arr;
  public $median;
  public $largest;

  protected function bubbleSort($arr) {
    $arrlength = count($arr)-1;
    for ($i=0; $i<$arrlength; $i++) {
      for ($j=0; $j<$arrlength-$i; $j++) {
        $k = $j+1;
        if ($arr[$k] < $arr[$j]) list($arr[$j], $arr[$k]) = array($arr[$k], $arr[$j]);// Swap values
      }
    }
    return $arr;
  }

  protected function findMedian($arr) {
    $temp = $this->bubbleSort($arr);
    $arrlength = count($temp);
    if($arrlength%2==0){ //if number of elements is even average the two median
      return ($temp[$arrlength/2] + $temp[($arrlength/2)-1])/2;
    }
    else{// if number of elements is odd get value in the middle
      return ($temp[$arrlength/2]);
    }
  }
  protected function findLargest($arr) {
    $temp = $this->bubbleSort($arr);
    return $temp[count($temp)-1]; // get last element of array
  }

  public function __construct($arr) { //constructor class
    $this->arr = $this->bubbleSort($arr);
    $this->median = $this->findMedian($arr);
    $this->largest = $this->findLargest($arr);
  }
}

//Child of Arraysort
class ArrayChild extends ArraySort {
  public function printMedian() {
    echo $this->median;
  }
  public function printLargest(){
    echo $this->largest;
  }
  public function printArray(){
    print_r($this->arr);
  }
}

$n = readline('Input number of integer in the array: ');
$arr = array();
$i = 0;
while($i<$n){
    $input = readline('Input integer: ');
    array_push($arr, $input);
    $i++;
}

//initiate class
$testArray = new ArrayChild($arr);
echo "The median is ";
$testArray->printMedian();
echo " and the largest is ";
$testArray->printLargest();

