<?php

namespace LaravelJpCon\q002;

/**
 * Class YamanoteLine
 * @package LaravelJpCon\Question\q002
 */
class YamanoteLine
{
    // 東京から内回りで定義した駅名配列
    private $stations = [
        '東京駅',
        '神田駅',
        '秋葉原駅',
        '御徒町駅',
        '上野駅',
        '鶯谷駅',
        '日暮里駅',
        '西日暮里駅',
        '田端駅',
        '駒込駅',
        '巣鴨駅',
        '大塚駅',
        '池袋駅',
        '目白駅',
        '高田馬場駅',
        '新大久保駅',
        '新宿駅',
        '代々木駅',
        '原宿駅',
        '渋谷駅',
        '恵比寿駅',
        '目黒駅',
        '五反田駅',
        '大崎駅',
        '品川駅',
        '高輪ゲートウェイ駅',
        '田町駅',
        '浜松町駅',
        '新橋駅',
        '有楽町駅'
    ];
    private $cursol = 0;

    /**
     * 現在の駅を取得する(東京から始まる)
     * @return string
     */
    public function nowStation(): string
    {
        return $this->stations[$this->cursol];
    }

    /**
     * 外回りで駅を取得する(東京->神田->秋葉原->御徒町->上野…)
     * @return string
     */
    public function nextStationUchimawari(): string
    {
        $this->cursol++;

        if ($this->cursol > (count($this->stations) - 1)) {
            $this->cursol = 0;
        }
        
        return $this->stations[$this->cursol];
    }

    /**
     * 外回りで駅を取得する(東京->有楽町->新橋->浜松町…)
     * @return string
     */
    public function nextStationSotomawari(): string
    {
        $this->cursol--;

        if ($this->cursol < 0) {
            $this->cursol = count($this->stations) - 1;
        }

        return $this->stations[$this->cursol];
    }

    /**
     * 東京に戻す
     */
    public function reset(): void
    {
        $this->cursol = 0;
    }
}