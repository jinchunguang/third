```
<?php

class Currency {

    public function __construct(int $scale = 6) {
        bcscale($scale);
    }

    //设置保留的位数
    public function setScale(int $scale) : bool {
        return bcscale($scale);
    }

    //加法
    public function add(array $list, $scale = null) : string {
        if(empty($list)) {
            return 0;
        }

        $total = 0;
        foreach($list as $item) {
            $total = bcadd($total, $item, $scale);
        }
    
        return $total;
    }

    //减法
    public function sub(string $left, string $right, $scale = null) : string {
        return bcsub($left, $right, $scale);
    }

    //乘法
    public function mul(string $left, string $right, $scale = null) : string {
        return bcmul($left, $right, $scale);
    }

    //除法
    public function div(string $left, string $right, $scale = null) : string {
        return bcdiv($left, $right, $scale);
    }

    public function ceil(string $number) : string {
        if ($number[0] != '-')
        {
            return bcadd($number, 1, 0);
        }

        return bcsub($number, 0, 0);
    }

    public function floor(string $number) : string {
        if ($number[0] != '-') {
            return bcadd($number, 0, 0);
        }

        return bcsub($number, 1, 0);
    }

    public function round(string $number, int $precision = 0) : string {
        if ($number[0] != '-') {
            return bcadd($number, '0.' . str_repeat('0', $precision) . '5', $precision);
        }

        return bcsub($number, '0.' . str_repeat('0', $precision) . '5', $precision);
    }

    public function number_format(string $number, int $decimals = 0) : string {
        $item = $this->round($number, $decimals);
        //切割数字和小数点部分
        $sepList = explode(".", $item);
        $float = "";
        $integer = array_shift($sepList);
        if(count($sepList) > 0) {
            $float = implode("", $sepList);
        }
        
        $len = strlen($integer);
        if($len <= 3){
            return $item;
        }
        
        $newNumber = preg_replace_callback("/(\d{1,3})(?=(\d{3})+(?:$|\D))/", "self::merge_number", $integer);
        return $newNumber . "." . $float;
    }

    private function merge_number(array $matches) {
        return $matches[1].",";
    }
}

```
