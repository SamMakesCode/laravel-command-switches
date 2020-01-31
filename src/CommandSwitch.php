<?php

namespace SamMakesCode\CommandSwitches;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

/**
 * \SamLittler\CommandSwitches\App\CommandSwitch
 *
 * @property int $id
 * @property string $command
 * @property int $is_on
 * @method static \Illuminate\Database\Eloquent\Builder|\SamMakesCode\CommandSwitches\CommandSwitch newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\SamMakesCode\CommandSwitches\CommandSwitch newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\SamMakesCode\CommandSwitches\CommandSwitch query()
 * @method static \Illuminate\Database\Eloquent\Builder|\SamMakesCode\CommandSwitches\CommandSwitch whereCommand($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\SamMakesCode\CommandSwitches\CommandSwitch whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\SamMakesCode\CommandSwitches\CommandSwitch whereIsOn($value)
 */
class CommandSwitch extends Model
{
    const ON = 1;
    const OFF = 0;

    protected $fillable = [
        'command',
        'is_on',
    ];

    public $timestamps = false;

    public static function findOrCreate(string $command) : self
    {
        try {
            $instance = self::where('command', $command)
                ->firstOrFail();
        } catch (ModelNotFoundException $modelNotFoundException) {
            $instance = self::create([
                'command' => $command,
            ]);
            $instance->refresh();
        }

        return $instance;
    }

    public function isOn() : bool
    {
        return $this->is_on === self::ON;
    }

    public function isOff() : bool
    {
        return $this->is_on === self::OFF;
    }

    public function setOn()
    {
        $this->is_on = self::ON;
        $this->save();
    }

    public function setOff()
    {
        $this->is_on = self::OFF;
        $this->save();
    }
}
