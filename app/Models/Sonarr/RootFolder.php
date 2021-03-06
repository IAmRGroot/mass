<?php

namespace App\Models\Sonarr;

use App\Models\Shared\RootFolder as SharedRootFolder;

/**
 * App\Models\Sonarr\RootFolder.
 *
 * @property int    $Id
 * @property string $Path
 *
 * @method static \Illuminate\Database\Eloquent\Builder|RootFolder newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RootFolder newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RootFolder query()
 * @method static \Illuminate\Database\Eloquent\Builder|RootFolder whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RootFolder wherePath($value)
 * @mixin \Eloquent
 */
class RootFolder extends SharedRootFolder
{
    protected $connection = 'sonarr_sqlite';

    protected static function getPath(): string
    {
        return config('apis.sonarr.folder');
    }
}
