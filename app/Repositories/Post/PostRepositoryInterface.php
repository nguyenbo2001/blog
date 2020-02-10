<?php
namespace App\Repositories\Post;

interface PostRepositoryInterface
{
  /**
   * Get 5 Posts hot in a month the last
   *
   * @return mixed
   */
  public function getPostHost();
}
