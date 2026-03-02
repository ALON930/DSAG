<?php
// IDE helper stubs for Laravel helpers, facades and common functions.
// Purpose: remove false-positive "unknown function/class/method" warnings in editors/IDEs.

namespace Illuminate\Support\Facades {
    class Route {
        public static function get($path, $action) {}
        public static function post($path, $action) {}
        public static function put($path, $action) {}
        public static function delete($path, $action) {}
        public static function middleware($middleware) { return new static; }
        public static function group($callback) {}
        public static function currentRouteName() {}
    }

    class Auth {
        public static function login($user) {}
        public static function logout() {}
        public static function guard($name = null) {}
        public static function check() {}
        public static function user() {}
    }

    class Hash {
        public static function make($value) {}
        public static function check($value, $hashed) {}
    }
}

namespace Illuminate\Http {
    class Request {
        /**
         * Validate the request against the given rules.
         * @param array $rules
         * @return array
         */
        public function validate(array $rules): array {}

        /**
         * Get the session store.
         * @return \Illuminate\Session\Store|object
         */
        public function session() {}

        public function all(): array {}
        public function input($key = null, $default = null) {}
    }
}

namespace Illuminate\Database\Eloquent {
    class Model {
        /**
         * @param mixed $col
         * @param mixed $val
         * @return \Illuminate\Database\Eloquent\Builder
         */
        public static function where($col, $val = null) {}

        /**
         * Create and return model instance.
         * @param array $attributes
         * @return static
         */
        public static function create(array $attributes = []) {}
    }

    class Builder {}
}

namespace Illuminate\Foundation\Auth {
    class User extends \Illuminate\Database\Eloquent\Model {}
}

namespace Illuminate\Notifications {
    trait Notifiable {}
}

namespace {
    function route($name, $parameters = []) {}
    function asset($path) {}
    function view($view = null, $data = []) {}
    function auth() {}
    function redirect($to = null) {}
    function back() {}
    function request() {}
    function bcrypt($value) {}
}
