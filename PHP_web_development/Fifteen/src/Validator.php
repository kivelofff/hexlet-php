<?php

namespace Web\Fifteen\src;

class Validator implements ValidatorInterface
{
    public function validate(array $data)
    {
        // TODO: Implement validate() method.
        $errors = [];
        if (empty($data['title'])) {
            $errors['title'] = "Can't be blank";
        }
        if ($data['paid'] !== 0 && $data['paid'] !== 1) {
            $errors['paid'] = "Can't be blank";
        }
        return $errors;
    }
}
