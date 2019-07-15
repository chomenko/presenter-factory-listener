<?php
/**
 * Author: Mykola Chomenko
 * Email: mykola.chomenko@dipcom.cz
 */

namespace Chomenko\PresenterFactoryListener;

class Events
{
	/**
	 * onGetPresenter(EventArgsGetPresenter $eventArgs)
	 */
	const GET_PRESENTER = PresenterFactory::class . "::onGetPresenter";

	/**
	 * onFormatPresenterClass(EventArgsFormatPresenter $eventArgs)
	 */
	const FORMAT_PRESENTER_CLASS = PresenterFactory::class . "::onFormatPresenterClass";

	/**
	 * onUnFormatPresenterClass(EventArgsUnFormatPresenter $eventArgs)
	 */
	const UN_FORMAT_PRESENTER_CLASS = PresenterFactory::class . "::onUnFormatPresenterClass";

}
