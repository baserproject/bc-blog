<?php
// TODO ucmitz  : コード確認要
return;
/**
 * BlogPostsBlogTag
 *
 */
class BlogPostsBlogTagModelFixture extends BaserTestFixture
{
    /**
     * Name of the object
     *
     * @var string
     */
    public $name = 'BlogPostsBlogTag';

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => '1',
            'blog_post_id' => '1',
            'blog_tag_id' => '1',
            'created' => '2015-08-10 18:57:47',
            'modified' => NULL,
        ],
        [
            'id' => '2',
            'blog_post_id' => '2',
            'blog_tag_id' => '1',
            'created' => '2015-08-10 18:57:47',
            'modified' => NULL,
        ],
        [
            'id' => '3',
            'blog_post_id' => '3',
            'blog_tag_id' => '1',
            'created' => '2015-08-10 18:57:47',
            'modified' => NULL,
        ],
    ];
}
