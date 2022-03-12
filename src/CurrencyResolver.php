<?php

declare(strict_types=1);

namespace Baraja\Shop;


use Baraja\Localization\Localization;
use Baraja\Shop\Currency\CurrencyManagerAccessor;
use Baraja\Shop\Entity\Currency\Currency;

class CurrencyResolver
{
	public function __construct(
		private Localization $localization,
		private CurrencyManagerAccessor $currencyManager,
	) {
	}


	public function resolveCode(?string $locale = null): string
	{
		$session = $this->getSessionValue();
		if ($session === null) {
			$locale ??= $this->localization->getLocale();
			$currency = $this->currencyManager->get()->getByLocale($locale);
			$this->setCurrency($currency);
			$session = $currency->getCode();
		}

		return $session;
	}


	public function resolveEntity(?string $locale = null): Currency
	{
		return $this->currencyManager->get()->getCurrency($this->resolveCode($locale));
	}


	public function setCurrency(Currency|string $currency): void
	{
		if (is_string($currency)) {
			$entity = $this->currencyManager->get()->getCurrency($currency);
		} else {
			$entity = $currency;
		}
		$this->setSessionValue($entity->getCode());
	}


	private function getSessionKey(): string
	{
		return 'baraja_shop__currency';
	}


	private function getSessionValue(): ?string
	{
		$currency = (string) ($_SESSION[$this->getSessionKey()] ?? '');

		return $currency === '' ? null : $currency;
	}


	private function setSessionValue(?string $value): void
	{
		if ($value === null) {
			unset($_SESSION[$this->getSessionKey()]);
		} else {
			$_SESSION[$this->getSessionKey()] = $value;
		}
	}
}
