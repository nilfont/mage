<?php

namespace Omatech\Mage\App\Repositories\Translation;

use Illuminate\Contracts\Translation\Loader;
use Illuminate\Translation\Translator;
use Illuminate\Contracts\Translation\Translator as TranslatorContract;

class CustomTranslator extends Translator implements TranslatorContract
{
    private $exists;

    public function __construct(Loader $loader, string $locale)
    {
        parent::__construct($loader, $locale);

        $this->exists = app()->make(ExistsCreateTranslation::class);
    }

    public function get($key, array $replace = [], $locale = null, $fallback = true)
    {
        $this->exists->make($key);
        return parent::get($key, $replace, $locale, $fallback); // TODO: Change the autogenerated stub
    }
}
