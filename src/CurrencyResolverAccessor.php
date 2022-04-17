<?php

declare(strict_types=1);

namespace Baraja\Shop;


interface CurrencyResolverAccessor
{
	public function get(): CurrencyResolver;
}
