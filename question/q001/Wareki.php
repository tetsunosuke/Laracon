<?php

/**
 * Created by PhpStorm.
 * User: fortegp05
 */

namespace LaravelJpCon\Q001;

use DateTime;

/**
 * Class Wareki
 * @package LaravelJpCon\Question\Q001
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
        Wareki::MEIJI => '18680125',
        Wareki::TAISYO => '19120730',
        Wareki::SYOWA => '19261225',
        Wareki::HEISEI => '19890108',
        Wareki::NEW_GENGO => '20190501'
    ];

    /** yyyymmddを入力すると和暦を返す
     * 入力値異常、江戸以前はERROR、新年号はNとして返す
     * @param string $ymd
     * @return string
     */
    public function getWareki(string $ymd): string
    {
        if (!$this->isDate($ymd)) {
            return Wareki::ERROR_MSG;
        }

        switch (true) {
            case $ymd < $this->wareki_start_days[Wareki::MEIJI]:
                return Wareki::ERROR_MSG;
            case $this->wareki_start_days[Wareki::MEIJI] <= $ymd && $ymd < $this->wareki_start_days[Wareki::TAISYO]:
                return Wareki::MEIJI;
            case $this->wareki_start_days[Wareki::TAISYO] <= $ymd && $ymd < $this->wareki_start_days[Wareki::SYOWA]:
                return Wareki::TAISYO;
            case $this->wareki_start_days[Wareki::SYOWA] <= $ymd && $ymd < $this->wareki_start_days[Wareki::HEISEI]:
                return Wareki::SYOWA;
            case $this->wareki_start_days[Wareki::HEISEI] <= $ymd && $ymd < $this->wareki_start_days[Wareki::NEW_GENGO]:
                return Wareki::HEISEI;
            case $this->wareki_start_days[Wareki::NEW_GENGO] <= $ymd:
                return Wareki::NEW_GENGO;
        }

        return Wareki::ERROR_MSG;
    }

    /** 引数チェックyyyymmddの妥当性チェック
     * @param string $ymd
     * @return bool
     */
    private function isDate(string $ymd): bool
    {
        $date = DateTime::createFromFormat(Wareki::DATE_FORMAT, $ymd);
        return $date && $date->format(Wareki::DATE_FORMAT) == $ymd;
    }
}