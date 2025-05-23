<?php
/**
 * baserCMS :  Based Website Development Project <https://basercms.net>
 * Copyright (c) NPO baser foundation <https://baserfoundation.org/>
 *
 * @copyright     Copyright (c) NPO baser foundation
 * @link          https://basercms.net baserCMS Project
 * @since         5.0.0
 * @license       https://basercms.net/license/index.html MIT License
 */

namespace BcBlog\Test\Scenario;

use BaserCore\Test\Scenario\MultiSiteScenario;
use BcBlog\Test\Factory\BlogCategoryFactory;
use BcBlog\Test\Factory\BlogPostFactory;
use Cake\ORM\TableRegistry;
use CakephpFixtureFactories\Scenario\FixtureScenarioInterface;
use CakephpFixtureFactories\Scenario\ScenarioAwareTrait;

/**
 * MultiSiteBlogPostScenario
 *
 * マルチサイトのデータセット
 * site とそれに紐づく content / contentFolder を作成する
 * content に紐づく blogContent / blogPost を作成する
 * - /
 * - /s/
 * - /en/
 * - /example.com/
 * - /sub/
 *
 * 利用する場合は、テーブルの初期化に次のフィクスチャの定義が必要
 * - plugin.BaserCore.Factory/Sites
 * - plugin.BaserCore.Factory/Contents
 * - plugin.BaserCore.Factory/ContentFolders
 * - plugin.BcBlog.Factory/BlogContents
 * - plugin.BcBlog.Factory/BlogPosts
 */
class MultiSiteBlogPostScenario implements FixtureScenarioInterface
{

    /**
     * Trait
     */
    use ScenarioAwareTrait;

    /**
     * load
     */
    public function load(...$args): mixed
    {
        $this->loadFixtureScenario(MultiSiteScenario::class);
        $this->createBlogContents();
        $this->createBlogPosts();
        $this->createBlogCategories();
        return null;
    }

    /**
     * ブログコンテンツを作成
     */
    protected function createBlogContents()
    {
        $this->loadFixtureScenario(
            BlogContentScenario::class,
            6,  // id
            1, // siteId
            1, // parentId
            'news1', // name
            '/news/', // url,
            'News 1' // title
        );
        $this->loadFixtureScenario(
            BlogContentScenario::class,
            7,  // id
            2, // siteId
            1, // parentId
            'news2', // name
            '/s/news/', // url
            'News 2' // title
        );
        $this->loadFixtureScenario(
            BlogContentScenario::class,
            8,  // id
            3, // siteId
            1, // parentId
            'news3', // name
            '/en/news/', // url
            'News 3' // title
        );
        $this->loadFixtureScenario(
            BlogContentScenario::class,
            9,  // id
            4, // siteId
            1, // parentId
            'news4', // name
            '/example.com/news/', // url
            'News 4' // title
        );
        $this->loadFixtureScenario(
            BlogContentScenario::class,
            10,  // id
            5, // siteId
            1, // parentId
            'news5', // name
            '/sub/', // url
            'News 5' // title
        );
        $contentsTable = TableRegistry::getTableLocator()->get('BaserCore.Contents');
        $contentsTable->recover();
    }

    /**
     * ブログ記事を作成
     */
    protected function createBlogPosts()
    {
        BlogPostFactory::make([
            'id' => 1,
            'user_id' => 1,
            'blog_content_id' => 6,
            'blog_category_id' => 6,
            'no' => 3,
            'name' => 'release',
            'title' => 'プレスリリース',
            'status' => 1,
            'exclude_search' => 0,
            'posted' => '2015-01-27 12:57:59',
        ])->persist();
        BlogPostFactory::make([
            'id' => 2,
            'user_id' => 1,
            'blog_content_id' => 7,
            'no' => 4,
            'name' => 'smartphone_release',
            'title' => 'スマホサイトリリース',
            'status' => 1,
            'exclude_search' => 0,
            'posted' => '2015-01-27 13:57:59',
        ])->persist();
        BlogPostFactory::make([
            'id' => 3,
            'user_id' => 2,
            'blog_content_id' => 8,
            'no' => 5,
            'name' => 'english_release',
            'title' => '英語サイトリリース',
            'status' => 1,
            'exclude_search' => 0,
            'posted' => '2015-01-28 12:57:59',
        ])->persist();
        BlogPostFactory::make([
            'id' => 4,
            'user_id' => 2,
            'blog_content_id' => 9,
            'no' => 6,
            'name' => 'another_domain_release',
            'title' => '別サイトリリース',
            'status' => 1,
            'exclude_search' => 0,
            'posted' => '2015-02-15 12:57:59',
        ])->persist();
        BlogPostFactory::make([
            'id' => 5,
            'user_id' => 2,
            'blog_content_id' => 10,
            'no' => 7,
            'name' => 'sub_domain_release',
            'title' => '別サイトリリース',
            'status' => 1,
            'exclude_search' => 0,
            'posted' => '2015-02-20 12:57:59',
        ])->persist();
        BlogPostFactory::make([
            'id' => 6,
            'user_id' => 2,
            'blog_content_id' => 11,
            'no' => 3,
            'name' => 'release',
            'title' => 'プレスリリース',
            'status' => 1,
            'exclude_search' => 0,
            'posted' => '2015-02-25 12:57:59',
        ])->persist();
        BlogPostFactory::make([
            'id' => 7,
            'user_id' => 2,
            'blog_content_id' => 6,
            'blog_category_id' => null,
            'no' => 4,
            'name' => '日本語スラッグ',
            'title' => '日本語スラッグ記事タイトル',
            'status' => 1,
            'exclude_search' => 0,
            'posted' => '2015-02-26 12:57:59',
        ])->persist();
        BlogPostFactory::make([
            'id' => 8,
            'user_id' => 2,
            'blog_content_id' => 6,
            'blog_category_id' => null,
            'no' => 5,
            'name' => null,
            'title' => 'スラッグがない記事',
            'status' => 1,
            'exclude_search' => 1,
            'posted' => '2015-03-05 12:57:59',
        ])->persist();
        return null;
    }

    /**
     * ブログカテゴリを作成
     * @return void
     */
    public function createBlogCategories()
    {
        BlogCategoryFactory::make([
            'id' => 6,
            'blog_content_id' => 6,
            'lft' => 1,
            'rght' => 2
        ])->persist();
    }

}
