<?php

namespace Jasamy\Validators;

class Upper extends Base
{
    public function execute(array $data)
    {
        if ($this->isFieldNotEmpty($data)) {
            
            if (ctype_upper($data) === false) {
                return false;
            }
        }

        return true;
    }
}