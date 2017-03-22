<?php

namespace Jasamy\Validators;

class Url extends Base
{
    public function execute(array $data)
    {
        if ($this->isFieldNotEmpty($data)) {
            
            if (!filter_var($data, FILTER_VALIDATE_URL) === false) {
                return false;
            }
        }

        return true;
    }
}