laravel-command-switches
---

The main purpose of this library is to introduce a stardard way of switching console commands on and off. It's something I regularly want to do in the event of a failing job.

# Requirements

- PHP 7.1+
- Laravel 5.6+

# Installation

This library can be installed simply with composer.

`composer require sammakescode/laravel-command-switches`

After installation, run your migrations.

`php artisan migrate`

# Usage

## Checking if your command is switched on

In your command use the `Switchable` trait.

```php
    use SamMakesCode\CommandSwitches\Traits\Switchable;
```

You can then use the following functionality to determine if the command has been switched off.

```php
    if ($this->isOff()) {
        \Log::notice($this->signature . ' is switched off');
        return;
    }
    // Your functionality
```

You can also use `isOn()`.

```php
    if ($this->isOn()) {
        // Your functionality
    }
```

Here's a more complete example to add some context.

```php
<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use SamMakesCode\CommandSwitches\Traits\Switchable;

class SomeCommand extends Command
{
    use Switchable;

    protected $signature = 'some-command';

    protected $description = 'Command description';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        if ($this->isOn()) {
            // Your functionality
        }
    }
}
```

## Switching you commands on and off

You can toggle your commands and off anywhere in your code (such as in a admin section) like this:

```php
    \SamMakesCode\CommandSwitches\CommandSwitch::findOrCreate(SomeCommand::class)->setOn();
````
