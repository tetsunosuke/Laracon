<?php

namespace LaravelJpCon\tetsunosukeq1;

/**
 * Class Calculator
 * 
 */
class Calculator
{
    /**
     * こちらは単純な足し算。普通のテストを書きましょう
     */ 
    public function add($a, $b)
    {
        return $a + $b;
    }

    /**
     * 割り算。 $b に 0を入れると明らかに問題が起きそうなコード
     * そのためにテストを書く必要がありそう
     *
     * また、 int / int の計算はintを返したりしないか気になります
     */
    public function divide($a, $b)
    {
        return $a / $b;
    }

    public function format(string $str): string
    {
        // number_format ( float $number [, int $decimals = 0 ] ) : string
        // この変換はやや想定外の挙動をするので、テストしておきたい
        $f = floatval($str);
        return number_format($f);
    }
}
