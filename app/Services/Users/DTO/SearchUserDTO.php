<?php
/**
 * Description of SearchUserDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace App\Services\Users\DTO;

readonly class SearchUserDTO
{
    private const int DEFAULT_PAGE = 1;

    private const int DEFAULT_COUNT = 5;

    public function __construct(
        private int $page,
        private int $count,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            page: $data['page'] ?? self::DEFAULT_PAGE,
            count: $data['count'] ?? self::DEFAULT_COUNT,
        );
    }

    public function getPage(): int
    {
        return $this->page;
    }

    public function getCount(): int
    {
        return $this->count;
    }
}
