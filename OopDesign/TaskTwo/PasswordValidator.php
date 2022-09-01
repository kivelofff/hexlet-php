<?php

namespace OopDesign\TaskTen\TaskTwo;

class PasswordValidator
{
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }
    
    private $options;

    public function validate(string $password): array
    {
        $containNumbers = $this->options['containNumbers'] ?? null;
        $minLength = $this->options['minLength'] ?? 7;
        $errors = [];
        if (strlen($password) < $minLength) {
            $errors['minLength'] = 'too small';
        }
        if ($containNumbers !== null && $this->hasNumber($password) != $containNumbers) {
            $errors['containNumbers'] = 'should contain at least one number';
        }
        return $errors;
    }
    
    private function hasNumber(string $password): bool
    {
        return preg_match('~[0-9]+~', $password) === 1;
    }
}