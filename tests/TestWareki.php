<?php
/**
 * Created by PhpStorm.
 * User: fortegp05
 */

use LaravelJpCon\Q001\Wareki;
use PHPUnit\Framework\TestCase;

/**
 * Class TestWareki
 */
class TestWareki extends TestCase
{
    private $wareki;
    const RESULT_MSG = 'RESULT';
    const INPUT = 'INPUT';
    private $testData = [
        '日付じゃない(文字列)' => [TestWareki::RESULT_MSG => Wareki::ERROR_MSG, TestWareki::INPUT => 'HOGEHOGE'],
        '日付じゃない(数値)' => [TestWareki::RESULT_MSG => Wareki::ERROR_MSG, TestWareki::INPUT => '00000000'],
        'あり得ない日付' => [TestWareki::RESULT_MSG => Wareki::ERROR_MSG, TestWareki::INPUT => '20180229'],
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

    /**
     * 初期設定
     */
    public function setUp()
    {
        $this->wareki = new Wareki();
    }

    /**
     * dataProvider未使用版。
     *
     */
    public function test_wareki_no_dataProvider()
    {
        foreach ($this->testData as $title => $data) {
            $this->assertSame($data[TestWareki::RESULT_MSG], $this->wareki->getWareki($data[TestWareki::INPUT]), $title);
        }
    }

    /**
     * dataProvider使用版。
     * 入力しているデータはkey=>array()となっているが、引数で入力されるのはarray()のみ
     * keyは失敗時にテスト名として表示される
     * @dataProvider dataProvider
     * @param $expected
     * @param $input
     */
    public function test_wareki_dataProvider($expected, $input)
    {
        $this->assertSame($expected, $this->wareki->getWareki($input));
    }

    /**
     * @return array
     */
    public function dataProvider()
    {
        return $this->testData;
    }
}