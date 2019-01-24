<?php

/**
 * Created by PhpStorm.
 * User: fortegp05
 */

namespace LaravelJpCon\q001;

use DateTime;

/**
 * Class Wareki
 * @package LaravelJpCon\Question\q001
 */
class Wareki
{
    const MEIJI = 'M';
    const TAISYO = 'T';
    const SYOWA = 'S';
    const HEISEI = 'H';
    const NEW_GENGO = 'N';
    const DATE_FORMAT = 'Ymd';
    const ERROR_MSG = 'ERROR';
    private $wareki_start_days = [
        self::MEIJI => '18680125',
        self::TAISYO => '19120730',
        self::SYOWA => '19261225',
        self::HEISEI => '19890108',
        self::NEW_GENGO => '20190501'
    ];

    /** yyyymmddを入力すると和暦を返す
     * 入力値異常、江戸以前はERROR、新年号はNとして返す
     * @param string $ymd
     * @return string
     */
    public function getWareki(string $ymd): string
    {
        if (!$this->isDate($ymd)) {
            return self::ERROR_MSG;
        }

        switch (true) {
            case $ymd < $this->wareki_start_days[self::MEIJI]:
                return self::ERROR_MSG;
            case $this->wareki_start_days[self::MEIJI] <= $ymd && $ymd < $this->wareki_start_days[self::TAISYO]:
                return self::MEIJI;
            case $this->wareki_start_days[self::TAISYO] <= $ymd && $ymd < $this->wareki_start_days[self::SYOWA]:
                return self::TAISYO;
            case $this->wareki_start_days[self::SYOWA] <= $ymd && $ymd < $this->wareki_start_days[self::HEISEI]:
                return self::SYOWA;
            case $this->wareki_start_days[self::HEISEI] <= $ymd && $ymd < $this->wareki_start_days[self::NEW_GENGO]:
                return self::HEISEI;
            case $this->wareki_start_days[self::NEW_GENGO] <= $ymd:
                return self::NEW_GENGO;
        }

        return self::ERROR_MSG;
    }

    /** 引数チェックyyyymmddの妥当性チェック
     * @param string $ymd
     * @return bool
     */
    private function isDate(string $ymd): bool
    {
        $date = DateTime::createFromFormat(self::DATE_FORMAT, $ymd);
        return $date && $date->format(self::DATE_FORMAT) == $ymd;
    }
}