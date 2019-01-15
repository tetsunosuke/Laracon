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
     * あえて失敗するテストも書いておきますね！
     * @dataProvider getWarekiDataProviderFailure
     *
     */
    public function testGetWarekiFailure($text, $expected, $input)
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
            ['日付じゃない(文字列)' , Wareki::ERROR_MSG, 'HOGEHOGE'],
            ['日付じゃない(数値)'   , Wareki::ERROR_MSG, '00000000'],
            ['平成開始境界'         , Wareki::HEISEI,    '19890108'],
            // 省略
        ];
    }
    /**
     * 
     */
    public function getWarekiDataProviderFailure()
    {
        // 説明テキスト、期待される出力、関数への入力値
        return [
            ['日付じゃない(文字列)' , Wareki::HEISEI,   'HOGEHOGE'],
            ['平成開始境界'         , Wareki::MEIJI,    '19890108'],
            // 省略
        ];
    }

}
