
/**
 * This file is part of the Phalcon Framework.
 *
 * (c) Phalcon Team <team@phalcon.io>
 *
 * For the full copyright and license information, please view the LICENSE.txt
 * file that was distributed with this source code.
 */

namespace Phalcon\Storage\Serializer;

use Phalcon\Storage\Exception;
use Phalcon\Storage\Serializer\SerializerInterface;

abstract class AbstractSerializer implements SerializerInterface
{
    /**
     * @var mixed
     */
    protected data = null { get, set };

	/**
	 * Constructor
	 */
	public function __construct(var data = null)
	{
	    let this-> data = data;
	}

    /**
     * If this returns true, then the data returns back as is
     */
	protected function isSerializable(var data) -> bool
	{
        return !(empty data || typeof data === "bool" || is_numeric(data));
	}
}
