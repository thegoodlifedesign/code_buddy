<?php namespace ThreeAccents\Packages\Sanitizer;

class Sanitizer
{
    /**
     * @var EloquentRepository
     */
    protected $repo;

    /**
     * @param $data
     * @param array $rules
     * @return mixed
     */
    public function sanitize($data, array $rules = null)
    {
        $rules = $rules ?: $this->getRules();

        foreach($rules as $field => $sanitizers)
        {
            if( ! isset($data->$field)) continue;

            $data->$field = $this->applySanitizers($data->$field, $sanitizers);
        }

        $this->generateSlug($data);

        return $data;
    }

    /**
     * @param $value
     * @param $sanitizers
     * @return mixed
     */
    private function applySanitizers($value, $sanitizers)
    {
        foreach($this->splitSanitizers($sanitizers) as $sanitizer)
        {
            $value = call_user_func($sanitizer, $value);
        }

        return $value;
    }

    /**
     * @param $data
     */
    protected function generateSlug($data)
    {
        $field = $this->rules['slug'];

        if( ! $field) return;

        $slug = $this->sluggify($data->$field);

        $db_slug = $this->repo->getBySlug($slug);

        if($db_slug)
        {
            $data->slug = $slug.rand(1000,9999);
        }
        else
        {
           $data->slug = $slug;
        }

        return $data;

    }

    /**
     * @param $sanitizers
     * @return array
     */
    private function splitSanitizers($sanitizers)
    {
        return explode("|", $sanitizers);
    }

    /**
     * @return mixed
     */
    public function getRules()
    {
        return $this->rules;
    }

    /**
     * @param $text
     * @return mixed|string
     */
    public function sluggify($text)
    {
        // replace non letter or digits by -
        $text = preg_replace('~[^\\pL\d]+~u', '-', $text);
        // trim
        $text = trim($text, '-');
        // transliterate
        if (function_exists('iconv'))
        {
            $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        }
        // lowercase
        $text = strtolower($text);
        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);
        if (empty($text))
        {
            return 'n-a';
        }
        return $text;
    }
}