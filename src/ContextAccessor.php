<?php

declare(strict_types=1);

namespace Baraja\Shop;


interface ContextAccessor
{
	public function get(): Context;
}
