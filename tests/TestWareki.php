<?php

use \PHPUnit\Framework\TestCase;

require_once(__DIR__ . '/../question/q001/Wareki.php');

class TestWareki extends TestCase
{
    private $wareki;
    const RESULT_MSG = 'RESULT';
    const INPUT = 'INPUT';

    public function setUp()
    {
        $this->wareki = new Wareki();
    }

    /**
     * @dataProvider getWarekiDataProvider
     */
    public function testGetWareki($text, $expected, $input)
    {
        $this->assertSame($expected, $this->wareki->getWareki($input), $text);
    }

    /**
     * 
     */
    public function getWarekiDataProvider()
    {
        // 説明テキスト、期待される出力、関数への入力値
        return [
            ['日付じゃない(文字列)',    Wareki::ERROR_MSG, 'HOGEHOGE'],
            ['日付じゃない(数値)',      Wareki::ERROR_MSG, '00000000'],
            ['平成開始境界',            Wareki::HEISEI,    '19890108'],
            ['あり得ない日付',          Wareki::ERROR_MSG, '20180229'],
            ['江戸',                    Wareki::ERROR_MSG, '16030101'],
            ['江戸終了境界',            Wareki::ERROR_MSG, '18680124'],
            ['明治開始境界',            Wareki::MEIJI,     '18680125'],
            ['明治終了境界',            Wareki::MEIJI,     '19120729'],
            ['大正開始境界',            Wareki::TAISYO,    '19120730'],
            ['大正終了境界',            Wareki::TAISYO,    '19261224'],
            ['昭和開始境界',            Wareki::SYOWA,     '19261225'],
            ['昭和終了境界',            Wareki::SYOWA,     '19890107'],
            ['平成開始境界',            Wareki::HEISEI,    '19890108'],
            ['平成終了境界',            Wareki::HEISEI,    '20190420'],
            ['新年号開始境界',          Wareki::NEW_GENGO, '20190501'],
        ];
    }
}
