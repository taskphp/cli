task/cli
========

[![Build Status](https://travis-ci.org/taskphp/cli.svg?branch=master)](https://travis-ci.org/taskphp/cli)
[![Coverage Status](https://coveralls.io/repos/taskphp/cli/badge.png?branch=master)](https://coveralls.io/r/taskphp/cli?branch=master)

Installation
============

There are 3 options for installation:

#1 Composer global (recommended)
--------------------------------
```bash
$> composer global require task/cli ~0.2
```
If you haven't installed anything this way before you'll need to update your `PATH`:
```bash
export PATH=$PATH:$HOME/.composer/vendor/bin
```

#2 Phar
-------

Download from Github:
```bash
$> wget -O /usr/bin/task https://github.com/task/cli/releases/v0.2.0/task.phar
$> chmod +x /usr/bin/task
```

#3 Composer
-----------
```json
...
"require-dev": {
    "task/cli": "~0.2"
}
...
```
Run at `./vendor/bin/task`.

Testing
=======

When running the package tests, make sure to use the local install of Task CLI and not 
the global TaskPHP CLI install. e.g. './bin/task test'
