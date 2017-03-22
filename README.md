Sample Validation Library PHP
=============================

Simple library to validate user data (forms).

- Requirements: PHP >= 5.2
- Author: Jason Byers

Example Usage
-------------

```php
use Jasamy\Validate;
use Jasamy\Validators;

$data = array(
    'email' => 'jas@webmuscle.co.uk',
    'url' => 'http://www.google.com',
    'country' => 'UK',
    'string' => 'test string length',
    'password' => 'abcdE904');

$validate = new Validate($data, array(
            new Validators\Email('email', 'must be an email address'),
            new Validators\Url('url', 'must be a valid url'),
            new Validators\Upper('country', 'country code must be uppercase'),
            new Validators\Length('country', 'country code must consist of 2 letters', 2, 2),
            new Validators\Alpha('country', 'country code must only contain letters'),
            new Validators\Length('string', 'string length must be between 5 and 20 characters', 5, 20),
            new Validators\Length('password', 'password must be 8 characters long', 8, 8),
            new Validators\OneNumber('password', 'password must contain at least one number'),
            new Validators\OneLetter('password', 'password must contain at least on letter'),
));

if (! $validate->execute()) {
    print_r($validate->getErrors()); // Get validation errors
}
```

Validators
----------

### Alpha

Allow only letters.

    new Validators\Alpha($field, $error message);

### Email

Only valid email addresses are supported.

    new Validators\Email($field, $error_message);

### Length

Allow only strings with a correct length.

    new Validators\Length($field, $error_message, $min, $max);

### OneLetter

Allow only strings which contain at least one letter (for passwords).

    new Validators\OneLetter($field, $error_message);

### OneNumber

Allow only strings which contain at least one number (for passwords).

    new Validators\OneNumber($field, $error_message);

### Upper

Allow only uppercase.

    new Validators\Upper($field, $error_message);

### Url

Allow only valid urls.

    new Validators\Url($field, $error_message);

