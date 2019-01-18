<?php
/**
 * Created by PhpStorm.
 * User: fortegp05
 */

use LaravelJpCon\q002\YamanoteLine;
use PHPUnit\Framework\TestCase;

/**
 * Class YamanoteLineTest
 */
class YamanoteLineTest extends TestCase
{
    private static $yamanoteLine;

    /**
     * 初期設定
     */
    public static function setUpBeforeClass()
    {
        // テストクラス内でオブジェクトを使い回すためstaticで宣言する
        self::$yamanoteLine = new YamanoteLine();
    }

    /**
     * 開始駅テスト
     */
    public function test_startStationIsTokyo()
    {
        $this->assertSame('東京駅', self::$yamanoteLine->nowStation(), '東京から始まっているか?');
    }

    /**
     * 東京からの内回りテスト
     */
    public function test_uchimawari()
    {
        $this->assertSame('神田駅', self::$yamanoteLine->nextStationUchimawari(), '内回りの駅確認');
    }

    /**
     * 東京からの外回りテスト
     */
    public function test_sotomawari()
    {
        $this->assertSame('東京駅', self::$yamanoteLine->nextStationSotomawari(), '外回りの駅確認');
    }

    /**
     * 内回りのループ確認
     */
    public function test_loopUchimawari()
    {
        self::$yamanoteLine->reset();
        for ($i = 0; $i < 29; $i++) {
            self::$yamanoteLine->nextStationUchimawari();
        }
        $this->assertSame('東京駅', self::$yamanoteLine->nextStationUchimawari(), '内回りのループ確認');
    }

    /**
     * 外回りのループ確認
     */
    public function test_loopSotomawari()
    {
        self::$yamanoteLine->reset();
        for ($i = 0; $i < 29; $i++) {
            self::$yamanoteLine->nextStationSotomawari();
        }
        $this->assertSame('東京駅', self::$yamanoteLine->nextStationSotomawari(), '外回りのループ確認');
    }

    /**
     * リセット後の駅確認テスト
     */
    public function test_resetCursorIsTokyo()
    {
        self::$yamanoteLine->reset();
        $this->assertSame('東京駅', self::$yamanoteLine->nowStation(), '東京にリセットされるか?');
    }
}