<?php

declare(strict_types=1);

namespace Baraja\Shop;


use Baraja\Localization\Localization;
use Baraja\Shop\Entity\Currency\Currency;

final class Context
{
	public function __construct(
		private Localization $localization,
		private CurrencyResolverAccessor $currencyResolverAccessor,
	) {
	}


	public function getCurrencyResolver(): CurrencyResolver
	{
		return $this->currencyResolverAccessor->get();
	}


	public function getCurrencyCode(): string
	{
		return $this->getCurrencyResolver()->resolveCode();
	}


	public function getCurrency(): Currency
	{
		return $this->getCurrencyResolver()->resolveEntity();
	}


	public function getLocale(): string
	{
		return $this->localization->getLocale();
	}
}
