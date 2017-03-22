<?php

namespace Jasamy\Validators;

class Email extends Base
{
    public function execute(array $data)
    {
        if ($this->isFieldNotEmpty($data)) {
            $parts = explode('@', $data[$this->field]);

            if (count($parts) !== 2) {
                return false;
            }

            $len = mb_strlen($parts[0]);
            if ($len === 0 || $len > 64) {
                return false;
            }

            $len = mb_strlen($parts[1]);
            if ($len === 0 || $len > 255) {
                return false;
            }

            if ($parts[0]{0} === '.') {
                return false;
            }

            if (strpos($parts[0], '..') !== false || strpos($parts[1], '..') !== false) {
                return false;
            }
        }

        return true;
    }
}