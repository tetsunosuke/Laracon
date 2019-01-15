<?php
/**
 * Created by PhpStorm.
 * User: fortegp05
 */

use \PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../question/q001/Wareki.php';

class TestWareki extends TestCase
{
    const RESULT_MSG = 'RESULT';
    const INPUT = 'INPUT';
    private $testData = [
        '日付じゃない(文字列)' => [TestWareki::RESULT_MSG => Wareki::ERROR_MSG, TestWareki::INPUT => 'HOGEHOGE'],
        '日付じゃない(数値)' => [TestWareki::RESULT_MSG => Wareki::ERROR_MSG, TestWareki::INPUT => '00000000'],
        'あり得ない日付' => [TestWareki::RESULT_MSG => Wareki::ERROR_MSG, TestWareki::INPUT => '20180229'],
        '江戸' => [TestWareki::RESULT_MSG => Wareki::ERROR_MSG, TestWareki::INPUT => '16030101'],
        '江戸終了境界' => [TestWareki::RESULT_MSG => Wareki::ERROR_MSG, TestWareki::INPUT => '18680124'],
        '明治開始境界' => [TestWareki::RESULT_MSG => Wareki::MEIJI, TestWareki::INPUT => '18680125'],
        '明治終了境界' => [TestWareki::RESULT_MSG => Wareki::MEIJI, TestWareki::INPUT => '19120729'],
        '大正開始境界' => [TestWareki::RESULT_MSG => Wareki::TAISYO, TestWareki::INPUT => '19120730'],
        '大正終了境界' => [TestWareki::RESULT_MSG => Wareki::TAISYO, TestWareki::INPUT => '19261224'],
        '昭和開始境界' => [TestWareki::RESULT_MSG => Wareki::SYOWA, TestWareki::INPUT => '19261225'],
        '昭和終了境界' => [TestWareki::RESULT_MSG => Wareki::SYOWA, TestWareki::INPUT => '19890107'],
        '平成開始境界' => [TestWareki::RESULT_MSG => Wareki::HEISEI, TestWareki::INPUT => '19890108'],
        '平成終了境界' => [TestWareki::RESULT_MSG => Wareki::HEISEI, TestWareki::INPUT => '20190420'],
        '新年号開始境界' => [TestWareki::RESULT_MSG => Wareki::NEW_GENGO, TestWareki::INPUT => '20190501'],
    ];

    public function test_wareki()
    {
        $wareki = new Wareki();
        echo PHP_EOL;
        foreach ($this->testData as $title => $data) {
            echo $title . ' RESULT=' . $wareki->getWareki($data[TestWareki::INPUT]) . PHP_EOL;
            $this->assertTrue($wareki->getWareki($data[TestWareki::INPUT]) === $data[TestWareki::RESULT_MSG]);
        }
    }
}