<?php
/**
 * Author: Mykola Chomenko
 * Email: mykola.chomenko@dipcom.cz
 */

namespace Chomenko\PresenterFactoryListener\DI;

use Chomenko\PresenterFactoryListener\PresenterFactory;
use Nette\Application\IPresenterFactory;
use Nette\Configurator;
use Nette\DI\Compiler;
use Nette\DI\CompilerExtension;
use Nette\DI\Statement;

class PresenterFactoryListenerExtension extends CompilerExtension
{

	public function loadConfiguration()
	{
		$builder = $this->getContainerBuilder();

		$appFactory = $builder->getDefinitionByType(IPresenterFactory::class);
		$originalFactory = $appFactory->getFactory();
		$newFactory = new Statement(PresenterFactory::class, $originalFactory->arguments);
		$appFactory->setFactory($newFactory);
	}

	/**
	 * @param Configurator $configurator
	 */
	public static function register(Configurator $configurator)
	{
		$configurator->onCompile[] = function ($config, Compiler $compiler) {
			$compiler->addExtension('RouteListenerExtension', new PresenterFactoryListenerExtension());
		};
	}

}
