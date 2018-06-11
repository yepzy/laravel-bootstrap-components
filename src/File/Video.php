<?php

namespace Okipa\LaravelBootstrapComponents\File;

class Video extends Media
{
    /**
     * The component config key.
     *
     * @property string $view
     */
    protected $configKey = 'video';
    /**
     * The video poster.
     *
     * @property string $poster
     */
    protected $poster;

    /**
     * Set the video poster.
     *
     * @param string $poster
     *
     * @return \App\Components\File\Video
     */
    public function poster(string $poster): Video
    {
        $this->poster = $poster;

        return $this;
    }

    /**
     * Set the video values.
     *
     * @return array
     */
    protected function values(): array
    {
        return array_merge(parent::values(), [
            'poster' => array_merge($this->defaultPoster(), $this->poster)
        ]);
    }

    /**
     * Set the default video poster.
     *
     * @return array
     */
    protected function defaultPoster(): array
    {
        returnconfig('bootstrap-components.' . $this->configKey . '.poster');
    }
}
