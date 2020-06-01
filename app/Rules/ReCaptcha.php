<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use ReCaptcha\ReCaptcha as ReCaptchaClient;

class ReCaptcha implements Rule
{
    /**
     * @var ReCaptchaClient $client
     */
    private ReCaptchaClient $client;

    /**
     * Constructor.
     *
     * @param ReCaptchaClient $client
     * @return void
     */
    public function __construct(ReCaptchaClient $client)
    {
        $this->client = $client;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $response = $this->client
            ->setScoreThreshold(0.3)
            ->verify($value);

        return $response->isSuccess();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'エラーが発生しました。';
    }
}
