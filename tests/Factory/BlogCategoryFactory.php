<?php
declare(strict_types=1);

/**
 * baserCMS :  Based Website Development Project <https://basercms.net>
 * Copyright (c) NPO baser foundation <https://baserfoundation.org/>
 *
 * @copyright     Copyright (c) NPO baser foundation
 * @link          https://basercms.net baserCMS Project
 * @since         5.0.0
 * @license       https://basercms.net/license/index.html MIT License
 */

namespace BcBlog\Test\Factory;

use CakephpFixtureFactories\Factory\BaseFactory as CakephpBaseFactory;
use Faker\Generator;

/**
 * BlogCategoryFactory
 */
class BlogCategoryFactory extends CakephpBaseFactory
{

    /**
     * Defines the Table Registry used to generate entities with
     *
     * @return string
     */
    protected function getRootTableRegistryName(): string
    {
        return 'BcBlog.BlogCategories';
    }

    /**
     * Defines the factory's default values. This is useful for
     * not nullable fields. You may use methods of the present factory here too.
     *
     * @return void
     */
    protected function setDefaultTemplate(): void
    {
        $this->setDefaultData(function (Generator $faker) {
            return [
                'blog_content_id' => $faker->randomNumber(),
                'no' => $faker->unique()->randomNumber(),
                'name' => $faker->text(5),
                'title' => $faker->title(),
                'status' => true,
                'parent_id' => null,
                'lft' => null,
                'rght' => null,
                'created' => $faker->date(),
                'modified' => $faker->date()
            ];
        });
    }

}
