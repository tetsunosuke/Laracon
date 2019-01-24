<?php

// メソッド呼び出し時に例外が出るように定義
declare(strict_types = 1);

namespace LaravelJpCon\qqqq;


class ThrowException
{

    const MESSAGE_ARGUMENT_IS_TOO_SHORT = 'can not explode because $str is too short';

    /**
     * 入力された文字列を文字列で分割しようとはしているが...？
     */
    public function callExplodeThrowsException(string $str): string
    {
        try {
            if (strlen($str) <= 1) {
                // 一文字しかないので引数が不正として例外にする
                throw new \Exception(self::MESSAGE_ARGUMENT_IS_TOO_SHORT);
            }
            // explode ( string $delimiter , string $string [, int $limit = PHP_INT_MAX ] ) : array

            // これでは明らかに引数が足らない
            // 実際には ArgumentCountError が発生する
            return explode($str); 
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function callExplodeReturnTypeIsBad(string $str): string
    {
        if (strlen($str) <= 1) {
            // 一文字しかないので引数が不正として例外にする
            throw new \Exception(self::MESSAGE_ARGUMENT_IS_TOO_SHORT);
        }

        return explode($str, ","); 
    }
    public function callExplodeNormally(string $str): array
    {
        if (strlen($str) <= 1) {
            // 一文字しかないので引数が不正として例外にする
            throw new \Exception(self::MESSAGE_ARGUMENT_IS_TOO_SHORT);
        }

        return explode(",", $str);
    }
}
