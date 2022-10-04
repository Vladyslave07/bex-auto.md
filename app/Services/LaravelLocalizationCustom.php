<?php


namespace App\Services;


use Illuminate\Contracts\Routing\UrlRoutable;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Mcamara\LaravelLocalization\Interfaces\LocalizedUrlRoutable;

class LaravelLocalizationCustom extends LaravelLocalization
{

    public $currentRouter;
    public $currentTranslator;

    /**
     * Returns the translation key for a given path.
     *
     * @param string $path Path to get the key translated
     *
     * @return string|false Key for translation, false if not exist
     */
    public function getRouteNameFromAPath($path)
    {
        $attributes = $this->extractAttributes($path);

        $path = parse_url($path)['path'];
        $path = trim(str_replace('/'.$this::getCurrentLocale().'/', '', $path), "/");

        foreach (unserialize(base64_decode($this::getSerializedTranslatedRoutes())) as $route) {
            if (trim($this->substituteAttributesInRoute($attributes, $this->currentTranslator->get($route), $this::getCurrentLocale()), '/') === $path) {
                return $route;
            }
        }

        return false;
    }

    public function extractAttributes($url = false, $locale = '')
    {
        $this->currentRouter = app()['router'];
        $this->currentTranslator = app()['translator'];

        if (!empty($url)) {
            $attributes = [];
            $parse = parse_url($url);

            if (isset($parse['path'])) {
                // Если закомментить то будет работать но не для ua версии
//                $parse['path'] = trim(str_replace('/'.$this->currentLocale.'/', '', $parse['path']), "/");
                $url = explode('/', trim($parse['path'], '/'));
            } else {
                $url = [];
            }

            foreach ($this->currentRouter->getRoutes() as $route) {
                $attributes = [];
                $path = method_exists($route, 'uri') ? $route->uri() : $route->getUri();

                if (!preg_match("/{[\w]+\??}/", $path)) {
                    continue;
                }

                $path = explode('/', $path);
                $i = 0;

                // The system's route can't be smaller
                // only the $url can be missing segments (optional parameters)
                // We can assume it's the wrong route
                if (count($path) < count($url)) {
                    continue;
                }

                $match = true;
                foreach ($path as $j => $segment) {
                    if (isset($url[$i])) {
                        if ($segment === $url[$i]) {
                            $i++;
                            continue;
                        } elseif (preg_match("/{[\w]+}/", $segment)) {
                            // must-have parameters
                            $attribute_name = preg_replace(['/}/', '/{/', "/\?/"], '', $segment);
                            $attributes[$attribute_name] = $url[$i];
                            $i++;
                            continue;
                        } elseif (preg_match("/{[\w]+\?}/", $segment)) {
                            // optional parameters
                            if (!isset($path[$j + 1]) || $path[$j + 1] !== $url[$i]) {
                                // optional parameter taken
                                $attribute_name = preg_replace(['/}/', '/{/', "/\?/"], '', $segment);
                                $attributes[$attribute_name] = $url[$i];
                                $i++;
                                continue;
                            } else {
                                $match = false;
                                break;
                            }
                        } else {

                            // As soon as one segment doesn't match, then we have the wrong route
                            $match = false;
                            break;
                        }
                    } elseif (preg_match("/{[\w]+\?}/", $segment)) {
                        $attribute_name = preg_replace(['/}/', '/{/', "/\?/"], '', $segment);
                        $attributes[$attribute_name] = null;
                        $i++;
                    } else {
                        // no optional parameters but no more $url given
                        // this route does not match the url
                        $match = false;
                        break;
                    }
                }

                if (isset($url[$i + 1])) {
                    $match = false;
                }

                if ($match) {
                    return $attributes;
                }
            }
        } else {
            if (!$this->currentRouter->current()) {
                return [];
            }

            $attributes = $this->normalizeAttributes($this->currentRouter->current()->parameters());
            $response = event('routes.translation', [$locale, $attributes]);

            if (!empty($response)) {
                $response = array_shift($response);
            }

            if (\is_array($response)) {
                $attributes = array_merge($attributes, $response);
            }
        }

        return $attributes;
    }

    /**
     * Change route attributes for the ones in the $attributes array.
     *
     * @param $attributes array Array of attributes
     * @param string $route string route to substitute
     *
     * @return string route with attributes changed
     */
    protected function substituteAttributesInRoute($attributes, $route, $locale = null)
    {
        foreach ($attributes as $key => $value) {

            if ($value instanceOf LocalizedUrlRoutable) {
                $value = $value->getLocalizedRouteKey($locale);
            }
            elseif ($value instanceOf UrlRoutable) {
                $value = $value->getRouteKey();
            }
            $route = str_replace(array('{'.$key.'}', '{'.$key.'?}'), $value, $route);
        }
        // delete empty optional arguments that are not in the $attributes array
        $route = preg_replace('/\/{[^)]+\?}/', '', $route);

        return $route;
    }
}