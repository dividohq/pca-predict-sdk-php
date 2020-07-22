<?php

namespace Divido\PCAPredict;

/**
 * Class FindArgs
 *
 * @author Neil McGibbon <neil.mcgibbon@divido.com>
 * @copyright (c) 2017, Divido
 * @package DividoFinancialServices\PCAPredict
 */
class FinderArgs
{
    /**
     * Constants for the (un)enumerated Type
     *
     * The Web Service definition of `Type` inside the complex object `Capture_Interactive_Find_v1_00_Results`
     *
     */
    public const FILTER_TYPE_LOCALITY = "Locality";
    public const FILTER_TYPE_STREET = "Street";
    public const FILTER_TYPE_ADDRESS = "Address";
    public const FILTER_TYPE_BUILDING_NAME = "BuildingName";

    /**
     * The search term to find.
     *
     * @var string
     */
    private $text;

    /**
     * A container for the search. This should be an Id previously returned from this service.
     *
     * @var string
     */
    private $container;

    /**
     * A starting location for the search. This can be the name or ISO 2 or 3 character code of
     * a country, or Latitude and Longitude, to start the search.
     *
     * @var string
     */
    private $origin;

    /**
     * A string array of ISO 2 or 3 character country codes to limit the search within e.g.
     * US,CA,MX
     *
     * @var string[]
     */
    private $countries;

    /**
     * The maximum number of results to return.
     *
     * @var int
     */
    private $limit;

    /**
     * The preferred language for results. This should be a 2 or 4 character language code
     * e.g. (en, fr, en-gb, en-us etc).
     *
     * @var string
     */
    private $language;

    /**
     * Types to be filtered from the search.
     *
     * @var string[]
     */
    private $typeFilter;

    public function __construct()
    {
        // Setup known defaults
        $this->setLimit(8);
        $this->setLanguage('en');
        $this->setContainer('');
        $this->setOrigin('');
        $this->setCountries([]);
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     * @return FinderArgs
     */
    public function setText(string $text): ?FinderArgs
    {
        $this->text = $text;
        return $this;
    }

    /**
     * @return string
     */
    public function getContainer(): string
    {
        return $this->container;
    }

    /**
     * @param string $container
     * @return FinderArgs
     */
    public function setContainer(string $container): ?FinderArgs
    {
        $this->container = $container;
        return $this;
    }

    /**
     * @return string
     */
    public function getOrigin(): string
    {
        return $this->origin;
    }

    /**
     * @param string $origin
     * @return FinderArgs
     */
    public function setOrigin(string $origin): ?FinderArgs
    {
        $this->origin = $origin;
        return $this;
    }

    /**
     * @return array<string>
     */
    public function getCountries(): array
    {
        return $this->countries;
    }

    /**
     * @param array<string> $countries
     * @return FinderArgs
     */
    public function setCountries(array $countries): ?FinderArgs
    {
        $this->countries = $countries;
        return $this;
    }

    /**
     * @return int
     */
    public function getLimit(): int
    {
        return $this->limit;
    }

    /**
     * @param int $limit
     * @return FinderArgs
     */
    public function setLimit(int $limit): ?FinderArgs
    {
        $this->limit = $limit;
        return $this;
    }

    /**
     * @return string
     */
    public function getLanguage(): string
    {
        return $this->language;
    }

    /**
     * @param string $language
     * @return FinderArgs
     */
    public function setLanguage(string $language): ?FinderArgs
    {
        $this->language = $language;
        return $this;
    }

    /**
     * @return array<string>
     */
    public function getTypeFilter():  ?array
    {
        return $this->typeFilter;
    }

    /**
     * @param array<string> $typeFilter
     * @return FinderArgs
     */
    public function setTypeFilter(array $typeFilter): ?FinderArgs
    {
        $this->typeFilter = $typeFilter;
        return $this;
    }

    /**
     * @param string $typeFilter
     * @return FinderArgs
     */
    public function addTypeFilter(string $typeFilter): ?FinderArgs
    {
        if (!is_array($this->typeFilter)) {
            $this->typeFilter = [];
        }

        $this->typeFilter[] = $typeFilter;
        return $this;
    }

    /**
     * @return array<string, mixed>
     */
    public function getArgsAsArray(): array
    {
        return [
            'Text' => $this->getText(),
            'Container' => $this->getContainer(),
            'Origin' => $this->getOrigin(),
            'Countries' => implode(',', $this->getCountries()),
            'Limit' => (string)$this->getLimit(),
            'Language' => $this->getLanguage(),
        ];
    }
}
