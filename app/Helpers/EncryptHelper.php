<?php
// app/Helpers/EncryptHelper.php
namespace App\Helpers;

use Illuminate\Support\Facades\Crypt;

class EncryptHelper
{
    /**
     * Encrypt a value for use in URLs.
     *
     * @param mixed $value
     * @return string
     */
    public static function enc($value): string
    {
        return Crypt::encrypt($value);
    }

    /**
     * Decrypt a previously‑encrypted value.
     *
     * @param string $value
     * @return mixed
     */
    public static function dec(string $value)
    {
        return Crypt::decrypt($value);
    }
}