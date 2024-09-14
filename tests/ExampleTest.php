<?php

use function Pest\Laravel\get;

// it('has privacy policy', function () {
//     get(route('privacy-policy'))->assertOk();
// });

it('has cookie policy', function () {
    get(route('cookie-policy'))->assertOk();
});
