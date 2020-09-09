<?php
declare(strict_types=1);

namespace App\Twig;

use Symfony\Component\HttpFoundation\RequestStack;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class AppExtension extends AbstractExtension
{
    private RequestStack $requestStack;

    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('scriptVersion', [$this, 'getScriptVersion']),
            new TwigFunction('exerciseContainerId', [$this, 'getExerciseContainerId']),
            new TwigFunction('isSomeKeySet', [$this, 'isSomeKeySet']),
            new TwigFunction('countryFlag', [$this, 'countryFlag']),
            new TwigFunction('assetPath', [$this, 'assetPath']),
            new TwigFunction('imagePath', [$this, 'imagePath']),
            new TwigFunction('isProduction', [$this, 'isProduction']),
            new TwigFunction('isObject', [$this, 'isObject'])
        ];
    }

    public function getScriptVersion(): string
    {
        return $this->isProduction() ? "v0_{$_ENV['APP_VERSION']}" : "dev_" . time();
    }

    public function getExerciseContainerId(string $language): string
    {
        return "{$language}-exercises";
    }

    public function isSomeKeySet(array $target, string ...$keys): bool
    {
        return count(array_filter($keys, fn(string $key): bool => isset($target[$key]))) >= 1;
    }

    public function countryFlag(string $code): string
    {
        return $this->imagePath("flags/{$code}_flag.svg");
    }

    public function isProduction(): bool
    {
        return $_ENV['APP_ENV'] === 'prod';
    }

    public function assetPath(string $assetPath, bool $isCached = true): string
    {
        return $this->getAssetPath($assetPath, 'dist', $isCached);
    }

    public function imagePath(string $assetPath, bool $isCached = false): string
    {
        return $this->getAssetPath($assetPath, 'images', $isCached);
    }

    public function isObject($object): bool
    {
        return is_object($object);
    }

    private function getAssetPath(string $assetPath, string $folder, bool $isCached = true): string
    {
        $request = $this->requestStack->getCurrentRequest();
        $baseUrl = $request !== null ? $request->getBaseUrl() : '';
        $version = $isCached ? $this->getScriptVersion() : 1;

        return "{$baseUrl}/public/{$folder}/{$assetPath}?v={$version}";
    }
}