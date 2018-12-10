<?php
declare(strict_types=1);

/**
 * This file is part of the Phalcon Framework.
 *
 * (c) Phalcon Team <team@phalconphp.com>
 *
 * For the full copyright and license information, please view the LICENSE.txt
 * file that was distributed with this source code.
 */

namespace Phalcon\Test\NoopUnit\Assets\Asset\Css;

use Phalcon\Assets\Asset\Css;
use Phalcon\Test\Fixtures\Traits\AssetsTrait;
use UnitTester;

/**
 * Class SetTargetUriCest
 *
 * @package Phalcon\Test\NoopUnit\Assets\Asset\Css
 */
class SetTargetUriCest
{
    use AssetsTrait;

    /**
     * Tests Phalcon\Assets\Asset :: setTargetUri() - css local
     *
     * @param UnitTester $I
     *
     * @author Phalcon Team <team@phalconphp.com>
     * @since  2018-11-13
     */
    public function assetsAssetCssSetTargetUriLocal(UnitTester $I)
    {
        $I->wantToTest('Assets\Asset - setTargetUri() - css local');
        $asset = new Css('css/docs.css');

        $expected = '/new/path';
        $asset->setTargetUri($expected);
        $this->assetGetTargetUri($I, $asset, $expected);
    }

    /**
     * Tests Phalcon\Assets\Asset :: setTargetUri() - css remote
     *
     * @param UnitTester $I
     *
     * @author Phalcon Team <team@phalconphp.com>
     * @since  2018-11-13
     */
    public function assetsAssetCssSetTargetUriRemote(UnitTester $I)
    {
        $I->wantToTest('Assets\Asset - setTargetUri() - css remote');
        $asset = new Css('https://phalcon.ld/css/docs.css');

        $expected = '/new/path';
        $asset->setTargetUri($expected);
        $this->assetGetTargetUri($I, $asset, $expected);
    }
}