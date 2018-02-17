<?php
/**
 * Created by PhpStorm.
 * User: kostya
 * Date: 17.02.18
 * Time: 16:55
 */

namespace AppBundle\Helper;

/**
 * Class SlugTransform
 * @package AppBundle\Helper
 */
class SlugTransform
{
    /**
     * @var string $replacement
     */
    private $replacement;

    /**
     * Transform
     *
     * Use for transform data string to slug string and return result
     *
     * @param string|null $data
     * @param string|null $replacement
     * @return mixed
     */
    public function transform(string $data = null, string $replacement = null)
    {
        $replacement = ($replacement) ? $replacement : $this->replacement;

        return  str_replace('', $replacement, $data);
    }

    /**
     * Set replacement
     *
     * @param string $replacement
     */
    public function setReplacement(string $replacement)
    {
        $this->replacement = $replacement;
    }

    /**
     * Get replacement
     *
     * @return mixed
     */
    public function getReplacement()
    {
        return $this->replacement;
    }
}