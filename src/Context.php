<?php

declare(strict_types=1);

namespace Baraja\Shop;


use Baraja\Localization\Localization;
use Baraja\Shop\Currency\CurrencyManagerAccessor;
use Baraja\Shop\Entity\Currency\Currency;

final class Context
{
	public function __construct(
		private Localization $localization,
		private CurrencyManagerAccessor $currencyManager,
	) {
	}


	public function getCurrency(): Currency
	{
		return $this->currencyManager->get()->getMainCurrency();
	}


	public function getLocale(): string
	{
		return $this->localization->getLocale();
	}
}
