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

namespace Phalcon\Test\Integration\Mvc\Micro\Collection;

use IntegrationTester;
use Phalcon\Mvc\Micro;
use Phalcon\Mvc\Micro\Collection;
use Phalcon\Test\Fixtures\Micro\HttpMethodHandler;

class PutCest
{
    /**
     * Tests Phalcon\Mvc\Micro\Collection :: put()
     *
     * @author Sid Roberts <https://github.com/SidRoberts>
     * @since  2019-05-22
     */
    public function mvcMicroCollectionPut(IntegrationTester $I)
    {
        $I->wantToTest('Mvc\Micro\Collection - put()');

        $micro = new Micro();

        $collection = new Collection();

        $httpMethodHandler = new HttpMethodHandler();

        $collection->setHandler($httpMethodHandler);

        $collection->get('/test', 'get');
        $collection->put('/test', 'put');
        $collection->post('/test', 'post');

        $micro->mount($collection);



        $_SERVER['REQUEST_METHOD'] = 'PUT';

        // Micro echoes out its result as well
        ob_start();
        $result = $micro->handle('/test');
        ob_end_clean();

        $I->assertEquals(
            'this is put',
            $result
        );
    }
}
