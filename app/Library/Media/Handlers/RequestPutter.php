<?php

namespace App\Library\Media\Handlers;

use App\Enums\ItemType;
use App\Library\Http\Client;
use App\Library\Media\DataObjects\SearchResult;
use App\Library\Media\Requests\Radarr\AddMovieRequest;
use App\Library\Media\Requests\Radarr\SearchByIdRequest as MovieSearchByIdRequest;
use App\Library\Media\Requests\Sonarr\AddSerieRequest;
use App\Library\Media\Requests\Sonarr\SearchByIdRequest as SerieSearchByIdRequest;
use App\Models\Request\Request;
use App\Models\System\Setting;

class RequestPutter
{
    public static function put(Request $request): void
    {
        if (ItemType::Movie === $request->type) {
            self::putMovie($request);
        } else {
            self::putSerie($request);
        }
    }

    private static function putMovie(Request $request): void
    {
        $client         = new Client();
        $search_request = new MovieSearchByIdRequest($request->item_id);

        /** @var SearchResult $result */
        $result          = $client->doRequest($search_request)->getData()->first();
        $profile_setting = Setting::whereMovieProfile()->firstOrFail();

        $put_request = new AddMovieRequest([
            'title'            => $result->title,
            'qualityProfileId' => $profile_setting->value,
            'titleSlug'        => $result->title_slug,
            'images'           => $result->images,
            'tmdbId'           => $result->tmdb_id,
            'year'             => $result->year,
            'path'             => config('apis.radarr.folder') . $result->title . ' (' . $result->year . ')',
            'monitored'        => true,
            'addOptions'       => [
                'searchForMovie' => true,
            ],
        ]);

        $client->doRequest($put_request)->getData();
    }

    private static function putSerie(Request $request): void
    {
        $client         = new Client();
        $search_request = new SerieSearchByIdRequest($request->item_id);

        /** @var SearchResult $result */
        $result          = $client->doRequest($search_request)->getData()->first();
        $profile_setting = Setting::whereSerieProfile()->firstOrFail();

        $put_request = new AddSerieRequest([
            'title'            => $result->title,
            'qualityProfileId' => $profile_setting->value,
            'titleSlug'        => $result->title_slug,
            'images'           => $result->images,
            'tvdbId'           => $result->tvdb_id,
            'year'             => $result->year,
            'seasons'          => $result->seasons,
            'path'             => config('apis.sonarr.folder') . $result->title,
            'monitored'        => true,
            'seasonFolder'     => true,
            'addOptions'       => [
                'searchForMissingEpisodes' => true,
            ],
        ]);

        $client->doRequest($put_request)->getData();
    }
}
