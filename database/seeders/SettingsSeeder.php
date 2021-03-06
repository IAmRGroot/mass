<?php

namespace Database\Seeders;

use App\Models\Auth\User;
use App\Models\System\Setting;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    public function run(): void
    {
        $movie_profile = config('profiles.from_movie')[0]['id'] ?? 1;
        $serie_profile = config('profiles.from_serie')[0]['id'] ?? 1;

        $default_settings = [
            [
                'type'      => Setting::TYPE_BOOLEAN,
                'name'      => Setting::NAME_LOG_DISK,
                'value'     => Setting::encodeValue(false, Setting::TYPE_BOOLEAN),
                'component' => 'Boolean',
            ],
            [
                'type'      => Setting::TYPE_BOOLEAN,
                'name'      => Setting::NAME_LOG_MEMORY,
                'value'     => Setting::encodeValue(false, Setting::TYPE_BOOLEAN),
                'component' => 'Boolean',
            ],
            [
                'type'      => Setting::TYPE_BOOLEAN,
                'name'      => Setting::NAME_LOG_CPU,
                'value'     => Setting::encodeValue(false, Setting::TYPE_BOOLEAN),
                'component' => 'Boolean',
            ],
            [
                'type'      => Setting::TYPE_INTEGER,
                'name'      => Setting::NAME_MOVIE_PROFILE,
                'value'     => Setting::encodeValue($movie_profile, Setting::TYPE_INTEGER),
                'component' => 'SelectMovieProfile',
            ],
            [
                'type'      => Setting::TYPE_INTEGER,
                'name'      => Setting::NAME_SERIE_PROFILE,
                'value'     => Setting::encodeValue($serie_profile, Setting::TYPE_INTEGER),
                'component' => 'SelectSerieProfile',
            ],
        ];

        foreach ($default_settings as $setting) {
            $setting = Setting::firstOrNew([
                'name' => $setting['name'],
            ], [
                'type'       => $setting['type'],
                'value'      => $setting['value'],
                'component'  => $setting['component'],
                'updated_by' => User::ADMIN,
            ]);

            if (! $setting->exists) {
                $setting->save();
            }
        }
    }
}
