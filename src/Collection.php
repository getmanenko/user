<?php
/**
 * Created by PhpStorm.
 * User: egorov
 * Date: 11.04.2015
 * Time: 9:58
 */
namespace samsoncms\app\user;

use samsonframework\core\RenderInterface;
use samsonframework\orm\QueryInterface;
use samsonframework\pager\PagerInterface;

/**
 * Collection of SamsonCMS users
 * @package samsoncms\app\user
 */
class Collection extends \samsoncms\Collection
{
    /** @var string Entity primary field name */
    protected $entityPrimaryField = 'UserID';

    /**
     * Overload default constructor
     * @param RenderInterface $renderer View renderer
     * @param QueryInterface $query Database query
     * @param PagerInterface $pager Paging
     */
    public function __construct(RenderInterface $renderer, QueryInterface $query, PagerInterface $pager)
    {
        // Call parent
        parent::__construct($renderer, $query, $pager);

        // Apply sorting by identifier
        $this->sorter($this->entityPrimaryField, 'DESC');

        // Fill collection on creation
        $this->fill();
    }
}
