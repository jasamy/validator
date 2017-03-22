<?php

namespace Jasamy\Validators;

class Upper extends Base
{
    public function execute(array $data)
    {
        if ($this->isFieldNotEmpty($data)) {
            
            return ctype_upper($data[$this->field]);
            
        }

        return true;
    }
}