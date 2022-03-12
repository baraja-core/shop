<?php

declare(strict_types=1);

namespace Baraja\Shop;


use Baraja\Localization\Localization;
use Baraja\Shop\Currency\CurrencyManagerAccessor;
use Baraja\Shop\Entity\Currency\Currency;

final class Context
{
	private CurrencyResolver $currencyResolver;


	public function __construct(
		private Localization $localization,
		private CurrencyManagerAccessor $currencyManager,
	) {
		$this->currencyResolver = new CurrencyResolver($localization, $currencyManager);
	}


	public function getCurrencyResolver(): CurrencyResolver
	{
		return $this->currencyResolver;
	}


	public function getCurrencyCode(): string
	{
		return $this->currencyResolver->resolveCode();
	}


	public function getCurrency(): Currency
	{
		return $this->currencyResolver->resolveEntity();
	}


	public function getLocale(): string
	{
		return $this->localization->getLocale();
	}
}
