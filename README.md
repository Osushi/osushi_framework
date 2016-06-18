# Example for Osushi Framework

Description
---
This script support this:
+ Serve request and response(view) on web  

Requirements
---
- PHP >= 5.6.*
```
brew install php56
```
- MySQL >= 5.5.*
- SQLite >= 3.8.*
- Node.js >= 5.6.* (npm >= 3.6.*)
```
Note:
$ brew install node
```
- Modules
```
Note:
$ brew install php56-mcrypt
```

Install Dependencies
---

```
You must follow these before running.
$ cd {ROOT_PATH}
$ curl -sS https://getcomposer.org/installer | php
$ php composer.phar install
$ npm install --save-dev
$ $(npm bin)/bower install --save-dev
$ cp .env.sample .env # Set environment variables!
$ bin/phinx migrate
$ bin/robo init
```

Run
---

```
$ cd {ROOT_PATH}
$ php composer.phar self-update; php composer.phar update # If you need there.
$ bin/phinx migrate
$ $(npm bin)/webpack --watch
$ php -S 0.0.0.0:2000 -t public/
```

Test
---

Use Codeception testing framework.

```
$ cd {ROOT_PATH}
$ bin/codecept run
```

License
---

Copyright (C) Osushi.

Author
---

* Osushi
