# Presenter factory listener

_Temporary solution._

This extension allows you to extend presenter factory

## Required

- [kdyby/events](https://github.com/Kdyby/Events)

## Install

````bash
composer require chomenko/presenter-factory-listener
````

## Configure

in config.neon
````neon
extensions:
	events: Kdyby\Events\DI\EventsExtension
	presenterFactoryListener: Chomenko\PresenterFactoryListener\DI\PresenterFactoryListenerExtension
````

## Use

Events
- onGetPresenter
- onFormatPresenterClass
- onUnFormatPresenterClass

````php
<?php
namespace App\Listener;

use Kdyby\Events\Subscriber;
use Chomenko\PresenterFactoryListener\EventArgsGetPresenter;
use Chomenko\PresenterFactoryListener\PresenterFactory as ExtendPresenter;

class PresenterFactory implements Subscriber
{
	/**
	 * @return array
	 */
	public function getSubscribedEvents()
	{
		return [
			ExtendPresenter::class . "::onGetPresenter" => "onGetPresenter",
		];
	}

	/**
	 * @param EventArgsGetPresenter $eventArgs
	 */
	public function onGetPresenter(EventArgsGetPresenter $eventArgs)
	{
		$presenter = $eventArgs->getName();
		$exp = explode(":", $presenter);
		if (isset($exp[0]) && $exp[0] == "Special") { //specialModule
			$eventArgs->setPresenter("special class name"); //special class
		}
	}
}

````