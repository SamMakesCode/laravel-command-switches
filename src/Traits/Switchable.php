<?php

namespace SamMakesCode\CommandsSwitches\Traits;

use SamMakesCode\CommandSwitches\CommandSwitch;

trait Switchable
{
    public function isOn()
    {
        $command = CommandSwitch::findOrCreate(self::class);

        return $command->isOn();
    }

    public function isOff()
    {
        $command = CommandSwitch::findOrCreate(self::class);

        return $command->isOff();
    }
}
