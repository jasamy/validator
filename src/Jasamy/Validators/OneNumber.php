<?php

namespace Jasamy\Validators;

class OneNumber extends Base
{
    public function execute(array $data)
    {
        if ($this->isFieldNotEmpty($data)) {
            
            if (!preg_match("#[0-9]+#", $data[$this->field])) {
                return false;
            }
        }

        return true;
    }
}