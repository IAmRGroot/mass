<?php

namespace App\Models\Request;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Request\Request
 *
 * @property integer $id
 * @property integer $type
 * @property integer $item_id
 * @property string $text
 * @property string $image_url
 * @property integer $request_status_id
 * @property integer $created_by
 * @property integer $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Request\RequestStatus $status
 * @method static \Illuminate\Database\Eloquent\Builder|Request newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Request newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Request query()
 * @method static \Illuminate\Database\Eloquent\Builder|Request whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Request whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Request whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Request whereImageUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Request whereItemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Request whereRequestStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Request whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Request whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Request whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Request whereUpdatedBy($value)
 * @mixin \Eloquent
 */
class Request extends BaseModel
{
    public $timestamps = true;

    public function status(): BelongsTo
    {
        return $this->belongsTo(RequestStatus::class, 'request_status_id');
    }
}
