<?php

function active_view(string $uri): bool
{
    return request()->is($uri);
}