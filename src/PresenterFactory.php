<?php
/**
 * Author: Mykola Chomenko
 * Email: mykola.chomenko@dipcom.cz
 */

namespace Chomenko\PresenterFactoryListener;

use Nette\Application\PresenterFactory as BaseFactory;

/**
 * @method onGetPresenter(EventArgsGetPresenter $eventArgs)
 * @method onFormatPresenterClass(EventArgsFormatPresenter $eventArgs)
 * @method onUnFormatPresenterClass(EventArgsUnFormatPresenter $eventArgs)
 */
class PresenterFactory extends BaseFactory
{

	/**
	 * @var callable[]
	 */
	public $onGetPresenter = [];

	/**
	 * @var callable[]
	 */
	public $onFormatPresenterClass = [];

	/**
	 * @var callable[]
	 */
	public $onUnFormatPresenterClass = [];

	/**
	 * @var \ReflectionClass
	 */
	private $ref;

	/**
	 * @var callable|NULL
	 */
	private $factory;

	/**
	 * PresenterFactory constructor.
	 * @param callable|NULL $factory
	 * @throws \ReflectionException
	 */
	public function __construct(callable $factory = NULL)
	{
		$this->ref = new \ReflectionClass(self::class);
		parent::__construct($factory);
		$this->factory = $factory;
	}

	/**
	 * @param string $name
	 * @return string|null
	 * @throws \Nette\Application\InvalidPresenterException
	 * @throws \ReflectionException
	 */
	public function getPresenterClass(&$name)
	{
		$args = new EventArgsGetPresenter($name, $this->getMapping());
		$this->onGetPresenter($args);
		$name = $args->getName();
		if ($args->getPresenter()) {
			return $args->getPresenter();
		}
		return parent::getPresenterClass($name);
	}

	/**
	 * @param string $presenter
	 * @return string|null
	 * @throws \ReflectionException
	 */
	public function formatPresenterClass($presenter)
	{
		$args = new EventArgsFormatPresenter($presenter, NULL, $this->getMapping());
		$this->onFormatPresenterClass($args);
		$class = $args->getClass();
		if ($class !== NULL) {
			return $class;
		}
		return parent::formatPresenterClass($presenter);
	}

	/**
	 * @param string $class
	 * @return string|null
	 * @throws \ReflectionException
	 */
	public function unformatPresenterClass($class)
	{
		$args = new EventArgsUnFormatPresenter($class, NULL, $this->getMapping());
		$this->onUnFormatPresenterClass($args);
		$mapping = $args->getClassMapping();
		if ($mapping !== NULL) {
			return $mapping;
		}
		return parent::unformatPresenterClass($class);
	}

	/**
	 * @return array
	 * @throws \ReflectionException
	 */
	private function getMapping(): array
	{
		$prom = $this->ref->getParentClass()->getProperty("mapping");
		$prom->setAccessible(TRUE);
		$mapping = $prom->getValue($this);
		$prom->setAccessible(FALSE);
		return $mapping;
	}

}
