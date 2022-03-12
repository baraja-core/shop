<?php

declare(strict_types=1);

namespace Baraja\Shop;


use Nette\DI\CompilerExtension;

final class ShopExtension extends CompilerExtension
{
	public function beforeCompile(): void
	{
		$builder = $this->getContainerBuilder();
		// OrmAnnotationsExtension::addAnnotationPathToManager($builder, 'Baraja\Shop\Address\Entity', __DIR__ . '/Entity');

		$builder->addDefinition($this->prefix('shopInfo'))
			->setFactory(ShopInfo::class);

		$builder->addDefinition($this->prefix('context'))
			->setFactory(Context::class);

		$builder->addAccessorDefinition($this->prefix('contextAccessor'))
			->setImplement(ContextAccessor::class);
	}
}
