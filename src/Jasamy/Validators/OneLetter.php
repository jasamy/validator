<?php

namespace Jasamy\Validators;

class OneLetter extends Base
{
    public function execute(array $data)
    {
        if ($this->isFieldNotEmpty($data)) {
            
            if (!preg_match("#[a-zA-Z]+#", $data[$this->field])) {
                return false;
            }
        }

        return true;
    }
}